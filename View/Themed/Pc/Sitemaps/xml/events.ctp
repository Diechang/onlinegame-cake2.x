<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php foreach($events as $event):?>
<url><loc><?php echo $this->Html->url(array("controller" => "titles", "action" => "event", "path" => $event["Title"]["url_str"], "eventid" => $event["Event"]["id"], "ext" => "html"), true)?></loc></url>
<?php endforeach;?>
</urlset>