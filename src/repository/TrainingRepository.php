<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Training.php';

class TrainingRepository extends Repository
{

    public function addTraining(string $date, int $idUser) {
        $statement = $this->database->connect()->prepare('
        INSERT INTO trainings (id_user, date)
        VALUES (?, ?)
        ');

        $statement->execute([
            $idUser,
            $date
        ]);
    }

    public function getNewestTraining($idUser) {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM trainings ORDER BY id_training DESC LIMIT 1
        ');

        $statement->execute();

        $training = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$training) {
            throw new NotFoundException("Training not found.");
        }

        return new Training(
            $training['date'],
            $training['id_training'],
            $training['id_user']
        );
    }

    public function getAllTrainingDone($idUser) {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM trainings WHERE date < CURRENT_DATE;
        ');

        $statement->execute();
        $trainings = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$trainings) {
            throw new NotFoundException("Date not found");
        }


        foreach ($trainings as $training) {
            $result[] = new Training(
                $training['date'],
                $training['id_training'],
                $training['id_user']
            );
        }
        return $result;
    }

    public function getAllTrainingToDo($idUser) {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM trainings WHERE date >= CURRENT_DATE;
        ');

        $statement->execute();
        $trainings = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$trainings) {
            throw new NotFoundException("Date not found");
        }


        foreach ($trainings as $training) {
            $result[] = new Training(
                $training['date'],
                $training['id_training'],
                $training['id_user']
            );
        }
        return $result;
    }

    public function getTrainingByDate($date) {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM trainings WHERE date = \''.$date.'\'
        ');

        $statement->execute();
        $details = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($details as $detail) {
            return new Training($detail['date'], $detail['id_training'], $detail['id_user']);
        }
    }

    public function deleteTraining($id, $date) {
        $statement = $this->database->connect()->prepare('
        DELETE FROM trainings WHERE id_training = (?) AND date = (?)
        ');

        $statement->execute([
            $id,
            $date
        ]);
    }
}