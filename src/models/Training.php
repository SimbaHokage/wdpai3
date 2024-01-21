<?php

class Training
{
    private $date;
    private $id_training;
    private $id_user;

    public function __construct(string $date, int $id_training, int $id_user)
    {
        $this->date = $date;
        $this->id_training = $id_training;
        $this->id_user = $id_user;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIdTraining()
    {
        return $this->id_training;
    }

    /**
     * @param mixed $id_training
     */
    public function setIdTraining($id_training): void
    {
        $this->id_training = $id_training;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }





}