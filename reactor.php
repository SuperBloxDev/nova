<?php
ini_set('display_errors', 0);

class Database {
    private PDO $pdo;

    public function __construct() {
        $host = 'mysql0.serv00.com';
        $dbname = 'm4476_novadb';  # !
        $user = 'm4476_novadb';          # !
        $pass = 'xBpMT074Au!dOUoAo4NFH6u+^2.H0<';      # !

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getPDO(): PDO {
        return $this->pdo;
    }
}

$db = new Database();
$pdo = $db->getPDO();