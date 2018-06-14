<?php
//OGP
$this->Meta->ogpOptions = array(
	"type" => (isset($ogpType)) ? $ogpType : "article",
	"title" => (isset($ogpTitle)) ? $ogpTitle : $titleWithStrs["All"],
	"url" => $this->Html->url(isset($ogpUrl) ? $ogpUrl : array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"), true),
	"image" => $this->Html->url("/img/" . (isset($ogpImage) ? $ogpImage : $this->Common->thumbName($title["Title"]["thumb_name"])), true),
	"description" => (isset($ogpDescription)) ? $ogpDescription : $titleWithStrs["Sub"] . "のトップページです。動作環境や関連動画、評価点数やレビューページへもこちらからどうぞ",
);
?>