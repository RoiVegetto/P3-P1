<?php

class DBConnect
{
    private ?PDO $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=localhost;dbname=p3-p1;charset=utf8',
                'root',
                ''
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getPDO(): ?PDO
    {
        return $this->pdo;
    }
}
