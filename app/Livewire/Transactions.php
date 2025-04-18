<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Transactions extends Component
{
    public $atmList;
    public Collection $transactionsNew;
    public $atmSelect;
    // public $dateStart; // Not Implemented
    public $dateEnd;
    // public $panSearch; // Not Implemented
    // public $emvSelect; // Not Implemented
    public $transactionSearch;
    public $limit;


    public function mount()
    {
        // Default values
        $this->atmSelect = 15;
        // $this->dateStart = 0; 
        $this->dateEnd = Carbon::now()->timestamp;
        // Limiting search so that 1000s of records aren't loaded at once
        $this->limit = 10;
        $this->transactionsNew = new Collection();
        // For search bar
        $this->transactionSearch = '';

        // Initial load
        $this->atmList = $this->getAtmList();
        $this->transactionsNew = $this->tableBuilder($this->atmSelect);
    }


    // Function to force refresh table when filters are applied
    public function reloadData()
    {
        $this->transactionsNew = $this->tableBuilder($this->atmSelect);
    }


    // Retrieves initial list for filter and table call
    public function getAtmList()
    {
        $response = Http::get('https://dev.smartjournal.net:443/um/test/api/jr/txn/atmlist/v1');

        return $response->json();
    }

    // Retrieves log for specific timestamp and atm
    public function getTransactionLog($atmId, $ts)
    {
        $response = Http::get('https://dev.smartjournal.net:443/um/test/api/jr/txn/log/v1?', [
            'a' => $atmId,
            't' => $ts,
        ]);

        return $response->body();
    }

    // Building actual table with atmId as input (or all) 
    public function tableBuilder($atmIfInput)
    {
        // Initialize empty collections for models
        $allTransactions = [];
        $atmTransactionModels = new Collection();


        // loop for all atms if no specific input
        if ($atmIfInput == -1) {
            set_time_limit(300); // Increasing timeout as laravel uses 30 seconds by default
            foreach ($this->atmList as $atm) {
                $response = Http::withUrlParameters([
                    'endpoint' => 'https://dev.smartjournal.net:443/um/test/api/jr/txn/txnlist',
                    'atmId' => $atm['id'],
                    'ts' => $this->dateEnd,
                    'limit' => 1, // Reduced limit to not take too long with log search
                ])->get('{+endpoint}/{atmId}/{ts}/v1?n={limit}');

                $data[] = $response->json();
            }
        } else {
            // Individual atm response
            set_time_limit(30);
            $response = Http::withUrlParameters([
                'endpoint' => 'https://dev.smartjournal.net:443/um/test/api/jr/txn/txnlist',
                'atmId' => $atmIfInput,
                'ts' => $this->dateEnd,
                'limit' => $this->limit,
            ])->get('{+endpoint}/{atmId}/{ts}/v1?n={limit}');
            $data = $response->json();
        }


        // Consolidate transactions if all atms retreived
        if ($atmIfInput == -1) {
            foreach ($data as $atmResponse) {
                if (isset($atmResponse['txn']) && is_array($atmResponse['txn'])) {
                    $allTransactions = array_merge($allTransactions, $atmResponse['txn']);
                }
            }
        } elseif (isset($data['txn']) && is_array($data['txn'])) {
            $allTransactions = $data['txn'];
        }


        // Processing and adding to collection that's retreived on front end
        foreach ($allTransactions as $transaction) {

            // Getting all required info
            $atmId = $transaction['atm']['id'] ?? '';
            $atmName = $transaction['atm']['txt'] ?? '';
            $pan = $transaction['pan'] ?? '';
            $dateRaw = $transaction['devTime'] ?? '';
            $tTypeDesc = $transaction['ttp']['descr'] ?? '';
            $hst = $transaction['hst']['descr'] ?? '';
            $ref = $transaction['ref'] ?? '';
            $atmEventCode = $transaction['hst']['id'] ?? '';

            // Converting date formats
            $formattedDate = Carbon::createFromFormat('YmdHis', $dateRaw)->format('Y/m/d');
            $fullTimestampForLog = Carbon::createFromFormat('YmdHis', $dateRaw)->format('Y/m/d H:i:s');

            // Format withdrawal as list
            if ($tTypeDesc == 'WITHDRAWAL') {
                // You can store this structured info within the description array
                $tTypeDesc = [ // Make it an array for structure
                    'type' => 'Withdrawal',
                    'withdrawn' => 'Withdrawal $'.number_format($transaction['amountW'] ?? 0, 2),
                    'previous' => 'Previous Balance $'.number_format($transaction['amountP'] ?? 0, 2),
                    'current' => 'Current Balance $'.number_format($transaction['amountR'] ?? 0, 2),
                ];
            }

            // Get full log for transaction
            $log = $this->getTransactionLog($atmId, $dateRaw);
            $logDesc = [];
            $logCodeDate = [];
            // Splitting new line characters
            $lines = preg_split("/\n|\r/", $log);
            foreach ($lines as $line) {
                // splitting non-space characters to groups
                if (preg_match('/^(\S+)\s+(\S+)\s+(.+)$/', trim($line), $matches)) {
                    $logCodeDate[] = $matches[2].' '.$formattedDate.' '.$matches[1];
                    $logDesc[] = $matches[3];
                }
            }



            // building array with data so it can be looped over in front end
            $descriptionData = [
                // header
                'summaryHead' => [
                    'descr' => 'Summary:',
                    'code' => $fullTimestampForLog,
                ],
                'ttype' => [
                    'descr' => $tTypeDesc,
                    'code' => 'Transaction #: '.$ref,
                ],
                'hst' => [
                    'descr' => $hst,
                    'code' => '000MNT :'.$atmEventCode.' '.$fullTimestampForLog, // Hard coded 000MNT
                ],
                // header without timestamp
                'spacerHead' => [
                    'descr' => 'Full Transaction Log:',
                    'code' => '',
                ],
                'log' => [
                    'descr' => $logDesc,
                    'code' => $logCodeDate,
                ],
            ];

            // Adding to model
            $model = new \stdClass(); // Used instead of laravel collection because search function will not work with collection
            $model->atmId = $atmId;
            $model->atmName = $atmName;
            $model->pan = str_replace('*', 'XXXXXX', $pan); // changed asterix to X's
            $model->date = $formattedDate;
            $model->description = $descriptionData;
            $model->code = $logCodeDate;
            $model->log = $log; // Added to be able to search

            $atmTransactionModels->push($model);
        }

        return $atmTransactionModels;
    }


    public function render()
    {
        // Search function
        $filteredTransactions = $this->transactionsNew->filter(function ($item) {
            return 
                str_contains(strtolower($item->atmName ?? ''), strtolower($this->transactionSearch)) ||
                str_contains(strtolower($item->pan ?? ''), strtolower($this->transactionSearch)) ||
                str_contains(strtolower($item->date ?? ''), strtolower($this->transactionSearch)) ||
                str_contains(strtolower($item->log ?? ''), strtolower($this->transactionSearch)); // Uses base log entry - not entirely accurate to display
        })->values();

        return view('livewire.transactions', ['atmList' => $this->atmList, 'transactions' => $filteredTransactions]);
    }
}