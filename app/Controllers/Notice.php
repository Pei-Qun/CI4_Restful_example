<?php namespace App\Controllers;
// 20201105
use CodeIgniter\RESTful\ResourceController;

class Notice extends ResourceController
{

  protected $modelName = 'App\Models\NoticeModel';
  protected $format    = 'json';
  protected function isLogin()
	{
		if (\Config\Services::session()->has("memberData")) {
			return true;
		}
		return false;
	}

  public function index()
  {
    if($this->isLogin()){
      return $this->respond($this->model->findAll());
    } else {
      return $this->failUnauthorized("尚未登入");
    }
    // return $this->respond(["msg"=>"index on"]);
  }
  public function show($id = null)
  {
    return $this->respond($this->model->find($id));
  }

  public function create()
  {
    $title = $this->request->getPost("title");
    $content = $this->request->getPost("content");
    $data = [
      "title" => $title,
      "content" => $content
    ];
    $newKey = $this->model->insert($data);
    return $this->respond([
      "msg" => "create on",
      "key" => $newKey
    ]);
  }

  public function update($id = null)
  {
    $data = $this->request->getJSON(true);
    $updateData = [
      "title" => $data["title"],
      "content" => $data["content"]
    ];
    $this->model->update($id, $updateData);
    return $this->respond([
      "msg"=>"update on",
      "id" => $id
    ]);
  }

  public function delete($id = null)
  {
    $this->model->delete($id);
    return $this->respond([
      "msg"=>"delete on",
      "id" => $id
    ]);
  }


  // ...
}