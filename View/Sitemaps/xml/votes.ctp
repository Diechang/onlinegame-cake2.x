<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php foreach($votes as $vote):?>
<url>
	<loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $vote["Title"]["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html"), true)?></loc>
	<lastmod><?php echo $this->Time->toAtom($vote["Vote"]["modified"])?></lastmod>
</url>
<?php endforeach;?>
</urlset>