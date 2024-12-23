<?php

use server\app\DatabaseConnection;

require_once "./app/DatabaseConnection.php";

$query = "
    create table if not exists spams (
        `id` int  auto_increment not null,
        `state` varchar(255) not null,
        `type` varchar(255) not null,
        `message` varchar(255) not null,
        primary key (`id`)
    ) ENGINE=INNODB ;
    
    insert into spams (`id`, `state`, `type`, `message`) values (1, 'OPEN', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (2, 'BLOCKED', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (3, 'ClOSED', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (4, 'CLOSED', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (5, 'BLOCKED', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (6, 'OPEN', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (7, 'OPEN', 'Spam', 'Something  have been reported ...');
    insert into spams (`id`, `state`, `type`, `message`) values (8, 'CLOSED', 'Spam', 'Something  have been reported ...');
";

try {
    $connection = (new DatabaseConnection())
        ->setUsername('root')
        ->setPassword('password')
        ->setHost('127.0.0.1')
        ->setPort(3306)
        ->setDatabase('debug')
        ->connect();

    $connection->exec($query);
    print "Done!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}

