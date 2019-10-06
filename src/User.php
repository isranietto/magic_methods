<?php


namespace Styde;


class User extends Model
{

    private $id= 5;
    public $table = 'users';

    private $dbPassword = 'secret';

    public function __toString()
    {
        return $this->name;
    }

    public function __sleep()
    {
        return ['id'];
    }

    public function __wakeup()
    {
        //return $this->attributes['name'] = strtoupper($this->attributes['name']);
        
    }

    public function getFirstNameAttribute($value)
    {
        return strtoupper($value);
    }
}