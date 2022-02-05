<?php

include_once '../model/reset.model.php';

class ResetController extends ResetModel
{
    public function resetPartial()
    {
        $this->erasePartial();
        $this->changeClassTeacherRole();
    }

    public function resetTotal()
    {
        $this->eraseTotal();
        $this->removeAccounts();
    }
}
