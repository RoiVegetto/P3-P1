<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';

$db = new DBConnect();   // connexion prête
$manager = new ContactManager($db->getPDO()); // manager prêt

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line === "list") {
        $contacts = $manager->findAll();

        foreach ($contacts as $contact) {
            echo $contact . "\n";   // __toString() s’applique automatiquement
        }

    } else {
        echo "Commande inconnue : $line\n";
    }
}
