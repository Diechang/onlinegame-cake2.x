<?php
//OGP
$this->Meta->ogpOptions = array(
	"type" => (isset($ogpType)) ? $ogpType : "article",
	"title" => (isset($ogpTitle)) ? $ogpTitle : $titleWithStrs["All"],
	"url" => "http://onlinegame.dz-life.net" . ((isset($ogpUrl)) ? $ogpUrl : $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"))),
	"image" => "http://onlinegame.dz-life.net/img/" . ((isset($ogpImage)) ? $ogpImage : $this->Common->thumbName($title["Title"]["thumb_name"])),
	"description" => (isset($ogpDescription)) ? $ogpDescription : $titleWithStrs["Sub"] . "のトップページです。動作環境や関連動画、評価点数やレビューページへもこちらからどうぞ",
);
?>