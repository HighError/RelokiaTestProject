<?php

use Higherror\RelokiaTestProject\Http;
use Higherror\RelokiaTestProject\Ticket;

require 'vendor/autoload.php';

mb_internal_encoding("UTF-8");

$array = Http::get_data('tickets?include=description');

$file = fopen('file.csv', 'w');

$csv_array = ["Ticket ID", "Description", "Status", "Priority", "Agent ID", "Agent Name", "Agent Email",
    "Contact ID", "Contact Name", "Contact Email", "Group ID", "Group Name", "Company ID", "Company Name", "Comments"];

fputcsv($file, $csv_array);

foreach ($array as $value) {
    $ticket = new Ticket($value);

    $csv_array = [
        $ticket->getId(),
        $ticket->getDescription(),
        $ticket->getStatus(),
        $ticket->getPriority(),
        $ticket->getAgent()->getId(),
        $ticket->getAgent()->getName(),
        $ticket->getAgent()->getEmail(),
        $ticket->getContact()->getId(),
        $ticket->getContact()->getName(),
        $ticket->getContact()->getEmail(),
        $ticket->getGroup()->getId(),
        $ticket->getGroup()->getName(),
        $ticket->getCompany()->getId(),
        $ticket->getCompany()->getName(),
        $ticket->getCommentsString()
    ];

    fputcsv($file, $csv_array);
}

fclose($file);

echo "Запис завершено";