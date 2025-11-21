<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

$db = new DBConnect();
$manager = new ContactManager($db->getPDO());
$command = new Command($manager);

while (true) {
    $line = readline("Entrez votre commande : ");

    // HELP
    if ($line === "help") {
        $command->help();
    }

    // LIST
    elseif ($line === "list") {
        $command->list();
    }

    // DETAIL <id>
    elseif (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->detail($id);
    }

    // CREATE name, email, phone
    elseif (preg_match('/^create\s+([^,]+),\s*([^,]+),\s*(.+)$/', $line, $m)) {
        $name  = trim($m[1]);
        $email = trim($m[2]);
        $phone = trim($m[3]);

        $command->create($name, $email, $phone);
    }

    // DELETE <id>
    elseif (preg_match('/^delete\s+(\d+)$/', $line, $m)) {
        $id = (int)$m[1];
        $command->delete($id);
    }

    // MODIFY <id> name, email, phone
    elseif (preg_match('/^modify\s+(\d+)\s+([^,]+),\s*([^,]+),\s*(.+)$/', $line, $m)) {
        $id    = (int)$m[1];
        $name  = trim($m[2]);
        $email = trim($m[3]);
        $phone = trim($m[4]);

        $command->modify($id, $name, $email, $phone);
    }

    else {
        echo "Commande inconnue : $line\n";
    }
}
