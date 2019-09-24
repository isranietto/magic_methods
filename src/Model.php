<?php


namespace Styde;


abstract class Model
{
    /**
     * @var array
     */
    protected $attributes= [];

    public function __construct(array $attributes = [] )
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __set($name, $value) // recibe 2 argumentos variable y valor
    {
        $this->setAttribute($name, $value);
    }

    public function getAttribute($name)
    {
        $value =  $this->getAttributeValue($name);

        if($this->hasGetMutator($name)) {
            return $this->mutateAttribute($name, $value);
        }

        return $value;
    }

    protected function hasGetMutator($name)
    {
        $method = 'get'. Str::studly($name) . 'Attribute';

        return method_exists($this, $method);
    }

    protected function mutateAttribute($name, $value)
    {
        return $this->{'get'. Str::studly($name) . 'Attribute'}($value); //método variable
    }

    public function getAttributeValue($name)
    {
        if (array_key_exists($name, $this->attributes)){
            return $this->attributes[$name];
        }
    }

    public function __get($name) //recibe un argumento
    {
        return $this->getAttribute($name);
    }

    public function __isset($name)
    {
        return $this->hasAttribute($name);
    }

    public function __unset($name)
    {
        unset($this->attributes[$name]);
    }

    public function hasAttribute($name)
    {
        return isset($this->attributes[$name]);
    }
}