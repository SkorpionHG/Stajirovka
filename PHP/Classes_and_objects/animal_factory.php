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
                array_push($this->inhabitants, $animal);
            }
            else throw new Exception("Неверно задано царство животного\n");
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

$manager = new Manager();
$zooWatcher = new ZooWatcher();
$cages = new Cages();

$cages->CreateNewCage("Млекопитающие");
$cages->CreateNewCage("Птицы");
$cages->CreateNewCage("Рыбы");
$cages->CreateNewCage("Рептилии");

$vorobei = new Birds("воробей", true, 2, 2);
$manager->ReciveAnimal($vorobei);
$manager->PassToZooWatcher($zooWatcher);
$zooWatcher->PutInCage($cages->GetCage($vorobei->GetKingdom()));

$eagle = new Birds("Орел", true, 2, 2);
$manager->ReciveAnimal($eagle);
$manager->PassToZooWatcher($zooWatcher);
$zooWatcher->PutInCage($cages->GetCage($eagle->GetKingdom()));

$anaconda = new Reptiles("Анаконда", true, 0, false);
$manager->ReciveAnimal($anaconda);
$manager->PassToZooWatcher($zooWatcher);
$zooWatcher->PutInCage($cages->GetCage($anaconda->GetKingdom()));

echo "<pre>";
//print_r($cages->GetAllCages());
echo "</pre>";