<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Exercise.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
require_once __DIR__.'/../controllers/AuthenticationController.php';

class ExerciseController extends AppController
{

    private  $exerciseRepository;
    private $trainingRepository;
    private $authenticationController;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->exerciseRepository = new ExerciseRepository();
        $this->trainingRepository = new TrainingRepository();
        $this->authenticationController = new AuthenticationController();
        $this->userRepository = new UserRepository();
    }

    public function trainingsToBe() {
        if(!AuthenticationController::checkIsUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $this->render('trainingsToBe');
    }

    public function addExercise() {
        AuthenticationController::checkIsUserLogged();

        $trainingID = $this->trainingRepository->getNewestTraining($this->getLoggedUserID());

        $this->exerciseRepository->addExercise(intval($_POST['sets']), intval($_POST['reps']), intval($_POST['RPE']), $_POST['exercise'], $trainingID->getIdTraining());
        $exercises = $this->exerciseRepository->getTrainingByTrainingId($trainingID->getIdTraining());
        return $this->render('trainingsToBe', ['exercises' => $exercises]);
    }

    /**
     * @throws NotFoundException
     */
    private function getLoggedUserID() {
        $decryptedEmail = $this->authenticationController->getDecryptedEmail();
        $user = $this->userRepository->getUser($decryptedEmail);

        if($user) {
            return $user->getUserID();
        }

        throw new NotFoundException("ERROR");
    }


}