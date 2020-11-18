<?php namespace App\Services;

// 20201118
class UserAuth {
  // 下底線是在講成員變數的意思
  private $_session;
  private $_id;
  private $_account;
  private $_name;
  private $_type;
  private $_login = false;

  public function __construct()
  {
    $this->_session = \Config\Services::session();
    $this->handleMemberData();
  }
  
  protected function handleMemberData() {
    if ($this->_session->has("memberData")) {
      $memberData = $this->_session->memberData;
      $this->_login = true;
      $this->_id = $memberData["id"];
      $this->_account = $memberData["account"];
      $this->_name = $memberData["name"];
      $this->_type = $memberData["type"];
    }else{
      $this->_login = false;
    } 
  }

  public function getID() {
    return $this->_id;
  }
  public function getAccount() {
    return $this->_account;
  }
  public function getName() {
    return $this->_name;
  }
  public function getType() {
    return $this->_type;
  }
  /**
   * 是否登入判斷
   *
   * @return boolean
   */
  public function isLogin() {
    return $this->_login;
  }
}

?>