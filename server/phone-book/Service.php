<?php

namespace server\phone_book;

use PDO;

use Sodium;

class Service
{

    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function shareContacts($sharingUser)
    {
        $contactsQuery = "SELECT contacts FROM phone_book WHERE email = :sharingUser";

        try {
            $statement = $this->dbConnection->prepare($contactsQuery);
            $statement->execute(['sharingUser' => $sharingUser]);

            $contacts = $statement->fetchAll();
            echo json_encode($contacts);

            // send to the e-mail address

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function importContacts()
    {
        // load contact list into a separate table and encrypt them
    }

}
