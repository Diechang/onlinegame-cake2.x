<?php
class EventsController extends AppController
{

	var $name = 'Events';
	var $components	= array("LumpEdit");
	var $helpers	= array("Paginator");

	var $paginate = array(
		"Event" => array(
			"limit" => 10,
			"order" => "Event.created DESC",
			"conditions" => array(
				"Event.public" => 1,
			),
			"fields" => array(
				"Event.*",
				"Title.title_official",
				"Title.title_read",
				"Title.thumb_name",
				"Title.url_str",
			),
			"paramType" => "querystring",
		),
	);

	function index()
	{
		// $page = (!empty($this->request->params["page"])) ? $this->request->params["page"] : 1;
		// $this->request->params["page"] = $page;

		$this->Paginator->settings = $this->paginate;

		/**
		 * Review Data
		 */
		//Get
		$events = $this->Paginator->paginate("Event");
//		pr($events);
		//
		//Set - data
		$this->set("events", $events);
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
		$conditions = array();

		//タイトルID
		if(isset($title_id))
		{
			$conditions += array("Event.title_id" => $title_id);
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
		//検索ワード
		if(isset($w) && !empty($w))
		{
			$conditions += array("OR" => $this->Event->wConditions(urldecode($w)));
		}

		//find
		$events = $this->Event->find("all", array(
			"conditions" => $conditions,
			"fields" => array(
				"Event.*",
				"Title.title_official",
				"Title.url_str",
			),
			"order" => "Event.id DESC",
		));
		$titles = $this->Event->Title->find("list", array(
			"conditions" => array(
				"Title.id" => $this->Event->find("list", array(
					"fields" => "Event.title_id",
				))
			),
		));
		$titlesCount = $this->Event->Title->titleListWithSummaryCount("event_count", "Event");
		$this->set(compact("events", "titles", "titlesCount"));
		//
		$this->set("pankuz_for_layout", "イベント一覧");
	}

	function sys_add()
	{
		if(!empty($this->request->data))
		{
			$this->Event->create();
			if($this->Event->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.create"));
				if(!empty($this->request->data["Event"]["title_id"]))
				{
					return $this->redirect(array('action' => 'index', 'title_id' => $this->request->data["Event"]["title_id"]));
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
		$titles = $this->Event->Title->find('list', array(
			"conditions" => $conditions,
			"order" => "Title.title_official",
		));

		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "イベント一覧", "url" => array("action" => "index")),
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
			if($this->Event->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if(empty($this->request->data))
		{
			$this->request->data = $this->Event->read(null, $id);
		}
		$titles = $this->Event->Title->find('list', array(
			"order" => "Title.title_official",
		));

		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "イベント一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Event"], $this->Event))
			{
//				pr($this->request->data["Event"]);
//				exit;
				if($this->Event->saveAll($this->request->data["Event"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdateEvents()){}
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

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action'=>'index'));
		}
		if($this->Event->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect(array('action' => 'index'));
	}
}
?>