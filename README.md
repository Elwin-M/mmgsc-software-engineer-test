# MMGSC Assessment

This is a Laravel/livewire (includes Tailwind CSS, and Alpine.js) project developed by Elwin, using the API available at: [Swagger UI](https://dev.smartjournal.net/swagger-ui/#/journal-txn-controller-test/)


## Requirements 

Before running the project, make sure the following are installed:

[Official Laravel Instructions](https://laravel.com/docs/12.x/installation)

[PHP 8.2 or higher](https://www.php.net/)

Make sure pdo_sqlite is enabled in your php.ini file or the server will fail to connect.

[Composer](https://getcomposer.org/)

Laravel Installer
Install it globally by running:
    composer global require laravel/installer

## Setup Instructions

[Clone this repository](https://github.com/Elwin-M/mmgsc-software-engineer-test) or extract the archive.
If the reposity is cloned, be sure to run `composer install` and `npm install` to download any dependencies. 

Open terminal and navigate to the project directory:
`cd ./mmgsc-software-engineer-test`

Start the local development server by running:
    `php artisan serve` and `npm run build` OR `npm run dev`

Open your browser and go to:
    `http://127.0.0.1:8000`


## Jira User Stories

User Story 1: As Elwin, I want to view all ATM transactions, so that I can tell at a glance what the issue is.

User Story 2: As Elwin, I want to filter ATM transactions, so that I can quickly find what I am looking for without wasting time.

## Live Deployment & Other Details

I have also deployed this on my webserver at [mmgsc.elwinm.ca](https://mmgsc.elwinm.ca/)

The main files related to this project are located at:
The contoller:
./app/Livewire/Transactions.php
The view:
./resources/views/livewire/transactions.blade.php

Misc files:
./resources/views/components/modules/[sidebar, header, button-confirm].blade.php
./resources/views/components/layouts/app.blade.php
./resources/views/livewire/settings.blade.php
./resources/css/app.css
./routes/web.php
./app/Modesl/AtmTransactions.php
./app/Livewire/Settings.php
