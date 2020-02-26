# EEG Coding Challenge

## Introduction

Dear Coder,

Thank you for your interest in working with Elevation Energy Group. We are excited to
see what you can do. This coding challenge is a take home challenge that is designed
to take 2 - 3 hours. It is not required that you finish the challenge. We promise this isn't a trick,
so please do not exhaust yourself. After you submit the challenge and we review your code,
we can discuss the decisions you made and what you might have done if you had more time.
Laravel is a requirement for this position so you will be working with a Laravel application.

## Overview
Elevation receives CSV files containing transactions from utility companies. These transactions
are all responses to prior requests Elevation already sent out. All you need to worry about
is processing the inbound (response) transactions. You can pretend the behavior for sending
the outbound requests that the inbound transactions respond to is already in place.
The transactions come in as CSV files.

Elevations needs to import these csv file transactions into their own database `transactions` table.
Once the transactions are imported, they can be processed. The application should **support
the triggering of transaction processing at anytime**. Once transactions are processed they should
be **marked as processed with the time they were processed**. Any transactions already processed
should **not be processed again when transaction processing is triggered**. It is up to you to
create the transactions table schema to meet the import and processing requirements.

There are three transaction types:
- Accept Enrollment
- Reject Enrollment
- Reject Change

Each transaction type should trigger other actions after being processed. There will be future actions that need to be
taken after the processing of each transaction type. These future actions are unknown but keep that in mind while making
your design decisions.

## Transaction Processing
* If the transaction type is `Accept Enrollment`
    - Mark the corresponding account as enrolled via the `accounts` table `enrolled_at` column
    - Insert a row into the `pending_outbound` table
        - Set the `transaction_id` FK column to the ID of the transaction
        - The value for the `type` column should be "Request Historical Usage"
* If the transaction type is `Reject Enrollment`
    - create an `error_transactions` table entry with the ID (Foreign Key) of the transaction that was rejected.
* If the transaction type is `Reject Change`
    - create an `error_transactions` table entry with the ID (Foreign Key) of the transaction that was rejected.

## Bonus (OPTIONAL)
* Schedule transaction processing for 6:00 am daily using Laravel core features
* Create a transactions controller that receives a JSON request and inserts a new transaction.
    - The controller action only allows for transactions of type "Accept Enrollment"
    - The controller action rejects transactions with a duplicate `original_transaction_id`

## Existing Tables
* `accounts`

## Missing Tables
* `transactions`
* `pending_outbound`
* `error_transactions`

## CSV Data
The CSV file containing the transactions to be imported is stored on a custom disk,
see config/filesystems.php and the "inbound" disk.

You can access the CSV content like so:
```php
# See storage/inbound/import.csv
# See tests/feature/CsvIsAccessibleTest.php
$csvContent = \Storage::disk('inbound')->get('import.csv');
dd($csvContent);
```

## Notes
* It is not necessary at all to have any views or UI for this application
* You can install any third party packages you wish, though this isn't a requirement
* You can use MySQL or sqlite for your database

## Setup
* Unzip the folder
* Run `composer install`
* Create the .env file `cp .env.example .env`
* Create your MySQL or sqlite DB and update the .env file accordingly
* `php artisan key:generate`
* Make sure phpunit works. `vendor/bin/phpunit --testdox`
* If you have any questions or trouble setting up please call or text Justin at 317-908-8334

## Delivery
* You can create a git repo and send the link or you can email us a zip file.
* There is no preference in delivery, it's whatever is convenient for you.
