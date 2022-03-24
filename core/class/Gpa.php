<?php 
    class Gpa {
        protected $pdo;
        
        function __construct($pdo) {
            $this->pdo = $pdo;
        }


        public function checkInput($var){
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripcslashes($var);
            return $var;
        }

        public function checkNames($firstName, $last_name, $email, $phoneNumber, $department, $institution) {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `first_name` = :first_name AND `last_name` = :last_name AND `email` = :email AND `phone` = :phone AND `institution` = :institution AND `dept` = :dept");
            $stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phoneNumber, PDO::PARAM_STR);
            $stmt->bindParam(":institution", $institution, PDO::PARAM_STR);
            $stmt->bindParam(":dept", $department, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();

            if($count > 0){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $stmt = $this->pdo->prepare("SELECT `gp_id` FROM `signup` WHERE `email` = :email AND `pass_word` = :passwords");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", md5($password), PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();

           if($count > 0) {
                //return $count;
                $_SESSION['gp_id'] = $user->gp_id;
                header('Location: ../'.cgpa.'');
            } else {
                return false;
            }
        }

        public function checkMail($email){
            $stmt = $this->pdo->prepare("SELECT * FROM `signup` WHERE `email` = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
    
            if($count > 0) {
                return true;
            } else {
                return false;
            }
            
        }

        public function register() {
            $count = count($_POST['name']);
            for ($i = 0; $i < $count; $i++) {
                $stmt = $this->pdo->prepare("INSERT INTO `student_grades` (`gp_id`, `course_code`, `course_score`, `grade`, `course_unit`, `course_point`, `unit_point`, `gpa_grade`) VALUES('{$_POST[$id][$i]}', '{$_POST['code'][$i]}', '{$_POST['score'][$i]}', '{$_POST['grade'][$i]}', '{$_POST['unit'][$i]}', '{$_POST['poin'][$i]}', '{$_POST['unitpoint'][$i]}', 'gpascore');");

                $stmt->execute();

                $id = $this->pdo->lastInsertId();
                $_SESSION['gp_id'] = $id;
                // $count = $stmt->rowCount();
            }
        }

        public function userData($gp_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `signup` WHERE `gp_id` = :gp_id");
            $stmt->bindParam(":gp_id", $gp_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //fetch all departments from database
        public function getAllStuNames(){
            $stmt = $this->pdo->prepare("SELECT * FROM `signup`");
            $stmt->execute();
            
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $multi;
        }
        
        public function create($table, $fields = array()) {
            // remove the , from the key values in the fields(i.e the values input into databse)
            $columns = implode(',', array_keys($fields));
            $values = ':'.implode(', :', array_keys($fields));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $data) {
                    $stmt->bindValue(`:`.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }

        public function update($table, $id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `id` = {$id}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        public function logout() {
            $_SESSION = array();
            session_destroy();
            header('Location: '.BASE_URL.'');
        }

        public function loggedIn() {
            return (isset($_SESSION['gp_id'])) ? true : false;
        }
        
    }
?>
