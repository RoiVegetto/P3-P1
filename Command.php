<?php

require_once 'ContactManager.php';

class Command
{
    private ContactManager $manager;

    public function __construct(ContactManager $manager)
    {
        $this->manager = $manager;
    }

    public function list(): void
    {
        $contacts = $this->manager->findAll();

        foreach ($contacts as $contact) {
            echo $contact . "\n";  // utilisation du __toString()
        }
    }

    public function detail(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact avec l'id $id\n";
            return;
        }

        echo $contact . "\n";
    }

    public function create(string $name, string $email, string $phone): void
    {
        $this->manager->create($name, $email, $phone);
        echo "Contact créé : $name\n";
    }

    public function delete(int $id): void
    {
        $this->manager->delete($id);
        echo "Contact supprimé (id : $id)\n";
    }

    public function help(): void
    {
        echo "📌 Commandes disponibles :\n";
        echo "  list                       - Affiche tous les contacts\n";
        echo "  detail <id>                - Affiche un contact par son ID\n";
        echo "  create nom, email, phone   - Crée un nouveau contact\n";
        echo "  delete <id>                - Supprime un contact par son ID\n";
        echo "  help                       - Affiche cette aide\n";
    }

}
