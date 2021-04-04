<?php
    require_once 'server_controller.php';
    require_once 'model_register.php';
    
    class Register extends Contorller {
        private $registerModel;

        public function __construct()
        {
            if(isset($_SESSION['auth_user']))
                header('../../public/app.php');
            $this->registerModel = new RegisterModel();
        }
        
        public function register(array $data){
            $name = stripcslashes(strip_tags($data['name']));
            $password = stripcslashes(strip_tags($data['password']));
            $userStatus = $this->registerModel->fetchUser($name)['status'];
    
            $error = array(
                'name' => '',
                'password' => '',
                'status' => false
            );

            if(preg_match('/[^A-Za-z\s]/', $name)){
                $error['name'] = 'Bitte verwende nur Buchstaben für den Namen!';
                return $error;
            }

            if(empty($userStatus)){
                $error['name'] = 'Der Benutzer konnte nicht angelegt werden!';
                return $error;
            }

            if(strlen($password) < 7){
                $error['password'] = 'Das Password ist zu kurz. Wähle ein Passwort das mindestens 8 Zeichen lang ist!';
                return $error;
            }


            $payload = array(
                'name' => $name,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            );
            $result = $this->registerModel->registerUser($payload);

            $data = $this->registerModel->fetchUser($name)['data'];
            unset($data['password']);

            if(!$result['status']){
                $result['status'] = 'Ein Fehler ist aufgetreten. Bitte versuche es später nochmal...';
                return $result;
            }

            header('location: ../../public/admin_users.php');
            return true;
        }
    }
?>