<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

$db = new DBConnect();   // connexion prête
$manager = new ContactManager($db->getPDO()); // manager prêt
$command = new Command($manager); // Command prêt avec le manager

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line === "list") {
        $command->list();  // appel de la commande
    } else {
        echo "Commande inconnue : $line\n";
    }
}
