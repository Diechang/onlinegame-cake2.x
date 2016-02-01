<!-- PCショップ -->
<div class="leftBox leftGreen">
	<h2><?php echo $this->Html->image("design/leftbox_green_title_pcshop.gif" , array("alt" => "ゲームPCショップ"))?></h2>
	<div><?php echo $this->Html->image("design/leftbox_green_comment_pcshop.gif" , array("alt" => "推奨PCで快適プレイ"))?></div>
	<div class="body">
		<ul>
<?php foreach($leftPcshops as $pcshop):?>
			<li><?php echo $pcshop["Pcshop"]["ad_use"] ? $pcshop["Pcshop"]["ad_text"] : $this->Html->link($pcshop["Pcshop"]["shop_name"], $pcshop["Pcshop"]["shop_url"], array("target" => "_blank"))?></li>
<?php endforeach;?>
		</ul>
	</div>
</div>
