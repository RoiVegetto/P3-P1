<?php
require_once __DIR__ . '/Contact.php';

$contact = new Contact("Doe", "John", "john.doe@gmail.com");

echo "Nom : " . $contact->getLastname() . PHP_EOL;
echo "Prénom : " . $contact->getFirstname() . PHP_EOL;
echo "Email : " . $contact->getEmail() . PHP_EOL;

echo "Affichage du contact : " . $contact . PHP_EOL;
