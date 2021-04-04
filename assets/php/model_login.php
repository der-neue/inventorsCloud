<?php
    require_once 'server_db.php';
    class LoginModel extends Database {
        public function fetchUser(string $username)
        {
            $this->query('SELECT * FROM `ic_users` WHERE `user_name` = :name');
            $this->bindParameter(':name', $username);
            $this->execute();

            $user = $this->fetch();
            if(empty($user)){
                $result = array(
                    'status' => true,
                    'data' => $user
                );
                return $result;
            }
            if(!empty($user)){
                $result = array(
                    'status' => false,
                    'data' => $user
                );
                return $result;
            }
        }
    }
?>