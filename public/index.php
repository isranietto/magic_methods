<?php

use Styde\HtmlNode;
use Styde\User;

require "../vendor/autoload.php";

//$user =  new User([
//    'first_name' => 'Israel',
//    'last_name' => 'Nieto'
//]);
//
//$user->nickname = 'inieto';
//
//
//echo "<p>Hola {$user->first_name} {$user->last_name}</p>";
//
//if ($user->hasAttribute('nickname')){
//    echo "<p>Nickname: {$user->nickname}";
//}

$node = (new HtmlNode('textarea','Hola tonto'))
        ->name('first_name')
        ->id('first_name')
        ->type('textarea')
        ->placeholder('First Name');

echo $node->render();

$static =  HtmlNode::h1('Titulo de la clase')
    ->id('title')
    ->style('color:blue;');


echo $static;

echo $static('id');

