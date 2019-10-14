<?php


namespace Styde;


class Foot extends Model
{
    public function getBeverageAttribute()
    {
        return $this->attributes['beverage'] ?? false;
    }


}