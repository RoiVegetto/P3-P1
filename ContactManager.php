<?php
require_once 'DBConnect.php';
require_once 'Contact.php';

class ContactManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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

    public function findById(int $id): ?Contact
    {
        $stmt = $this->pdo->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $contact = new Contact();
        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }

    public function create(string $name, string $email, string $phone): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO contact (name, email, phone_number)
            VALUES (:name, :email, :phone)
        ");

        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM contact WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

}
