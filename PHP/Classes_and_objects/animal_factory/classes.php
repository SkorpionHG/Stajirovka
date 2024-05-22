<?php

//Абстрактный класс для животных

abstract class Animals {
    protected string $_kingdom;
    protected string $_animal_name;
    protected bool $_hasTail;
    protected int $_legCount;

    public function __construct(string $kingdom, string $animal_name, bool $hasTail, int $legCount) {
        $this->_kingdom = $kingdom;
        $this->_animal_name = $animal_name;
        $this->_hasTail = $hasTail;
        $this->_legCount = $legCount;
    }

    public function GetKingdom() {
        return $this->_kingdom;
    }

    public function GetAnimalName() {
        return $this->_animal_name;
    }

    public function GetTails() {
        return $this->_hasTail;
    }

    public function GetLegCount() {
        return $this->_legCount;
    }

    abstract public function ReturnString();
}

// Классы для разных видов животных

class Mammals extends Animals {
    protected bool $_hasFur;

    public function __construct(string $name, bool $hasTail, int $legCount, bool $hasFur) {
        parent::__construct("Млекопитающие", $name, $hasTail, $legCount);
        $this->_hasFur = $hasFur;
    }

    public function ReturnString() {
        return "Млекопитаюшее: " . $this->_animal_name;
    }
}

class Birds extends Animals {
    protected int $_wingCount;

    public function __construct(string $name, bool $hasTail, int $legCount, int $wingCount) {
        parent::__construct("Птицы", $name, $hasTail, $legCount);
        $this->_wingCount = $wingCount;
    }

    public function ReturnString() {
        return "Птица: " . $this->_animal_name;
    }
}

class Fish extends Animals {
    protected int $_finCount;

    public function __construct(string $name, bool $hasTail, int $legCount, int $finCount) {
        parent::__construct("Рыбы", $name, $hasTail, $legCount);
        $this->_finCount = $finCount;
    }

    public function ReturnString() {
        return "Рыба: " . $this->_animal_name;
    }
}

class Reptiles extends Animals {
    protected bool $_isVenomous;

    public function __construct(string $name, bool $hasTail, int $legCount, bool $isVenomous) {
        parent::__construct("Рептилии", $name, $hasTail, $legCount);
        $this->_isVenomous = $isVenomous;
    }

    public function ReturnString() {
        return "Рептилия: " . $this->_animal_name;
    }
}

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
                $this->inhabitants[] = $animal;
            }
            else throw new Exception("Неверно задано царство животного\n");
        } 
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetAnimal(string $kingdom, string $animal_name, bool $hasTail, int $legCount) {
        for($i = 0; $i <= count($this->inhabitants); $i++) {
            if($this->inhabitants[$i]->GetKingdom() === $kingdom &&
            $this->inhabitants[$i]->GetAnimalName() === $animal_name && 
            $this->inhabitants[$i]->GetTails() === $hasTail && 
            $this->inhabitants[$i]->GetLegCount() === $legCount) {
                $animal = $this->inhabitants[$i];
                unset($this->inhabitants[$i]);
                echo "Животное (" . $animal->ReturnString() . ") было извлечено из клетки\n";
                return $animal;
                break;
            }
        }
        echo "Животное c заданными параметрами не найдено\n";
        return null;
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
        $this->cages[] = $cage;
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
        return null;
    }

    public function GetAllCages() {
        return $this->cages;
    }
}

// Класс смотрителя зоопарка

class ZooWatcher {
    protected ?Animals $_animal;

    public function ReciveAnimal(Animals $animal) {
        if(!isset($this->_animal)) {
            echo "Смотрящий получил: " . $animal->ReturnString() . "\n";
            $this->_animal = $animal;
        }
        else echo "Смотрящий уже работает c другим животным\n";
    }

    public function PutInCage(Cage $cage) {
        if(isset($cage)) {
            if(isset($this->_animal)) {
                echo $this->_animal->ReturnString() . " отправлено в клетку\n";
                $cage->Put($this->_animal);
                $this->_animal = null;
            }
            else echo "Нет животного для передачи в клетку\n";
        }
    }

    public function GetAnimalFromCage(string $kingdom, string $animal_name, bool $hasTail, int $legCount, Cage $cage) {
        $animal = $cage->GetAnimal($kingdom, $animal_name, $hasTail, $legCount);
        if(isset($animal)) {
            if(!isset($this->_animal)) {
                $this->_animal = $animal;
                echo "Смотрящий получил из клетки для царства (" . $cage->GetKingdom() . ") - " . $animal->ReturnString() . "\n";
                return $animal;
            }
            else echo "Смотрящий уже работает c другим животным\n";
        }
        else echo "Животное c заданными параметрами не найдено\n";
    }
}

// Класс менеджер

class Manager {
    protected Animals $_animal;

    public function ReciveAnimal(Animals $animal) {
        $this->_animal = $animal;
        echo "Прибыло c фабрики: " . $this->_animal->ReturnString() . "\n";
    }

    public function PassToZooWatcher(ZooWatcher $zooWatcher) {
        $zooWatcher->ReciveAnimal($this->_animal);
        echo $this->_animal->ReturnString() . " отправлено к смотрящему\n";
    }
}