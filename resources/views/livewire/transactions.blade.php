<div class="px-4" x-cloak>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <main class="p-4 sm:px-6 lg:flex-auto lg:px-0">
        <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
            {{-- Main wrapper --}}
            <div>
                {{-- Header Begins --}}
                <div class="md:flex md:items-center md:justify-between">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">All Transaction</h2>
                    <div class="mt-3 flex md:right-0 md:top-3 md:mt-0 sm:w-1/5 gap-3">
                        {{-- Function Buttons --}}
                        <x-modules.button-confirm> Print </x-modules.button-confirm>
                        <x-modules.button-confirm> Export </x-modules.button-confirm>
                    </div>
                </div>
                <div class="md:flex md:items-center gap-4 justify-stretch mt-4">
                    {{-- Date Start --}}
                    <div class="w-full">
                        <label for="dateStart" class="block text-sm/6 font-medium text-gray-900">Date After (Not
                            Implemented)</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="date" name="dateAfter" id="dateAfter" wire:model="dateAfter"
                                    value="1970-01-01"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                            </div>
                        </div>
                    </div>
                    {{-- Date End --}}
                    <div class="w-full">
                        <label for="dateEnd" class="block text-sm/6 font-medium text-gray-900">Date Before (Not
                            Implemented)</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="date" name="dateBefore" id="dateBefore" wire:model="dateBefore"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                            </div>
                        </div>
                    </div>
                    {{-- ATM ID Dropdown --}}
                    <div class="w-full">
                        <label for="aid" class="block text-sm/6 font-medium text-gray-900">ATM ID</label>
                        <div class="mt-0">
                            <div
                                class="grid grow-1 grid-cols-1 focus-within:relative rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <select id="aid" name="aid" aria-label="aid" wire:model.live="atmSelect"
                                    id="atm" wire:change="reloadData"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="-1">ALL ATMS (Limit 1 item returned)</option>
                                    @foreach ($atmList as $atm)
                                        <option value="{{ $atm['id'] }}">{{ $atm['name'] }} (Limit 10)</option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    {{-- Customer PAN Entry --}}
                    <div class="w-full">
                        <label for="cpn" class="block text-sm/6 font-medium text-gray-900">CUSTOMER PAN
                            NUMBER</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="text" name="cpn" id="cpn"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="Partial or full card number (Not Implemented)">
                            </div>
                        </div>
                    </div>
                    {{-- EMV Chip dropdown --}}
                    <div class="w-full">
                        <label for="eca" class="block text-sm/6 font-medium text-gray-900">EMV CHIP AID</label>
                        <div class="mt-0">
                            <div
                                class="grid grow-1 grid-cols-1 focus-within:relative rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <select id="eca" name="eca" aria-label="eca"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>All applications (Not Implemented)</option>
                                    <option>placeholder 1 (Not Implemented)</option>
                                    <option>placeholder 2 (Not Implemented)</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    {{-- Transaction Search --}}
                    <div class="w-full">
                        <label for="tsn" class="block text-sm/6 font-medium text-gray-900">TRANSACTION SERIAL
                            NUMBER</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="text" name="tsn" id="tsn"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="4 digit number (Not Implemented)">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Header Ends --}}
                <div
                    class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6 bg-white rounded-md">
                    <div class="overflow-x-auto px-4">
                        <div class="-mx-4">
                            {{-- Table Starts --}}
                            <table id="resultsTable" class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th class="pl-4 sm:pl-6 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Date</th>
                                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ATM ID
                                        </th>
                                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Customer PAN</th>
                                        <th colspan="3"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            <div class="flex flex-row gap-x-4">
                                                <div class="flex-1 text-gray-900 place-self-center min-w-[350px]">
                                                    Description
                                                </div>
                                                <div class="flex-1 text-gray-900 place-self-center">
                                                    Code
                                                </div>
                                                {{-- Search Bar --}}
                                                <div class="flex-1 text-gray-900 place-self-center">
                                                    <div class="mt-0">
                                                        <div
                                                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                                            <input type="text" name="transactionSearch"
                                                                id="transactionSearch"
                                                                wire:model.live.debounce.300ms="transactionSearch"
                                                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                                                placeholder="Search in results (Date, ATM Name, PAN, Desc., Code)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                {{-- Table Body --}}
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    {{-- Loading indication --}}
                                    <tr>
                                        <td wire:loading colspan="6"
                                            class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="text-gray-900">Loading transactions...</div>
                                        </td>
                                    </tr>
                                    {{-- If not empty, displays table, else message --}}
                                    @if ($transactions->isNotEmpty())
                                        {{-- Creating rows --}}
                                        @foreach ($transactions as $transaction)
                                            <tr wire:loading.class="bg-gray-300">
                                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-6 align-top">
                                                    <div class="text-gray-900">{{ $transaction->date }}</div>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 align-top">
                                                    <div class="text-gray-900">
                                                        {{ $transaction->atmName }}
                                                    </div>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 align-top">
                                                    <div class="text-gray-900">{{ $transaction->pan }}</div>
                                                </td>
                                                {{-- Log items --}}
                                                <td colspan="3"
                                                    class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 align-top">
                                                    <div class="flex flex-col">
                                                        {{-- description area combined, strings are limited to 40 characters --}}
                                                        @foreach ($transaction->description as $section)
                                                            <div class="flex flex-row gap-x-4">
                                                                <div class="flex-1 text-gray-900 min-w-[350px]">
                                                                    <div>
                                                                        {{-- description --}}
                                                                        @if (is_array($section['descr']))
                                                                            @foreach ($section['descr'] as $item)
                                                                            {{-- Checking if log has error and highlighting --}}
                                                                                @if (Str::contains(strtolower($item), 'error'))
                                                                                    <span class="bg-red-200">
                                                                                        {{ Str::limit($item, 40) }}
                                                                                    </span><br>
                                                                                @else
                                                                                    {{ Str::limit($item, 40) }}<br>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                        {{-- Highlighting section titles  --}}
                                                                            @if (Str::contains($section['descr'], ['Summary', 'Full Transaction Log']))
                                                                                <strong>{{ Str::limit($section['descr'], 40) }}</strong><br>
                                                                            @else
                                                                                {{ Str::limit($section['descr'], 40) }}<br>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-1 text-left text-gray-900">
                                                                    <div>
                                                                        {{-- code and timestamp --}}
                                                                        @if (is_array($section['code']))
                                                                            @foreach ($section['code'] as $item)
                                                                                {{ Str::limit($item, 40) }} <br>
                                                                            @endforeach
                                                                        @else
                                                                            {{ Str::limit($section['code'], 40) }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-1 text-left text-gray-900">
                                                                    <span class="sr-only">spacer</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- If empty, displays messsage --}}
                                    @else
                                        <tr>
                                            <td wire:loading.remove colspan="6"
                                                class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="text-gray-900">No transactions found for the selected
                                                    criteria.</div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{-- Table Ends --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Main ends --}}
        </div>
    </main>
</div>
