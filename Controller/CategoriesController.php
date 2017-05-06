<?php
class CategoriesController extends AppController
{

	var $name = 'Categories';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Category->find("first" , array(
			"recursive" => -1,
			"conditions" => array(
				"Category.public" => 1,
				"Category.path" => $path
			)
		));
		//リダイレクト
		$this->_emptyToNotFound($pageData);
//		pr($pageData);
		//
		//Set
		$this->set("pageData" , $pageData);

		/**
		 * Title Data
		 */
		$titleIds = $this->Title->CategoriesTitle->find("list", array(
			"fields" => "title_id",
			"conditions" => array("category_id" => $pageData["Category"]["id"]),
		));
		//Get
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => array(
					"Title.public" => 1,
					"Title.service_id NOT" => 1,
					"Title.id" =>  $titleIds,
					// "Category.id" => $pageData["Category"]["id"],
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
				// 		'table' => 'categories_titles',
				// 		'alias' => 'CategoriesTitle',
				// 		'type' => 'INNER',
				// 		'conditions' => 'CategoriesTitle.title_id = Title.id'
				// 	),
				// 	array(
				// 		'table' => 'categories',
				// 		'alias' => 'Category',
				// 		'type' => 'INNER',
				// 		'conditions' => 'Category.id = CategoriesTitle.category_id'
				// 	)
				// ),
				// "group" => array("Title.id"),
				// "order" => array("Service.sort, Title.service_start DESC, Title.test_start DESC, Title.test_end DESC"),
				"order" => "Title.service_start DESC",
				"contain" => array("Titlesummary", "Platform", "Category", "Service", "Fee"),
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
		// pr($titles);
		// exit;

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
		// pr($pickups);
		// exit();
		//
		//Set
		$this->set("titles" , $titles);
		$this->set('pickups' , $pickups);
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		$this->Category->recursive = 0;
		$this->set('categories', $this->Category->find("all"));
		//
		$this->set("pankuz_for_layout" , "カテゴリマスタ");
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'category'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('category', $this->Category->read(null, $id));
//	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Category->create();
			if($this->Category->save($this->request->data))
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
		$titles = $this->Category->Title->find('list' , array("order" => "Title.title_official"));
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
			$this->Category->hasAndBelongsToMany["Title"]["conditions"] = "";
			if($this->Category->save($this->request->data))
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
//			$this->Category->recursive = -1;
			$this->request->data = $this->Category->read(null, $id);
		}
		$titles = $this->Category->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout" , array("カテゴリマスタ" , "編集"));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			if($this->Category->saveAll($this->request->data["Category"]))
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
		if($this->Category->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>