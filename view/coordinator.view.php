<?php
include_once '../model/coordinator.model.php';

class CoordinatorView extends CoordinatorModel
{
    public function fetchAllAccounts()
    {
        return $this->getAllAccounts();
    }

    public function fetchDetails($id)
    {
        return $this->getDetails($id);
    }

    public function fetchId($id)
    {
        $result = $this->getId($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    public function fetchUsername($id)
    {
        return $this->getUsername($id);
    }
}
