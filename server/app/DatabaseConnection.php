<?php

namespace server\app;

class DatabaseConnection
{

    private string $host;

    private int $port;

    private string $database;

    private string $username;

    private string $password;

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function setDatabase(string $database): self
    {
        $this->database = $database;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function connect()
    {
        try {
            return new \PDO(
                "mysql:host=$this->host;port=$this->port;charset=utf8mb4;dbname=$this->database",
                $this->username,
                $this->password
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

}
