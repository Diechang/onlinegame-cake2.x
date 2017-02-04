<?php
class StylesController extends AppController
{

	var $name = 'Styles';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Style->find("first", array(
			"recursive" => -1,
			"conditions" => array("Style.path" => $path)
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
		$titleIds = $this->Title->StylesTitle->find("list", array(
			"fields" => "title_id",
			"conditions" => array("style_id" => $pageData["Style"]["id"]),
		));
		//Get
		// $this->Title->Behaviors->attach('Containable');
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => array(
					"Title.public" => 1,
					"Title.service_id NOT" => 1,
					"Title.id" => $titleIds,
					// "Style.id" => $pageData["Style"]["id"],
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
					"Titlesummary.*",
					"Service.*",
					"Fee.*",
				),
				// "joins" => array(
				// 	array(
				// 		'table' => 'styles_titles',
				// 		'alias' => 'StylesTitle',
				// 		'type' => 'INNER',
				// 		'conditions' => 'StylesTitle.title_id = Title.id'
				// 	),
				// 	array(
				// 		'table' => 'styles',
				// 		'alias' => 'Style',
				// 		'type' => 'INNER',
				// 		'conditions' => 'Style.id = StylesTitle.style_id'
				// 	)
				// ),
				// "group" => array("Title.id"),
				// "order" => array("Service.sort", "Title.service_start DESC", "Title.test_start DESC", "Title.test_end DESC"),
				"order" => "Title.service_start DESC",
				"contain" => array("Titlesummary", "Category", "Service", "Fee"),
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
//		pr($dataTitles);
//		exit;

		// $this->Title->unbindAll(array("Titlesummary"));
		$pickups = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.id" => $titleIds,
				"Title.service_id !=" => 1,
				"Titlead.pc_text_src !=" => null,
				"OR" => array(
					"Titlead.pc_start <=" => date("Y-m-d H:i"),
					"Titlead.pc_start" => null,
				),
				"AND" => array(
					"OR" => array(
						"Titlead.pc_end >=" => date("Y-m-d H:i"),
						"Titlead.pc_end" => null,
					),
				),
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.service_id",
				"Titlesummary.*"
			),
			"limit" => 5,
			"order" => array("Titlesummary.vote_avg_all DESC , Titlesummary.vote_count_vote DESC, Title.service_start DESC"),
			"contain" => array("Titlesummary", "Titlead")
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
		$this->Style->recursive = 0;
		$this->set('styles', $this->Style->find("all"));
		//
		$this->set("pankuz_for_layout", "スタイルマスタ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'style'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('style', $this->Style->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Style->create();
			if($this->Style->save($this->request->data))
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
		$titles = $this->Style->Title->find('list', array("order" => "Title.title_official"));
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
			$this->Style->hasAndBelongsToMany["Title"]["conditions"] = "";
			if($this->Style->save($this->request->data))
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
//			$this->Style->recursive = -1;
			$this->request->data = $this->Style->read(null, $id);
		}
		$titles = $this->Style->Title->find('list', array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout", array("スタイルマスタ", "編集"));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			if($this->Style->saveAll($this->request->data["Style"]))
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
		if($this->Style->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>