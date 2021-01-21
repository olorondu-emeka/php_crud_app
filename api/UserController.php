<?php 
    use UserRepository;

    class UserController {
        private $dbConnection;
        private $requestMethod;
        private $UserRepository;
        private $userId;

        public function __construct($id, $dbConnection, $requestMethod)
        {
            $this->dbConnection = $dbConnection;
            $this->requestMethod = $requestMethod;
            $this->userId = $id;
            $this->UserRepository = new UserRepository($db);
        }

        public function processRequest(){
            $response;

            switch($this->requestMethod){
                case 'GET':
                    $response = $this->getUsers();
                    break;
                case 'POST':
                    $response = $this->createUser();
                    break;
                case 'PUT':
                    $response = $this->updateUser($this->userId);
                    break;
                case 'DELETE':    
                    $response = $this->deleteUser($this->userId);
                    break;
                default:
                    $response = $this->notFoundResponse();
                    break;    
            }

            header($response['status_code_header']);
            return $response;
        }

        private function getUsers() {
            $users = $this->UserRepository->findAll();
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($result);
            return $response;
        }

        private function createUser(){
            $usersArray = (array) json_decode(file_get_contents('php://input'), TRUE); 
            $message = $this->UserRepository->create($usersArray);
            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = json_encode(array('message' => "$message"));
            return $response;
        }

        private function updateUser($id){
            
        }
    }

?>