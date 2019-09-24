<?php

use Styde\User;

require "../vendor/autoload.php";

$user =  new User([
    'first_name' => 'Israel',
    'last_name' => 'Nieto'
]);

$user->nickname = 'inieto';

unset($user->nickname);

echo "<p>Hola {$user->first_name} {$user->last_name}</p>";

if ($user->hasAttribute('nickname')){
    echo "<p>Nickname: {$user->nickname}";
}


