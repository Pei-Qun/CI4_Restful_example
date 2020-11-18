<?php namespace App\Controllers;

class Member extends BaseController
{
	public function index()
	{
		if(!$this->auth->isLogin()) return redirect()->to("/login") ;
		$viewData = [
				"name" => $this->auth->getName()
		];
		return view('member_view',$viewData);
	}
    
}
?>