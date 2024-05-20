<?php

include 'animals.php';

// Класс клетка

class Cage{
    private string $_kingdom;
    private $inhabitants = [];

    public function __construct($kingdom) {
        $this->_kingdom = $kingdom;
    }

    public function Put (Animals $animal) {
        try {
            if($animal->GetKingdom() === $this->_kingdom) {
                array_push($this->inhabitants, $animal);
            }
            else throw new Exception("Неверно задано царство животного");
        } 
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetAnimal(string $kingdom, string $animal_name, bool $hasTail, int $legCount) {
        foreach($this->inhabitants as $an) {
            if($an->GetKingdom() === $kingdom && 
            $an->GetAnimalName() === $animal_name && 
            $an->GetTails() === $hasTail && 
            $an->GetLegCount() === $legCount) {
                return $an;
            }
        }
        unset($an);
        echo "Животное c заданными параметрами не найдено\n";
    }

    public function GetInhabitants() {
        return $this->inhabitants;
    }

    public function GetKingdom() {
        return $this->_kingdom;
    }
}

// Класс хранения клеток

class Cages {
    protected $cages = [];

    public function CreateNewCage(string $kingdom) {
        $cage = new Cage($kingdom);
        array_push($this->cages, $cage);
        echo "Создана клетка для царства: " . $kingdom . "\n";
    }

    public function GetCage(string $kingdom) {
        foreach($this->cages as $c) {
            if($c->GetKingdom() === $kingdom) {
                return $c;
            }
        }
        unset($c);
        echo "Клетка для царства " . $kingdom . " не найдена\n";
    }

    public function GetAllCages() {
        return $this->cages;
    }
}
