<?php

require "../vendor/autoload.php";

use Styde\User;
use Styde\LunchBox;

$gordon = new User(['name' => 'Gordon']);

//Daughter
$joanie = new User(['name' => 'Joanie']);

//House
$lunchBox = new LunchBox(['Sandwich', 'Manzana', 'Papas', 'Jugo de Naranja']);

$joanie->setLunch($lunchBox);

//School
$joanie->eatMeal($lunchBox);
