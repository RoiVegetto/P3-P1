<?php
require_once 'DBConnect.php';
require_once 'Contact.php';

class ContactManager
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new DBConnect();
        $this->pdo = $db->getPDO();
    }

    public function findAll(): array
    {

        $query = $this->pdo->query("SELECT * FROM contact");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];

        foreach ($rows as $row) {
            $contact = new Contact();
            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhoneNumber($row['phone_number']);
            $contacts[] = $contact;
        }

        return $contacts;
    }
}
