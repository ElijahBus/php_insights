<?php

namespace server\phone_book;

use PDO;

class Service
{

    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function shareContacts($sharingUser)
    {
        $message = "This is a secret message.";

        // Generate a random key
        $key = sodium_crypto_secretbox_keygen();

        // Generate a random nonce (must be unique for each encryption)
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

        // Encrypt the message
        $ciphertext = sodium_crypto_secretbox($message, $nonce, $key);

        dd("Elijah");

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
