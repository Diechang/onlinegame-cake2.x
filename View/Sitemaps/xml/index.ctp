<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($files as $file):?>
<sitemap>
	<loc><?php echo $this->Html->url(array("controller" => "sitemaps", "action" => $file, "ext" => "xml"), true)?></loc>
</sitemap>
<?php endforeach;?>
</sitemapindex>