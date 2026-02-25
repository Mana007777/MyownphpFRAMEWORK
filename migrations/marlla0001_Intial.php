<?php

use app\Core\Application;

class marlla0001_Intial
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )ENGINE=INNODB;"; 

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("DROP TABLE IF EXISTS users;");
        echo "Users table dropped".PHP_EOL;
    }
}