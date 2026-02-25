<?php

namespace app\Core;

use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(array $config = []){
     $domainServiceName = $config['dsn'] ?? '' ;
     $username = $config['user'] ??  '';
     $password = $config['password'] ??  '';   
     $this->pdo = new PDO($domainServiceName , $username , $password);
     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
 
}