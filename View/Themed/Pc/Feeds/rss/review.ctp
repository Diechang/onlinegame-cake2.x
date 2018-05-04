<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"] . "のレビュー[" . sprintf("%.2f", $item["Vote"]["single_avg"]) . "点]",
				"link" => array("controller" => "titles", "action" => "single", "path" => $item["Title"]["url_str"], "voteid" => $item["Vote"]["id"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "single", "path" => $item["Title"]["url_str"], "voteid" => $item["Vote"]["id"], "ext" => "html"),
				"description" => ((!empty($item["Vote"]["title"])) ? "「" . h(strip_tags($item["Vote"]["title"])) . "」<br /><br />" : "") . h(strip_tags($item["Vote"]["review"])),
				"pubDate" => $item["Vote"]["created"],
				);
}
echo $this->Rss->items($votes, "rss_transform");
?>