<?php

include_once '../model/coordinator.model.php';

class CoordinatorController extends CoordinatorModel
{
    public function registerCoordinator($username, $pass, $name, $position)
    {
        return $this->insertCoordinator($username, $pass, $name, $position);
    }

    public function removeCoordinator($id)
    {
        $this->deleteCoordinator($id);
    }

    public function removeAccount($id)
    {
        $this->deleteAccount($id);
    }

    public function editAccount($username, $pass, $id)
    {
        $this->updateAccount($username, $pass, $id);
    }

    public function isUsername($username)
    {
        return $this->checkUsername($username);
    }
}
