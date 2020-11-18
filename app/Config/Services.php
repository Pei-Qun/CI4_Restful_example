<?php namespace Config;

use CodeIgniter\Config\Services as CoreServices;

require_once SYSTEMPATH . 'Config/Services.php';

// 20201118
// use App\Services\UserAuth;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends CoreServices
{
	// 20201118
	// 後面 : UserAuth 是確定甚麼型態物件的意思
		public static function userAuth($getShared = true) : \App\Services\UserAuth
		{
			if ($getShared)
			{
				// getSharedInstance(這裡的參數要跟上面 func 的參數依樣)
				return static::getSharedInstance('userAuth');
			}

			return new \App\Services\UserAuth;
		}
}
