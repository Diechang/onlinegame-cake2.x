<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!--オンラインゲーム一覧-->
<?php foreach($titles as $t):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $t["Title"]["url_str"], "ext" => "html"), true)?></loc>
	<lastmod><?php echo $t["Title"]["modified"]?></lastmod>
	<priority>1</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "rating", "path" => $t["Title"]["url_str"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "review", "path" => $t["Title"]["url_str"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "link", "path" => $t["Title"]["url_str"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php /*
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "allvotes", "path" => $t["Title"]["url_str"], "ext" => ", truehtml"))?></loc>
</url>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "search", "path" => $t["Title"]["url_str"], "ext" => ", truehtml"))?></loc>
</url>
*/ ?>
<?php if(!empty($t["Titlesummary"]["pc_count"])):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "pc", "path" => $t["Title"]["url_str"], "ext" => "html"), true)?></loc>
	<priority>0.8</priority>
</url>
<?php endif;?>
<?php endforeach;?>

</urlset>