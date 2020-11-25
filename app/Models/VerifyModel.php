<?php namespace App\Models;

use CodeIgniter\Model;

class VerifyModel extends Model
{
  protected $table      = 'verify';
  protected $primaryKey = 'email';

  protected $returnType = 'array';

  // 要開啟那些欄位
  protected $allowedFields = ['email', 'code'];

  // 要使用時間戳嗎
  protected $useTimestamps = false;
  protected $useSoftDeletes = false;

  // 驗證邏輯
  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;

  public function getCode(
    int $length = 32,
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
  ) : string {
    if (!is_int($length) || $length < 0) {
      return false;
    }
    $characters_length = strlen($characters) - 1;
    $string = '';

    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[mt_rand(0, $characters_length)];
    }
    return $string;
  }

  public function sentMail(string $mail, string $code) : bool {
    $email = \Config\Services::email();
		$email->setFrom('noReplyMeason@gmail.com', '曾霈宭');
		$email->setTo($mail);
		$email->setSubject('註冊驗證信');
		$email->setMessage('你的驗證碼: '.$code);
    
    if(!$email->send()) {
      $err = $email->printDebugger();
      log_message('error', $err);
      return false;
    } else {
      return true;
    }
  }
}