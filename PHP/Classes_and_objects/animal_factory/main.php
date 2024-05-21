<?php

include 'classes.php';

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

$zooWatcher->GetAnimalFromCage($anaconda->GetKingdom(), 
    $anaconda->GetAnimalName(), 
    $anaconda->GetTails(), 
    $anaconda->GetLegCount(), 
    $cages->GetCage($anaconda->GetKingdom()));
//echo "<pre>";
//print_r($cages->GetAllCages());
//echo "</pre>";