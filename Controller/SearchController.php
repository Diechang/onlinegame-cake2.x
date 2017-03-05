<?php
class SearchController extends AppController
{

	var $name = 'Search';
	var $uses = array("Title");
	var $helpers = array("SearchPage");

	//表示件数
	var $limit = 20;

	function index()
	{
		//Search form
	}

	function result()
	{
		// App::import('Sanitize');
		
		$query = $this->request->query;

		// $this->log(array(
		// 	"Server" => $_SERVER,
		// 	"Query" => $query,
		// ), LOG_DEBUG);

		if(empty($query["page"]))
		{
			$query["page"] = 1;
		}
		// $query = Sanitize::clean($query, Configure::read("UseDbConfig"));
		// debug($query);
		// exit;

		//ID list
		$category_id	= !empty($query["category"])	? $query["category"] : null;
		$style_id		= !empty($query["style"])		? $query["style"] : null;
		$platform_id	= !empty($query["platform"])	? $query["platform"] : null;
		// debug(array($category_id, $style_id, $platform_id));
		// exit;
		$idList = $this->Title->getIdListsIntersect($category_id, $style_id, $platform_id);
//		pr($idList);

		/**
		 * conditions
		 */
		$conditions = array();
		//keyword
		if(!empty($query["keyword"]))
		{
			$conditions += array("OR" => $this->Title->wConditions($query["keyword"]));
			// debug($conditions);
		}
		//id list
		if(!empty($idList))
		{
			$conditions += array("Title.id" => $idList);
		}
		//service
		if(!empty($query["service"]))
		{
			$conditions += array("Title.service_id" => $query["service"]);
		}
		else
		{
			$conditions += array("Title.service_id <>" => 1);
		}
		//others
		if(!empty($query["free"]))
		{
			$conditions += array("Title.fee_id" => array(1,2));
		}
		if(!empty($query["vote"]))
		{
			$conditions += array("Titlesummary.vote_count_vote >" => 0);
		}
		if(!empty($query["fansite"]))
		{
			$conditions += array("Titlesummary.fansite_count >" => 0);
		}
		// pr($conditions);

		/**
		 * order
		 */
		if(empty($query["order"])) $query["order"] = "rating";
		switch($query["order"])
		{
			case "rating":
				$order = "Titlesummary.vote_avg_all DESC";
				break;
			case "start":
				$order = "Title.service_start DESC";
				break;
			case "name":
				$order = "Title.title_official";
				break;
		}

		/**
		 * find
		 */
		$this->Paginator->settings = array(
			"Title" => array(
				"contain" => array("Titlesummary", "Category", "Service", "Fee"),
				"conditions" => $conditions,
				"order" => $order,
				"limit" => $this->limit,
				"maxLimit" => 100,
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
		// pr($titles);

		//set
		$this->set("titles", $titles);
	}

/**
 * Google search result
 */
	function gsearch()
	{
	}
}
?>