<?php

namespace server\app;

use PDOException;

class Controller
{

    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function listReports()
    {
        // Query all reports
        echo "List reports";
    }

    public function updateTicketState($requestBody)
    {
        $userCode = $requestBody['userCode'];

        $query = "UPDATE TABLE users SET state = 'active' WHERE userCode=$userCode";

        try {
            $statement = $this->dbConnection->prepare($query);
            $statement->execute([$userCode]);

            return json_encode(['success' => true]);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
