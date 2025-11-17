<?php

class Contact
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone_number = null;

    // --- Getters ---
    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function getEmail(): ?string { return $this->email; }
    public function getPhoneNumber(): ?string { return $this->phone_number; }

    // --- Setters ---
    public function setId(?int $id): void { $this->id = $id; }
    public function setName(?string $name): void { $this->name = $name; }
    public function setEmail(?string $email): void { $this->email = $email; }
    public function setPhoneNumber(?string $phone_number): void { $this->phone_number = $phone_number; }

    // --- toString ---
    public function __toString(): string
    {
        return "ID: {$this->id} | Nom: {$this->name} | Email: {$this->email} | Téléphone: {$this->phone_number}";
    }
}
