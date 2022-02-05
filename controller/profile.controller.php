<?php

include_once '../model/profile.model.php';

class ProfileController extends ProfileModel
{
    public function getDetails($id)
    {
        $this->getDetails($id);
    }

    public function editProfileCoordinator($id, $name, $position, $email, $contact, $username)
    {
        $this->updateCoordinator($id, $name, $position, $email, $contact, $username);
    }

    public function editProfileTeacher($id, $name, $contact, $username)
    {
        $this->updateTeacher($id, $name, $contact, $username);
    }

    public function editProfileAdmin($id, $name, $address, $username)
    {
        $this->updateAdmin($id, $name, $address, $username);
    }

    public function editPass($id, $pass)
    {
        $this->updatePass($id, $pass);
    }
}
