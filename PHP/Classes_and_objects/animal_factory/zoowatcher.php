<?php

include 'animals.php';
include 'cages.php';

// Класс смотрителя зоопарка

class ZooWatcher {
    protected Animals $_animal;

    public function ReciveAnimal(Animals $animal) {
        echo "Смотрящий получил: " . $animal->ReturnString() . "\n";
        $this->_animal = $animal;
    }

    public function PutInCage(Cage $cage) {
        if($this->_animal != null) {
            echo $this->_animal->ReturnString() . " отправлено в клетку\n";
            $cage->Put($this->_animal);
        }
        else echo "Нет животного для передачи в клетку\n";
    }

    public function GetAnimalFromCage(string $kingdom, string $animal_name, bool $hasTail, int $legCount, Cage $cage) {
        return $cage->GetAnimal($kingdom, $animal_name, $hasTail, $legCount);
    }
}