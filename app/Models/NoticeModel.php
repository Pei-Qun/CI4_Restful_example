<?php namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
  protected $table      = 'notice';
  protected $primaryKey = 'key';

  protected $returnType = 'array';

  // 要開啟那些欄位
  protected $allowedFields = ['title', 'content'];

  // 要使用時間戳嗎
  protected $useTimestamps = true;
  protected $useSoftDeletes = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  // 驗證邏輯
  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;
}