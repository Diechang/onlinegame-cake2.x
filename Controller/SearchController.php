<?php
class SearchController extends AppController
{

	var $name = 'Search';
	var $uses = array("Title");
	var $helpers = array("SearchPage");

	var $queryParamNames = array(
		"keyword",
		"category",
		"style",
		"service",
		"free",
		"vote",
		"fansite",
		"order",
	);

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
		// pr($query);
//		exit;

		//category
		$idListByCategory = $this->Title->idListByCategory($query["category"]);
		//style
		$idListByStyle = $this->Title->idListByStyle($query["style"]);
		//ID list
		$idList = null;
		if(!empty($idListByCategory) && !empty($idListByStyle))
		{
//			$idList = array_merge($idListByCategory, $idListByStyle);
			$idList = array_intersect($idListByCategory, $idListByStyle);
		}
		elseif(!empty($idListByCategory))
		{
			$idList = $idListByCategory;
		}
		elseif(!empty($idListByStyle))
		{
			$idList = $idListByStyle;
		}
//		pr($idListByCategory);
//		pr($idListByStyle);
//		pr($idList);

		/**
		 * conditions
		 */
		$conditions = array();
		//keyword
		if(!empty($query["keyword"]))
		{
			$conditions += array("OR" => $this->Title->wConditions($query["keyword"]));
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
		 * limit
		 */
		// $limitStart = (($query["page"] - 1) * $this->limit);
		// $limit = $limitStart . "," . $this->limit;
//		pr($limit);


		/**
		 * find
		 */
		// $this->Title->unbindAll(array("Titlesummary", "Category", "Service", "Fee"));
		// $titles = $this->Title->find("all", array(
		// 	"conditions" => $conditions,
		// 	"order" => $order,
		// 	"limit" => $this->limit,
		// ));
		// pr($titles);
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


		/**
		 * paging
		 */
		// $titlesCount = $this->Title->find("count", array(
		// 	"conditions" => $conditions,
		// 	"fields" => "DISTINCT Title.id",
		// ));
//		pr($titlesCount);
		// $paging = array(
		// 	"count" => $titlesCount,
		// 	"pages" => ceil($titlesCount / $this->limit),
		// 	"page" => $query["page"],
		// 	"start" => $limitStart + 1,
		// 	"end" => ($limitStart + $this->limit < $titlesCount) ? $limitStart + $this->limit : $titlesCount,
		// 	"limit" => $this->limit,
		// );
//		pr($paging);

		/**
		 * Query params
		 */
		// $queryParams = array();
		// foreach($this->queryParamNames as $paramName)
		//
		// {
		// 	if(isset($query[$paramName]) && !empty($query[$paramName]))
		// 	{
		// 		$queryParams[$paramName] = $query[$paramName];
		// 	}
		// }
//		pr($queryParams);

		//set
		$this->set("titles", $titles);
		// $this->set("paging", $paging);
		// $this->set("queryParams", $queryParams);
	}

/**
 * Google search result
 */
	function gsearch()
	{
	}
}
?>