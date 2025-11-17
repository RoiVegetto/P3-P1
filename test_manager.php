<?php
require_once 'ContactManager.php';

$manager = new ContactManager();
$contacts = $manager->findAll();

foreach ($contacts as $contact) {
    echo $contact->toString() . "\n";
}
