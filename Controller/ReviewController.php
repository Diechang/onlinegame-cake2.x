<?php
class ReviewController extends AppController
{

	var $name = 'Review';
	var $uses = array("Vote");

	var $paginate = array(
		"Vote" => array(
			"limit" => 10,
			"order" => "Vote.created DESC",
			"conditions" => array(
				"Vote.public" => 1,
				"NOT" => array("Vote.review" => null),
			),
			"fields" => array(
				"Vote.id",
				"Vote.poster_name",
				"Vote.title",
				"Vote.review",
				"Vote.pass",
				"Vote.created",
				"Vote.single_avg",
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

		$this->Paginator->settings = $this->paginate;

		/**
		 * Review Data
		 */
		//Get
		$reviews = $this->Paginator->paginate("Vote");
//		pr($reviews);
		//
		//Set - data
		$this->set("reviews", $reviews);
	}
}
?>