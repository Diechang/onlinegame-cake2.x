<?php
class CategoriesController extends AppController {

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
			"conditions" => array("Category.path" => $path)
		));
		//リダイレクト
		$this->_emptyToHome($pageData);
//		pr($pageData);
		//
		//Set
		$this->set("pageData" , $pageData);

		/**
		 * Title Data
		 */
		//Get
		$this->Title->Behaviors->attach('Containable');
		$titles = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id NOT" => 1,
				"Category.id" => $pageData["Category"]["id"],
			),
			"fields" => array(
				"title_official",
				"title_read",
				"url_str",
				"thumb_name",
				"description",
				"service_id",
				"service_start",
				"test_start",
				"test_end",
				"category_text",
				"fee_id",
				"fee_text",
				"ad_use",
				"ad_text",
				"official_url",
				"Service.*",
				"Fee.*",
			),
			"joins" => array(
				array(
					'table' => 'categories_titles',
					'alias' => 'CategoriesTitle',
					'type' => 'INNER',
					'conditions' => 'CategoriesTitle.title_id = Title.id'
				),
				array(
					'table' => 'categories',
					'alias' => 'Category',
					'type' => 'INNER',
					'conditions' => 'Category.id = CategoriesTitle.category_id'
				)
			),
			"group" => array("Title.id"),
			"order" => array("Service.sort" , "Title.service_start DESC" , "Title.test_start DESC" , "Title.test_end DESC"),
			"contain" => array("Category", "Service", "Fee"),
		));
//		pr($titles);
//		exit;

		$this->Title->unbindAll(array("Titlesummary"));
		$pickups = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.id" => Set::extract($titles , "{n}.Title.id"),
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
			"limit" => 4,
			"order" => array("Title.ad_use DESC , Titlesummary.vote_avg_all DESC , Titlesummary.vote_count_vote DESC"),
		));
//		pr($pickups);
//		exit();
		//
		//Set
		$this->set("titles" , $titles);
		$this->set('pickups' , $pickups);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Category->find("all"));
		//
		$this->set("pankuz_for_layout" , "カテゴリマスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'category'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('category', $this->Category->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->request->data)) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		$titles = $this->Category->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			//コンディションなし - Title.publicが見つからない…
			$this->Category->hasAndBelongsToMany["Title"]["conditions"] = "";
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->request->data)) {
//			$this->Category->recursive = -1;
			$this->request->data = $this->Category->read(null, $id);
		}
		$titles = $this->Category->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout" , array("カテゴリマスタ" , "編集"));
	}

	function sys_lump() {
		if (!empty($this->request->data)) {
			if ($this->Category->saveAll($this->request->data["Category"])) {
				$this->Session->setFlash(Configure::read("Success.lump"));
			} else {
				$this->Session->setFlash(Configure::read("Error.lump"));
				return $this->redirect($this->referer(array('action' => 'index')));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>