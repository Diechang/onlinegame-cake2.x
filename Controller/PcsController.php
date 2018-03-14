<?php
class PcsController extends AppController
{

	var $name = 'Pcs';
	var $components	= array("LumpEdit");

	function index()
	{
		$this->Pc->Title->unbindAll(array("Titlesummary"));
		$titles = $this->Pc->Title->find("all", array(
			"conditions" => array(
				"Titlesummary.pc_count >" => 0,
			),
			"order" => array("Title.service_start DESC", "Title.service_id DESC"),
		));
		foreach($titles as &$title)
		{
			$title["lowestPrice"] = $this->Pc->field("price",
				array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"]
				),
				"Pc.price"
			);
			$title["desktopCount"] = $this->Pc->find("count", array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 1,
				),
			));
			$title["noteCount"] = $this->Pc->find("count", array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 2,
				),
			));
		}
//		pr($titles);
//		exit;

		$this->set("titles", $titles);
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		$w			= !empty($this->request->query["w"])			? $this->request->query["w"] : null;
		$title_id	= !empty($this->request->query["title_id"])		? $this->request->query["title_id"] : null;
		$pcshop_id	= !empty($this->request->query["pcshop_id"])	? $this->request->query["pcshop_id"] : null;
		$pctype_id	= !empty($this->request->query["pctype_id"])	? $this->request->query["pctype_id"] : null;
		$pcgrade_id	= !empty($this->request->query["pcgrade_id"])	? $this->request->query["pcgrade_id"] : null;

		$this->set(compact("w", "title_id", "pcshop_id", "pctype_id", "pcgrade_id"));
		//
		$conditions = array();

		//タイトルID
		if(isset($title_id))
		{
			$conditions += array("Pc.title_id" => $title_id);
			//title data
			$titleAddData = $this->Title->find("first", array(
				"recursive" => -1,
				"conditions" => array("Title.id" => $title_id),
				"fields" => array("Title.title_official", "Title.id"),
			));
//			pr($titleData);
//			exit;
			$this->set("titleAddData", $titleAddData);
		}
		//ショップID
		if(isset($pcshop_id))
		{
			$conditions += array("Pc.pcshop_id" => $pcshop_id);
		}
		//検索ワード
		if(isset($w) && !empty($w))
		{
			$conditions += array("OR" => $this->Pc->wConditions(urldecode($w)));
		}
		//タイプ
		if(isset($pctype_id) && !empty($pctype_id))
		{
			$conditions += array("Pc.pctype_id" => $pctype_id);
		}
		//グレード
		if(isset($pcgrade_id) && !empty($pcgrade_id))
		{
			$conditions += array("Pc.pcgrade_id" => $pcgrade_id);
		}

		$pcs = $this->Pc->find("all", array(
			"conditions" => $conditions,
			"fields" => array(
				"Pc.*",
				"Pctype.*",
				"Pcgrade.*",
				"Pcshop.shop_name",
				"Title.title_official",
			),
			"order" => "Pc.id DESC",
		));
		$titles = $this->Pc->Title->find("list", array(
			"conditions" => array(
				"Title.id" => $this->Pc->find("list", array(
					"fields" => "Pc.title_id",
				))
			),
		));
		$titlesCount	= $this->Pc->Title->titleListWithSummaryCount("pc_count", "Pc");
		$pcshops		= $this->Pc->Pcshop->find("list");
		$pctypes		= $this->Pc->Pctype->find("list");
		$pcgrades		= $this->Pc->Pcgrade->find("list");
		$this->set(compact("pcs", "titles", "titlesCount", "pcshops", "pctypes", "pcgrades"));
		//
		$this->set("pankuz_for_layout", "PC一覧");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//		{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'pc'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('pc', $this->Pc->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Pc->create();
			if($this->Pc->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				if(!empty($this->request->data["Pc"]["title_id"]))
				{
					return $this->redirect(array('action' => 'index', "?" => array('title_id' => $this->request->data["Pc"]["title_id"])));
				}
				else
				{
					return $this->redirect(array('action' => 'index'));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//タイトルID
		if(isset($this->request->query["title_id"]))
		{
			$conditions = array("Title.id" => $this->request->query["title_id"]);
			$this->set("withTitle", true);
		}
		else
		{
			$conditions = array();
		}
		$titles = $this->Pc->Title->find('list', array(
			"conditions" => $conditions,
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "PC一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_edit($id = null)
	{
		if(!$id && empty($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if(!empty($this->request->data))
		{
			if($this->Pc->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index', "?" => array('title_id' => $this->request->data["Pc"]["title_id"])));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if(empty($this->request->data))
		{
			$this->request->data = $this->Pc->read(null, $id);
		}
		$titles = $this->Pc->Title->find('list', array(
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "PC一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Pc"], $this->Pc))
			{
//				pr($this->request->data["Pc"]);
//				exit;
				if($this->Pc->saveAll($this->request->data["Pc"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdatePcs()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
				}
				else
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

	function sys_copy($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Pc->recursive = -1;
		$this->request->data = $this->Pc->read(null, $id);
//		pr($this->request->data);
//		exit;
		$this->request->data["Pc"]["public"] = 0;
		unset($this->request->data["Pc"]["id"]); //ID削除 = 新規登録
		$this->Pc->create();
		if($this->Pc->save($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Success.copy"));
			return $this->redirect(array('action' => 'index', "?" => array("title_id" => $this->request->data["Pc"]["title_id"])));
		}
		$this->Session->setFlash(Configure::read("Error.copy"));
		$referer = $this->referer();
		return $this->redirect($referer);
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if($this->Pc->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$referer = $this->referer();
		return $this->redirect($referer);
	}
}
?>