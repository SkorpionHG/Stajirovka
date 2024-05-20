<?php

//Абстрактный класс для животных

abstract class Animals {
    protected $_kingdom;
    protected $_animal_name;
    protected $_hasTail;
    protected $_legCount;

    public function __construct($kingdom, $animal_name, $hasTail, $legCount)
    {
        $this->_kingdom = $kingdom;
        $this->_animal_name = $animal_name;
        $this->_hasTail = $hasTail;
        $this->_legCount = $legCount;
    }

    public function GetKingdom() {
        return $this->_kingdom;
    }

    public function GetName() {
        return $this->_animal_name;
    }

    public function HasTail() {
        return $this->_hasTail;
    }

    public function GetLetCount() {
        return $this->_legCount;
    }
}

// Классы для разных видов животных

class Mammals extends Animals {
    protected $_hasFur;

    public function __construct($name, $hasTail, $legCount, $hasFur)
    {
        parent::__construct("Млекопитающие", $name, $hasTail, $legCount);
        $this->_hasFur = $hasFur;
    }
}

class Birds extends Animals {
    public function __construct($name, $hasTail, $legCount)
    {
        parent::__construct("Птицы", $name, $hasTail, $legCount);
    }
}

class Fish extends Animals {
    public function __construct($name, $hasTail, $legCount)
    {
        parent::__construct("Рыбы", $name, $hasTail, $legCount);
    }
}

class Reptiles extends Animals {
    public function __construct($name, $hasTail, $legCount)
    {
        parent::__construct("Рептилии", $name, $hasTail, $legCount);
    }
}

// Классы клеток для разных видов зверей

class CageForMammals {

}

class CageForBirds {
    
}

class CageForFish {

}

class CageForReptiles {

}