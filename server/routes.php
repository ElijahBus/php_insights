<?php

use server\app\Controller;

$routes = [
    'reports'           => [Controller::class, 'listReports'],
    'reports/:reportId' => [Controller::class, 'updateTicketState'],
];




