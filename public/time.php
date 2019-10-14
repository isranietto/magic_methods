<?php

class Time {

    /**
     * @var null
     */
    protected $time;

    public function __construct($time = null)
    {
        $this->time = $time ?: time();
    }

    public function __toString()
    {
        return date('d/m/Y H:i:s', $this->time);
    }

    public function tomorrow()
    {
        return new Time($this->time + 24*60*60);
    }

    public function yesterday()
    {
        return new Time($this->time - 24*60*60);
    }
}

$time = new Time();

echo "<p>Hoy es {$time}</p>";
echo "<p>Mañana será {$time->tomorrow()}</p>";
echo "<p>Ayer fue {$time->yesterday()}</p>";