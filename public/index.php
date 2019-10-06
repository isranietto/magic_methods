<?php

require "../vendor/autoload.php";

use Styde\User;

$user = new User(['name' => 'Israel', 'email' => 'inieto@email.com']);

$result = serialize($user);

echo  "si carga";
file_put_contents('../storage/user.txt', $result);