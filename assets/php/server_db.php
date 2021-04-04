<?php
    class Database {
        protected $dbHost = '127.0.0.1';
        protected $dbName = 'inventorscloud';
        protected $dbUser = 'root';
        protected $dbPassword = '';
        protected $dbHandler, $dbStmt;

        public function __construct()
        {
            $link = "mysql:host=".$this->dbHost.';dbname='.$this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbHandler = new PDO($link, $this->dbUser, $this->dbPassword, $options);
            } catch (Exception $e1) {
                var_dump('Verbibndung zur Datenbank konnte nicht hergestellt werden. :(');
            }
        }

        public function query($query)
        {
            $this->dbStmt = $this->dbHandler->prepare($query);
        }

        public function bindParameter($parameter, $value, $type = null){
            if(is_null($type)){
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                                
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->dbStmt->bindValue($parameter, $value, $type);
        }

        public function execute()
        {
            $this->dbStmt->execute();
            return true;
        }

        public function fetch()
        {
            $this->execute();
            return $this->dbStmt->fetch(PDO::FETCH_ASSOC);
        }

        public function fetchAll()
        {
            $this->execute();
            return $this->dbStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>