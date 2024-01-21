<?php
require_once 'AppController.php';
require_once __DIR__ . '/../models/Training.php';
require_once __DIR__.'/../repository/TrainingRepository.php';
class TrainingController extends AppController
{
    private $trainingRepository;
    private $authenticationController;
    private $userRepository;
    private $exerciseRepository;

    public function __construct()
    {
        parent::__construct();
        $this->trainingRepository = new TrainingRepository();
        $this->authenticationController = new AuthenticationController();
        $this->userRepository = new UserRepository();
        $this->exerciseRepository = new ExerciseRepository();
    }

    public function trainingHistory() {
        if(!AuthenticationController::checkIsUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        $trainings = $this->trainingRepository->getAllTrainingDone($this->getLoggedUserID());
        $trainingsToDo = $this->trainingRepository->getAllTrainingToDo($this->getLoggedUserID());
        return $this->render('trainingHistory', ['trainings' => $trainings, 'trainingsToDo' => $trainingsToDo,
            'exerciseRepository' => $this->exerciseRepository]);
    }

    public function addTraining() {
        $this->render('addTraining');
    }

    public function addTrainingDatabase() {
        if(!AuthenticationController::checkIsUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        $this->trainingRepository->addTraining($_POST['training'], $this->getLoggedUserID());
        return $this->render('trainingsToBe');
    }

//    public function getAllTrainingsDone() {
//        if(!AuthenticationController::checkIsUserLogged()) {
//            $url = "http://$_SERVER[HTTP_HOST]";
//            header("Location: {$url}/login");
//            exit();
//        }
//
//        $trainings = $this->trainingRepository->getAllTrainingDone($this->getLoggedUserID());
//        return $this->render('trainingHistory', ['trainings' => $trainings]);
//    }

    private function getLoggedUserID() {
        $decryptedEmail = $this->authenticationController->getDecryptedEmail();
        $user = $this->userRepository->getUser($decryptedEmail);

        if($user) {
            return $user->getUserID();
        }

        throw new NotFoundException("ERROR");
    }
}