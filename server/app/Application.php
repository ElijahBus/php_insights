<?php

namespace server\app;

require_once 'DatabaseConnection.php';

class Application
{

    private $dbConnection;

    /**
     * @return mixed
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    public static function init(): Application
    {
        $app = new Application();

        $app->registerRoutes();
        $app->connectToDatabase();

        return $app;
    }

    public function registerRoutes()
    {
        //        echo "Register routes";
    }

    private function connectToDatabase()
    {
        $this->dbConnection = (new DatabaseConnection())
            ->setUsername('root')
            ->setPassword('password')
            ->setHost('127.0.0.1')
            ->setPort(3306)
            ->setDatabase('debug')
            ->connect();
    }

}
