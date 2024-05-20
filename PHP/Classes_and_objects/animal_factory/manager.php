<?php

include 'animals.php';
include 'zoowatcher.php';

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