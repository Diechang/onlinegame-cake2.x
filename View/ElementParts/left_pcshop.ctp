<!-- pc shops -->
<section class="shops">
	<h2>
		<span class="main">ゲーム用PCショップ</span>
	</h2>
	<ul>
<?php foreach($leftPcshops as $pcshop):?>
		<li><?php echo $pcshop["Pcshop"]["ad_use"] ? $pcshop["Pcshop"]["ad_text"] : $this->Html->link($pcshop["Pcshop"]["shop_name"], $pcshop["Pcshop"]["shop_url"], array("target" => "_blank"))?></li>
<?php endforeach;?>
	</ul>
</section>
