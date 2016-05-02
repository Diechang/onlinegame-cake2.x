<?php
App::uses("CakeEmail", "Network/Email");

class FansitesController extends AppController
{

	var $name = 'Fansites';
	var $components = array("LumpEdit", "Common");

	function add($id)
	{
		/**
		 * Title data
		 */
		$title = $this->Title->find("first", array(
			"conditions" => array(
				"Title.id" => $id,
			)
		));
// 		pr($title);
		// exit;
		if(!empty($this->request->data))
		{
			//認証番号チェック
			if($this->Common->spamCheck($this->request->data["Fansite"]["spam_num"]))
			{
				//Save
				$this->Fansite->create();
				if($this->Fansite->save($this->request->data))
				{
					$editUrl	= Router::url(array('action' => 'edit', $this->Fansite->id, 'sys' => true), true);
					$listUrl	= Router::url(array('action' => 'index', "?" => array("title_id" => $title["Title"]["id"]), 'sys' => true), true);
					//Send mail
					$email = new CakeEmail("sakura");
					$email->from(!empty($this->request->data["Fansite"]["admin_mail"])
						? $this->request->data["Fansite"]["admin_mail"]
						: array("zilow@dz-life.net" => "DZ-LIFE"));
					$email->to('zilow@dz-life.net');
					$email->subject('[DZ]ファンサイト登録依頼');

					$email->send("
■サイト名
{$this->request->data['Fansite']['site_name']}

■サイトURL
{$this->request->data['Fansite']['site_url']}

■リンクURL
{$this->request->data['Fansite']['link_url']}

■メッセージ
{$this->request->data['Fansite']['message']}

■編集URL
{$editUrl}

■{$title['Title']['title_official']}ファンサイト一覧
{$listUrl}
					");
					//
					$this->Session->setFlash("サイト登録申込ありがとうございます！<br />\n管理人の承認後に掲載されます。");
					return $this->redirect(array("controller" => "titles", "action" => "link", "path" => $title["Title"]["url_str"], "ext" => "html"));
				}
				else
				{
					$this->Session->setFlash("登録できませんでした。<br />\n入力内容を確認してください。");
				}
			}
			else
			{
				$this->Session->setFlash("認証番号が不正です");
			}
		}
		//Set
		$this->set("title", $title);

		$this->set("metaTags", array("noindex"));
	}

	//リンク切れ報告
	function report($id = null)
	{
		$this->_emptyToHome($this->referer());
		$this->_emptyToHome($id);
		$this->request->data = $this->Fansite->find("first", array(
			"conditions" => array(
				"Fansite.id" => $id,
			),
		));
		$reported = $this->request->data["Fansite"]["public"];
		if($reported)
		{
			$this->request->data["Fansite"]["public"] = false;
			if($this->Fansite->save($this->request->data))
			{
				$editUrl	= Router::url(array('action' => 'edit', $this->request->data['Fansite']['id'], 'sys' => true), true);
				$listUrl	= Router::url(array('action' => 'index', "?" => array("title_id" => $this->request->data['Fansite']['title_id']), 'sys' => true), true);
				$email = new CakeEmail("sakura");
				//Send mail
				$email->from(array("zilow@dz-life.net" => "DZ-LIFE"));
				$email->to('zilow@dz-life.net');
				$email->subject('[DZ]ファンサイトリンク切れ報告');
				$email->send("
■サイト名
{$this->request->data['Fansite']['site_name']}

■サイトURL
{$this->request->data['Fansite']['site_url']}

■編集URL
{$editUrl}

■{$this->request->data['Title']['title_official']}ファンサイト一覧
{$listUrl}

				");
				//
				$this->Session->setFlash("リンク切れ報告を受け付けました。<br />\nご協力ありがとうございます。");
			}
			else
			{
				$this->Session->setFlash("エラーが発生しました。");
			}
		}
		else
		{
			$this->Session->setFlash("すでに非公開リンクとなっています。<br />\nご協力ありがとうございます。");
		}
		return $this->redirect($this->referer());
	}

	/**
	 * Sys
	 */
	function sys_index()
	{
		$title_id	= !empty($this->request->query["title_id"])	? $this->request->query["title_id"] : null;
		$w			= !empty($this->request->query["w"])		? $this->request->query["w"] : null;

		$this->set(compact("title_id", "w"));
		//
		//Fansite data
		$fConditions = array();
		if(isset($w))
		{
			$fConditions["OR"] = array(
					"Fansite.site_name LIKE '%" . $w . "%'",
					"Fansite.site_url LIKE '%" . $w . "%'",
					"Fansite.description LIKE '%" . $w . "%'",
			);
		}
		if(isset($title_id))
		{
			$fConditions["Fansite.title_id"] = $title_id;
		}
		$this->Fansite->recursive = 2;
		$this->Fansite->Title->unbindAll(array("Titlesummary"));
		$this->set('fansites', $this->Fansite->find("all", array(
			"conditions" => $fConditions,
			"fields" => array(
				"Fansite.*",
				"Title.*",
			),
			"order" => "Fansite.id DESC"
		)));
		//
		//Title data
		$titles =  $this->Fansite->Title->find("list", array(
			"conditions" => (!empty($title_id)) ? array("Title.id" => $title_id) : null,
			"order" => "Title.title_official",
		));
		$titlesCount = $this->Fansite->Title->titleListWithSummaryCount("fansite_count", "Fansite");

		//
		$this->set(compact("titles", "titlesCount"));
		//
		if(!empty($title_id))
		{
			$this->set("pankuz_for_layout", array(
				array("str" => "ファンサイト一覧", "url" => array("action" => "index")),
				$this->Fansite->Title->field("title_official", array("Title.id" => $title_id)),
			));
			// $this->set("title_id", $title_id);
		}
		else
		{
			$this->set("pankuz_for_layout", "ファンサイト一覧");
			// $this->set("title_id", 0);
		}
	}

//	function sys_view($id = null)
//	{
//		if (!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'fansite'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('fansite', $this->Fansite->read(null, $id));
//	}

	function sys_add()
	{
		if (!empty($this->request->data))
		{
			$this->Fansite->create();
			if ($this->Fansite->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index', "?" => array("title_id" => $this->request->data["Fansite"]["title_id"])));
			} else
			{
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

	function sys_edit($id = null)
	{
		if (!$id && empty($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data))
		{
			if ($this->Fansite->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index', "?" => array("title_id" => $this->request->data["Fansite"]["title_id"])));
			} else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data))
		{
			$this->request->data = $this->Fansite->read(null, $id);
		}
		//
		$this->set("titles", $this->Fansite->Title->find('list', array("order" => "Title.title_official")));
		$this->set("pankuz_for_layout", array(
			array("str" => "ファンサイト一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if (!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Fansite"], $this->Fansite))
			{
				if ($this->Fansite->saveAll($this->request->data["Fansite"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
				} else
				{
					$this->Session->setFlash(Configure::read("Error.lump"));
					return $this->redirect($this->referer(array('action' => 'index')));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if ($this->Fansite->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>