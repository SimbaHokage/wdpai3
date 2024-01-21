<?php

class Exercise
{
    private $name;
    private $sets;
    private $reps;
    private $rpe;

    public function __construct($name, $sets, $reps, $rpe)
    {
        $this->name = $name;
        $this->sets = $sets;
        $this->reps = $reps;
        $this->rpe = $rpe;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSets()
    {
        return $this->sets;
    }

    public function setSets($sets): void
    {
        $this->sets = $sets;
    }

    public function getReps()
    {
        return $this->reps;
    }

    public function setReps($reps): void
    {
        $this->reps = $reps;
    }

    public function getRpe()
    {
        return $this->rpe;
    }

    public function setRpe($rpe): void
    {
        $this->rpe = $rpe;
    }


}