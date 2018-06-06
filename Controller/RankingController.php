<?php
class RankingController extends AppController
{

	var $name = 'Ranking';
	var $uses = array("Category");

	function index($path = null)
	{
		if(empty($path))
		{
			//Redirect
			return $this->redirect(array("controller" => "ranking", "path" => "index", "ext" => "html"));
		}
		else
		{
			/*
			 * Category Data
			 */
			//Get
			$categories = $this->Category->find("all", array(
				"recursive" => -1,
				"order" => "Category.sort",
			));
//			pr($categories);
			//
			//Set
			$this->set("categories", $categories);

			//Category Pathes
			$pathes = array();
			foreach($categories as $category)
			{
				array_push($pathes, $category["Category"]["path"]);
			}

			/**
			 * Page Data
			 */
			if(in_array($path, $pathes))
			{//$pathがCategory一致
				//Get
				$pageData = $this->Category->find("first", array(
					"conditions" => array("Category.path" => $path)
				));
//				pr($pageData);
				$label = $pageData["Category"]["str"];
				//Pankuz set
				$this->set("pankuz_for_layout", array(
					array(
						"str" => "総合ランキング",
						"url" => array("controller" => "ranking", "path" => "index", "ext" => "html")
					),
					$label,
				));
			}
			elseif($path == "index")
			{//Index - 総合
				$label = "総合";
				//Pankuz set
				$this->set("pankuz_for_layout", $label . "ランキング");
			}
			else
			{
				return $this->redirect(array("controller" => "ranking", "path" => "index", "ext" => "html"));
			}
			//
			$this->set("label", $label);
			$this->set("path", $path);

			/**
			 * Ranking Data
			 */
			//Get - Ranking
			if(in_array($path, $pathes))
			{//Category
				$rankings = $this->Title->getRanking(array(
					"platform_id" => $this->defaultPlatforms,
					"category_id" => $pageData["Category"]["id"],
					"idList" => true,
				));
				// $this->Title->unbindAll(array("Titlesummary"));
				$norankings = $this->Title->find("all", array(
					"contain" => array("Titlesummary"),
					"conditions" => array(
						"Title.public" => 1,
						"Title.id" => $rankings["idList"],
						"Title.service_id" => array(2,3),
						"Titlesummary.vote_count_vote" => 0,

						"OR" => array(
							"Title.service_start > " => date("Y-m-d", strtotime("-2year")),
							"Title.test_start > " => date("Y-m-d", strtotime("-2year"))
						),
					),
					"order" => "Title.title_official",
				));
			}
			else
			{//All
				$rankings = $this->Title->getRanking(array(
					"platform_id" => $this->defaultPlatforms,
					"idList" => true
				));
				// $this->Title->unbindAll(array("Titlesummary"));
				$norankings = $this->Title->find("all", array(
					"contain" => array("Titlesummary"),
					"conditions" => array(
						"Title.public" => 1,
						"Title.service_id" => array(2,3),
						"Titlesummary.vote_count_vote" => 0,

						"OR" => array(
							"Title.service_start > " => date("Y-m-d", strtotime("-2year")),
							"Title.test_start > " => date("Y-m-d", strtotime("-2year"))
						),
					),
					"order" => "Title.title_official",
				));
			}
			// pr($rankings);
			// pr($norankings);
			// exit;
			$categoryRankings = $this->Title->getCategoryRankings(1, $this->defaultPlatforms);
			//
			//Set
			$this->set("rankings", $rankings);
			$this->set("categoryRankings", $categoryRankings);
			$this->set("norankings", $norankings);
		}
	}


	/**
	 * SP
	 */
	function sp_index($path = null)
	{
		$this->index($path);
	}
}
?>