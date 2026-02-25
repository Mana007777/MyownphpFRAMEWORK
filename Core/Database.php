<?php

namespace app\Core;

use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(array $config = [])
    {
        $domainServiceName = $config['dsn'] ?? '';
        $username = $config['user'] ??  '';
        $password = $config['password'] ??  '';
        // var_dump($domainServiceName, $username, $password);
        // exit;
        $this->pdo = new PDO($domainServiceName, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    public function applyingMigration()
    {
        $this->CreateMigrationsTable();
        $this->getAppliedMigration();

        $files = scandir(Application::$ROOT_DIR . '/migrations');
    }

    public function CreateMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY  KEY,
        migrations VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;");
    }

    public function getAppliedMigration()
    {
        $statement = $this->pdo->prepare("SELECT migrations FROM migrations");
        $statement->execute();

        return $statement->fetchALl(PDO::FETCH_COLUMN);
    }
}
