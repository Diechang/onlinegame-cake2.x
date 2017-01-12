<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
	<loc><?php echo $this->Html->url("/", true)?></loc>
	<priority>1</priority>
</url>
<!--ランキング-->
<url>
	<loc><?php echo $this->Html->url(array("controller" => "ranking", "path" => "index", "ext" => "html"), true)?></loc>
	<priority>1</priority>
</url>
<?php foreach($categories as $category):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "ranking", "path" => $category["Category"]["path"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--ジャンル別-->
<?php foreach($categories as $category):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "categories", "path" => $category["Category"]["path"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--スタイル・環境別-->
<?php foreach($styles as $style):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "styles", "path" => $style["Style"]["path"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--サービス状態別-->
<?php foreach($services as $service):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "services", "path" => $service["Service"]["path"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--ポータル-->
<url>
	<loc><?php echo $this->Html->url(array("controller" => "portals", "action" => "index", "ext" => "html"), true)?></loc>
	<priority>1</priority>
</url>
<?php foreach($portals as $portal):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--ゲーム代を稼ぐ-->
<url>
	<loc><?php echo $this->Html->url(array("controller" => "monies", "action" => "index", "ext" => "html"), true)?></loc>
	<priority>1</priority>
</url>
<?php foreach($moneycategories as $moneycategory):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "monies", "action" => "view", "path" => $moneycategory["Moneycategory"]["path"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endforeach;?>

<!--ゲーム用PC-->
<url>
	<loc><?php echo $this->Html->url(array("controller" => "pcs", "action" => "index", "ext" => "html"), true)?></loc>
	<priority>1</priority>
</url>

<!--サイトメニュー-->
<url>
	<loc><?php echo $this->Html->url(array("controller" => "pages", "action" => "about", "ext" => "html"), true)?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "links", "path" => "index", "ext" => "html"), true)?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "pages", "action" => "sitemap", "ext" => "html"), true)?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "pages", "action" => "contact", "ext" => "html"), true)?></loc>
	<priority>0.5</priority>
</url>

</urlset>