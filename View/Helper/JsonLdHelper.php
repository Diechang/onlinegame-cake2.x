<?php
/**
 * Rich Snippets用ヘルパー - JSON-LD
 */
class JsonLdHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html', 'Common');



/**
 * BreadcrumbList
 *
 * @param	mixed	$arrat Array(Array("id" => url, "name" => name),..) or String
 * @return	html
 * @access	public
 */
	function breadcrumbList($array)
	{
		$data = array(
			"@context" => "http://schema.org",
			"@type" => "BreadcrumbList",
			"itemListElement" => array(
				array(
					"@type" => "ListItem",
					"position" => 1,
					"item" => array(
						"@id" => $this->Html->url("/", true),
						"name" => Configure::read("Site.name"),
					)
				)
			),
		);

		if(is_array($array))
		{
			foreach($array as $key => $value)
			{
				array_push($data["itemListElement"], array(
					"@type" => "ListItem",
					"position" => $key + 2,
					"item" => (is_array($value)) ? array(
						"@id" => $value["id"],
						"name" => $value["name"]
					)
					: array(
						"@id" => $this->Html->url(null, true),
						"name" => $value
					)
				));
			}
		}
		else
		{
			array_push($data["itemListElement"], array(
				"@type" => "ListItem",
				"position" => 2,
				"item" => array(
					"@id" => $this->Html->url(null, true),
					"name" => $array
				)
			));
		}

		return $this->out($data);
	}


/**
 * AggregateRating
 *
 * @param	model	$title = ["Title"] and ["Titlesummary"]
 * @param	string	$name
 * @return	html
 * @access	public
 */
	function titleRating($title, $name)
	{
		$data = array(
			"@context" => "http://schema.org/",
			"@type" => "Product",
			"name" => ((!empty($name)) ? $name : $title["Title"]),
		);

		if(!empty($title["Titlesummary"]["vote_count_vote"])) $data["aggregateRating"] = array(
			"@type" => "AggregateRating",
			"ratingCount" => $title["Titlesummary"]["vote_count_vote"],
			"reviewCount" => $title["Titlesummary"]["vote_count_review"],
			"ratingValue" => $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"]),
		);

		return $this->out($data);
	}


/**
 * Review
 *
 * @param	model	$vote = ["Vote"]
 * @param	string	$name
 * @return	html
 * @access	public
 */
	function titleReview($vote, $name)
	{
		$data = array(
			"@context" => "http://schema.org/",
			"@type" => "Review",
			"itemReviewed" => array(
				"@type" => "Product",
				"name" => $name
			),
			"author" => array(
				"@type" => "Person",
				"name" => $vote["Vote"]["poster_name"]
			),
			"description" => $vote["Vote"]["title"],
			"reviewBody" => $vote["Vote"]["review"],
			"datePublished" => date("Y-m-d", strtotime($vote["Vote"]["modified"])),
			"reviewRating" => array(
				"@type" => "Rating",
				"ratingValue" => $this->Common->pointFormat($vote["Vote"]["single_avg"])
			)
		);

		return $this->out($data);
	}


/**
 * PCs
 *
 * @param	number	$lowPrice
 * @param	number	$highPrice
 * @param	string	$name
 * @return	html
 * @access	public
 */
	function titlePcs($lowPrice, $highPrice, $name)
	{
		$data = array(
			"@context" => "http://schema.org/",
			"@type" => "Product",
			"name" => $name,
			"offers" => array(
				"@type" => "AggregateOffer",
				"lowPrice" => $lowPrice,
				"highPrice" => $highPrice,
				"priceCurrency" => "JPY"
			)
		);

		return $this->out($data);
	}

/**
 * out
 *
 * @return	html
 * @access	public
 */
	function out($data = array())
	{
		return $this->Html->tag("script", json_encode($data), $options = array("type" => "application/ld+json"));
	}
}
?>