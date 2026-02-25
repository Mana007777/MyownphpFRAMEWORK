<?php

namespace app\Core;

use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(){
     $this->pdo = new PDO($domainServiceName , $username , $password);
     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
 
}