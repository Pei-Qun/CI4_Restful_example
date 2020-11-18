<?php namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{

    protected $DBGroup = 'default';

    public function getMember(
        string $account,
        string $password
    ) {
        $builder = $this->db
            ->table("member")
            ->select("*")
            ->where("account", $account)
            ->where("password", $password);
        $result = $builder->get();
        return $result ? $result : false;
    }

    public function isSigned(
        string $account
    ) {
        $builder = $this->db
            ->table("member")
            ->where("account", $account);
        $result = $builder->countAllResults();
        return $result == 0 ? false : true;
    }

    public function addMember(
        string $name,
        string $email,
        string $account,
        string $password
    ) {
        $builder = $this->db->table("member");
        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => "00000000",
            'account' => $account,
            'password' => $password,
            'type' => 0
        );
        return $builder->insert($data);
    }
}
