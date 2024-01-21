<?php

class User {
    private $email;
    private $password;
    private $username;
    private $userID;


    public function __construct(string $email, string $password, string $username, int $userID)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->userID = $userID;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getUserID(): int
    {
        return $this->userID;
    }

    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }




}