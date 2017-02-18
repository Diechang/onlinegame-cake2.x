<?php
class PlatformsController extends AppController
{

	var $name = 'Platforms';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Platform->find("first", array(
			"recursive" => -1,
			"conditions" => array(
				"Platform.public" => 1,
				"Platform.path" => $path
			)
		));
		//リダイレクト
		$this->_emptyToHome($pageData);
//		pr($pageData);
		//
		//Set
		$this->set("pageData", $pageData);

		/**
		 * Title Data
		 */
		$titleIds = $this->Title->PlatformsTitle->find("list", array(
			"fields" => "title_id",
			"conditions" => array("platform_id" => $pageData["Platform"]["id"]),
		));
		//Get
		// $this->Title->Behaviors->attach('Containable');
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => array(
					"Title.public" => 1,
					"Title.service_id NOT" => 1,
					"Title.id" => $titleIds,
					// "Platform.id" => $pageData["Platform"]["id"],
				),
				"fields" => array(
					"Title.title_official",
					"Title.title_read",
					"Title.url_str",
					"Title.thumb_name",
					"Title.description",
					"Title.service_id",
					"Title.service_start",
					"Title.test_start",
					"Title.test_end",
					"Title.category_text",
					"Title.fee_id",
					"Title.fee_text",
					"Title.ad_use",
					"Title.ad_text",
					"Title.official_url",
					"Titlesummary.*",
					"Service.*",
					"Fee.*",
				),
				// "joins" => array(
				// 	array(
				// 		'table' => 'platforms_titles',
				// 		'alias' => 'PlatformsTitle',
				// 		'type' => 'INNER',
				// 		'conditions' => 'PlatformsTitle.title_id = Title.id'
				// 	),
				// 	array(
				// 		'table' => 'platforms',
				// 		'alias' => 'Platform',
				// 		'type' => 'INNER',
				// 		'conditions' => 'Platform.id = PlatformsTitle.platform_id'
				// 	)
				// ),
				// "group" => array("Title.id"),
				// "order" => array("Service.sort", "Title.service_start DESC", "Title.test_start DESC", "Title.test_end DESC"),
				"order" => "Title.service_start DESC",
				"contain" => array("Titlesummary", "Platform", "Category", "Service", "Fee"),
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
//		pr($dataTitles);
//		exit;

		// $this->Title->unbindAll(array("Titlesummary"));
		$pickups = $this->Title->find("all", array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.id" => $titleIds,
				"NOT" => array("Title.service_id" => 1),
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.service_id",
				"Title.ad_use",
				"Titlesummary.*"
			),
			"limit" => 5,
			"order" => array("Title.ad_use DESC, Titlesummary.vote_avg_all DESC, Titlesummary.vote_count_vote DESC"),
			"contain" => "Titlesummary",
		));
//		pr($relations);
//		exit();
		//
		//Set
		$this->set("titles", $titles);
		$this->set('pickups', $pickups);
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		$this->Platform->recursive = 0;
		$this->set('platforms', $this->Platform->find("all"));
		//
		$this->set("pankuz_for_layout", "プラットフォームマスタ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'platform'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('platform', $this->Platform->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Platform->create();
			if($this->Platform->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		$titles = $this->Platform->Title->find('list', array("order" => "Title.title_official"));
		$this->set(compact('titles'));
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
			//コンディションなし - Title.publicが見つからない…
			$this->Platform->hasAndBelongsToMany["Title"]["conditions"] = "";
			if($this->Platform->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if(empty($this->request->data))
		{
//			$this->Platform->recursive = -1;
			$this->request->data = $this->Platform->read(null, $id);
		}
		$titles = $this->Platform->Title->find('list', array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout", array("プラットフォームマスタ", "編集"));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			if($this->Platform->saveAll($this->request->data["Platform"]))
			{
				$this->Session->setFlash(Configure::read("Success.lump"));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect($this->referer(array('action' => 'index')));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if($this->Platform->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>