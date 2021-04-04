<?php
    require_once 'server_db.php';
    class RegisterModel extends Database {
        public function registerUser(array $user)
        {
            $this->query('INSERT INTO `ic_users` (user_name, user_password, user_rank) VALUES (:name, :passwd, 0)');
            $this->bindParameter(':name', $user['name']);
            $this->bindParameter(':passwd', password_hash($user['password'], PASSWORD_BCRYPT));

            if($this->execute()){
                $result = array(
                    'status' => true
                );
                return $result;
            } else {
                $result = array(
                    'status' => false
                );
                return $result;
            }
        }

        public function fetchUser(string $username)
        {
            $this->query('SELECT * FROM `ic_users` WHERE `user_name` = :name');
            $this->bindParameter(':name', $username);
            $this->execute();

            $user = $this->fetch();
            if(!empty($user)){
                $result = array(
                    'status' => true,
                    'data' => $user
                );
                return $result;
            }
            return array(
                'status' => false,
                'data' => []
            );
        }
    }
?>