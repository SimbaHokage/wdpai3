<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../exceptions/NotFoundException.php';
class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM public.users where email = :email
        ');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new NotFoundException("User not found for email: $email");
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['username'],
            $user['id_user']
        );
    }

    public function addUser(string $email, string $username, string $password) {
        $statement = $this->database->connect()->prepare('
        INSERT INTO users (username, password, email) 
        VALUES (?, ?, ?)
        ');

        $statement->execute([
            $username,
            password_hash($password, PASSWORD_BCRYPT),
            $email
        ]);
    }

}