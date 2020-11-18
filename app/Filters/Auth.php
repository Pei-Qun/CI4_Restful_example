<?php namespace App\Filters;

// 20201118
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $auth = \Config\Services::UserAuth();
        if(!$auth->isLogin()) {
          throw new \CodeIgniter\Exceptions\PageNotFoundException("沒有權限",401);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
?>