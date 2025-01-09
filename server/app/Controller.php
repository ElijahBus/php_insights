<?php

namespace server\app;

use server\phone_book\Service;

class Controller
{

    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function shareContacts ()
    {
        $sharingUser = $_GET['sharingFromUser'];
        (new Service($this->dbConnection))->shareContacts($sharingUser);
    }
}
