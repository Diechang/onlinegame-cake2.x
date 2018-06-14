<?php if($title["Title"]["service_id"] != 1):?>
<span class="officiallink ended" href="#">
	<span class="title">サービス終了・休止中</span>
</span>
<?php elseif(!empty($title["Title"]["appdl_app_store"]) || !empty($title["Title"]["appdl_google_play"])):?>
<div class="applink">
	<span class="caption">アプリダウンロード</span>
	<?php if(!empty($title["Title"]["appdl_app_store"])) echo $this->Common->titleJumpLinkImage(
		$this->Html->image("appbadge_app_store.png", array("width" => 135, "height" => 40, "alt" => "App Storeからダウンロード")),
		$title["Title"], $title["Titlead"], "ios"
	);?>
	<?php if(!empty($title["Title"]["appdl_google_play"])) echo $this->Common->titleJumpLinkImage(
		$this->Html->image("appbadge_google_play.png", array("width" => 135, "height" => 40, "alt" => "Google Playで手に入れよう")),
		$title["Title"], $title["Titlead"], "android"
	);?>
</div>
<?php else:?>
<a class="officiallink" href="<?php echo $this->Common->titleJumpLink($titleWithStrs["Span"], $title["Title"], $title["Titlead"], "pc", false)?>">
	<span class="caption">公式サイト</span>
	<?php if(!empty($title["Title"]["title_official"])):?><span class="title"><?php echo $title["Title"]["title_official"]?></span><?php endif;?>
	<?php if(!empty($title["Title"]["title_read"])):?><span class="read"><?php echo $title_read?></span><?php endif;?>
</a>
<?php endif;?>
