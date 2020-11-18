<?php namespace App\Models;

class LoginLogicModel
{

    public function processLogin(\CodeIgniter\Database\ResultInterface $result)
    {
        $row = $result->getRow();
        if (!isset($row)) return false;
        $data = [
            "id" => $row->id,
            "account" => $row->account,
            "name" => $row->name,
            "type" => $row->type
        ];
        return $data;
    }

    public function setSessionData(array $memberData)
    {
        $session = service("session");
        $session->set("memberData", $memberData);
    }

    public function doLogout()
    {
        $session = service("session");
        $session->destroy();
    }
}
