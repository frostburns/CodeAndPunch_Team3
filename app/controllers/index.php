<?php
    class Index extends Controller {

        public function __construct() {
            parent::__construct();
            self::model("File");
        }

        public function render() {
            return self::view("index");
        }

        public function logout() {
            User::logout();
            return self::redirect("index");
        }

        public function delete($user = "") {
            if($_SESSION["user"] === $this->User->getByUsername($user)["teacher"]) {
                $this->User->delete($user);
                File::deleteDir("../uploads/handin/$user");
            }
            return self::redirect("manage");
        }
    }
?>