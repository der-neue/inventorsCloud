<?php
    require_once './assets/php/server_controller.php';
    class Logout extends Contorller {
        public function __construct()
        {
            session_destroy();
            header('location: index.html');
        }
    }
?>  