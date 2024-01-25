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
        }
        try{
            $trainings = $this->trainingRepository->getAllTrainingDone($this->getLoggedUserID());
            $trainingsToDo = $this->trainingRepository->getAllTrainingToDo($this->getLoggedUserID());
        } catch (NotFoundException $e) {
            try {
                $trainingsToDo = $this->trainingRepository->getAllTrainingToDo($this->getLoggedUserID());
            } catch (NotFoundException $e) {
                return $this->render('trainingHistory', ['trainings' => [], 'trainingsToDo' => [],
                    'exerciseRepository' => $this->exerciseRepository]);
            }
            $trainings = [];
            return $this->render('trainingHistory', ['trainings' => $trainings, 'trainingsToDo' => $trainingsToDo,
                'exerciseRepository' => $this->exerciseRepository]);
        }
        return $this->render('trainingHistory', ['trainings' => $trainings, 'trainingsToDo' => $trainingsToDo,
            'exerciseRepository' => $this->exerciseRepository]);
    }

    public function addTraining() {
        if(!AuthenticationController::checkIsUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        $this->render('addTraining');
    }

    public function addTrainingDatabase() {
        if(!AuthenticationController::checkIsUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }
        $exercises = [];
        $this->trainingRepository->addTraining($_POST['training'], $this->getLoggedUserID());
        return $this->render('trainingsToBe', ['exercises' => $exercises]);
    }

    public function getData() {
        if(isset($_POST)) {
            $data = file_get_contents("php://input");
            $date = json_decode($data, true);
            echo $date["date"];
            $this->deleteTraining($date["date"]);

        }
    }

    private function deleteTraining($date) {
        $training = $this->trainingRepository->getTrainingByDate($date);
        $this->trainingRepository->deleteTraining($training->getIdTraining(), $training->getDate());
        return $this->render('trainingHistory');
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