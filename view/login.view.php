<?php
include_once '../model/login.model.php';

class LoginView extends LoginModel
{
    public function checkAccount($username, $pass)
    {
        $error = '';
        $acc_details = $this->getAccount($username);
        if ($acc_details) {
            foreach ($acc_details as $row) {
                $hashed_pass = $this->passVerification($row['id']);
                if ($hashed_pass) {
                    foreach ($hashed_pass as $row_pass) {
                        if (!password_verify($pass, $row_pass['password'])) {
                            $error = 'wrong';
                        } else {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['type'] = $row['type'];
                            $_SESSION['username'] = $row['username'];
                            $result = 0;
                            if ($_SESSION['type'] == 'Admin') {
                                $result = $this->getNameAdmin($_SESSION['id']);
                            } elseif ($_SESSION['type'] == 'Coordinator') {
                                $result = $this->getNameCoordinator($_SESSION['id']);
                            } elseif ($_SESSION['type'] == 'Class Teacher') {
                                $result = $this->getNameTeacher($_SESSION['id']);
                                $_SESSION['class'] = $this->getClass($_SESSION['id']);
                                $_SESSION['form'] = $this->getForm($_SESSION['class']);
                            } elseif ($_SESSION['type'] == 'Teacher') {
                                $result = $this->getNameTeacher($_SESSION['id']);
                            }
                            if ($result) {
                                foreach ($result as $row) {
                                    $_SESSION['name'] = $row['name'];
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $error = 'unregistered';
        }
        return $error;
    }
}
