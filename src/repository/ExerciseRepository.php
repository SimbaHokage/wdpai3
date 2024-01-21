<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Exercise.php';
class ExerciseRepository extends Repository {

    public function getExercise(int $id): ?Exercise
    {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM training_details where id = :id
        ');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $exercise = $statement->fetch(PDO::FETCH_ASSOC);


        return new Exercise(
            $exercise['exercise_name'],
            $exercise['sets'],
            $exercise['reps'],
            $exercise['rpe']
        );
    }

    public function addExercise(int $sets, int $reps, int $rpe, string $exercise_name, int $trainingID) {
        $statement = $this->database->connect()->prepare('
        INSERT INTO training_details (sets, reps, rpe, exercise_name, id_training) 
        VALUES (?, ?, ?, ?, ?)
        ');

        $statement->execute([
            $sets,
            $reps,
            $rpe,
            $exercise_name,
            $trainingID
        ]);
    }


    public function getTrainingByTrainingId(int $trainingID) {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT training_details.exercise_name, training_details.reps, training_details.sets,
                training_details.rpe
            FROM training_details
            WHERE training_details.id_training = '.$trainingID.'
        ');
        $statement->execute();
        $exercises = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($exercises as $exercise) {
            $result[] = new Exercise(
                $exercise['exercise_name'],
                $exercise['sets'],
                $exercise['reps'],
                $exercise['rpe']
            );
        }
        return $result;
    }
}