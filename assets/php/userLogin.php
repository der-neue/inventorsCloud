<?php
    require_once 'server_controller.php';
    require_once 'model_login.php';

    class Login extends Contorller {
        private $loginModel;

        // check if user is already logged in
        public function __construct()
        {
            if(isset($_SESSION['user_auth']))
                header('location: ../../public/app.php');
            $this->loginModel = new LoginModel();
        }

        public function login(array $data)
        {
            $name = stripcslashes(strip_tags($data['user_name']));
            $password = stripcslashes(strip_tags($data['user_password']));
            $userRecords = $this->loginModel->fetchUser($name);

            if(!$userRecords['status']){
                if(password_verify($password, $userRecords['data']['user_password'])){
                    $result = array(
                        'status' => true
                    );
                    $_SESSION['auth_user'] = true;
                    $_SESSION['data'] = $userRecords['data'];
                    header('location: ../../public/app.php');
                }
                $result = array(
                    'status' => false
                );
                return $result;
            }
            $result = array(
                'status' => false
            );
            return $result;
        }
    }
?>