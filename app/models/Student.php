<?php
    class Student extends User {

        public static function login($username, $password) {
            $user = Student::getByUsername($username);
            if(!$user) {
                return "User not found";
            }
            if(!password_verify($password, $user["password"])) {
                return "Wrong password";
            }
            $_SESSION["sessionId"] = $user["username"];
            $_SESSION["sessionType"] = "Student";
            return "ok";
        }

        public static function getByTeacher($teacher) {
            $db = Model::connect();
            
            $db = Model::connect();
            
            $stmt = $db->prepare("SELECT * FROM Student WHERE teacher=?");
            $stmt->bind_param("s", $teacher);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows == 0) {
                return false;
            }

            $user = [];
            for($i=0; $i<$result->num_rows; ++$i) {
                array_push($user, $result->fetch_assoc());
            }

            $db->close();
            return $user;
        }

        public static function getByUsername($username) {
            $db = Model::connect();
            
            $stmt = $db->prepare("SELECT * FROM Student WHERE username=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows == 0) {
                return false;
            }

            $stmt->close();
            $db->close();
            return $result->fetch_assoc();
        }

        public static function insert($teacher, $username, $password, $fullname, $email, $phone) {
            $db = Model::connect();
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO Student (teacher, username, password, fullname, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $teacher, $username, $password, $fullname, $email, $phone);
            $stmt->execute();
            $stmt->close();
            $db->close();
        }
    }
?>