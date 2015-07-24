<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"] . (!empty($item["Title"]["title_read"]) ? "(" . $item["Title"]["title_read"] . ")" : ""),
				"link" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"description" => strip_tags($item["Title"]["description"]),
				"pubDate" => $item["Title"]["created"],
				);
}
echo $this->Rss->items($titles, "rss_transform");
?>