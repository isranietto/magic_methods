<?php


namespace Styde;


class User extends Model
{
    protected $lunch;

    protected $original = true;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->lunch = new LunchBox();
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
        $total = count($this->lunch); // $this->lunch->count()

        echo "<p>{$this->name} tiene {$total} de alimentos</p>";

        foreach ($this->lunch as $key => $food) {
            echo "<p>{$this->name} $key ==> $food</p>";
        }
    }
}