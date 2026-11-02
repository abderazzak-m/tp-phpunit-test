<?php

namespace TpUnit;

class Stagiaire
{
    private string $nom;
    private int $age;
    private float $moyenne;

    public function __construct(string $nom, int $age, float $moyenne)
    {
        $this->setNom($nom);
        $this->setAge($age);
        $this->setMoyenne($moyenne);
    }

    public function setNom(string $nom): void
    {
        if (trim($nom) === '') {
            throw new \InvalidArgumentException('Le nom est obligatoire.');
        }

        $this->nom = trim($nom);
    }

    public function setAge(int $age): void
    {
        if ($age < 16 || $age > 100) {
            throw new \InvalidArgumentException('Age invalide.');
        }

        $this->age = $age;
    }

    public function setMoyenne(float $moyenne): void
    {
        if ($moyenne < 0 || $moyenne > 20) {
            throw new \InvalidArgumentException('La moyenne doit être entre 0 et 20.');
        }

        $this->moyenne = $moyenne;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getMoyenne(): float
    {
        return $this->moyenne;
    }

    public function estAdmis(): bool
    {
        return $this->moyenne >= 10;
    }

    public function mention(): string
    {
        if ($this->moyenne >= 16) {
            return 'Tres bien';
        }

        if ($this->moyenne >= 14) {
            return 'Bien';
        }

        if ($this->moyenne >= 12) {
            return 'Assez bien';
        }

        if ($this->moyenne >= 10) {
            return 'Passable';
        }

        return 'Insuffisant';
    }
}