<?php
/**
 * Rich Snippets用ヘルパー - JSON-LD
 */
class JsonLdHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html');



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