<?php
class UsersController extends AppController
{

	var $name = 'Users';

/**
 * System login/logout
 */
	function sys_login()
	{
		if($this->request->is('post'))
		{
			if($this->Auth->login())
			{
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Session->setFlash(
					"ユーザ名もしくはパスワードが違います。",
					'default',
					array(),
					'auth'
				);
			}
		}
		$this->set("pankuz_for_layout", "ログイン");
	}
	function sys_logout()
	{
		return $this->redirect($this->Auth->logout());
	}
}
?>