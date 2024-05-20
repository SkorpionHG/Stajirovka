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