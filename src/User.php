<?php


namespace Styde;

use Carbon\Carbon;

class User extends Model
{
    protected $lunch;

    protected $original = true;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->lunch = new LunchBox();
    }

    public function getAgeAttribute()
    {
        $date = Carbon::createFromFormat('d/m/Y', $this->birthDate);

        return $date->age;
    }

    public function __clone()
    {
        $this->original = false;
    }

    public function setLunch(LunchBox $lunch)
    {
        $this->lunch = $lunch;
    }

    public function eatLunch()
    {
        if ($this->lunch->isEmpty()) {
            throw new \Exception("{$this->name} no tiene nada para comer :( ");
        }

        echo "<p>{$this->name} almuerza {$this->lunch->shift()}</p>";
    }

    public function eatMeal()
    {
        //$total = count($this->lunch); // $this->lunch->count()

        $food = $this->lunch->filter(function ($food){
            return !$food->beverage;
        });

        $beverages = $this->lunch->filter(function ($food){
            return $food->beverage;
        });

        echo "<p>{$this->name} tiene {$this->lunch->count()} de alimentos</p>";
        echo "<p>{$this->name} tiene {$beverages->count()} bevidas</p>";

        foreach ($food as $item) {
            echo "<p>{$this->name} come {$item->name}</p>";
        }

        foreach ($beverages as $item) {
            echo "<p>{$this->name} toma {$item->name}</p>";
        }
    }
}