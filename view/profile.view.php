<?php
include_once '../model/profile.model.php';

class ProfileView extends ProfileModel
{
    public function fetchUserDetails($type, $id)
    {
        if ($type == 'Admin') {
            return $this->getAdminDetails($id);
        } elseif ($type == 'Coordinator') {
            return $this->getCoordinatorDetails($id);
        } elseif ($type == 'Class Teacher') {
            return $this->getClassTeacherDetails($id);
        } elseif ($type == 'Teacher') {
            return $this->getTeacherDetails($id);
        }
    }

    public function checkPass($id, $pass)
    {
        $hashed_pass = $this->passVerification($id);
        if ($hashed_pass) {
            foreach ($hashed_pass as $row_pass) {
                if (!password_verify($pass, $row_pass['password'])) {
                    return 'false';
                } else {
                    return 'true';
                }
            }
        }
    }
}
