<?php

require "../vendor/autoload.php";

use Styde\User;
use Styde\LunchBox;

$gordon = new User(['name' => 'Gordon']);

//Daughter
$joanie = new User(['name' => 'Joanie']);

//House
$lunchBox = new LunchBox(['Sandwich', 'Manzana', 'Papas', 'Jugo de Naranja']);


$lunchBox = new LunchBox([
    new \Styde\Foot(['name' => 'Sandwich', 'beverage' => false]),
    new \Styde\Foot(['name' => 'Papas']),
    new \Styde\Foot(['name' => 'Jugo de Naranja', 'beverage' => true]),
    new \Styde\Foot(['name' => 'Manzana']),
    new \Styde\Foot(['name' => 'Agua','beverage' => true ])
]);

$joanie->setLunch($lunchBox);

//School
$joanie->eatMeal();
