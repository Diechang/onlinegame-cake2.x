<?php if($ad_use && !empty($ad_text)):?>
<div class="officiallink">
	<span class="caption">公式サイト</span>
	<?php echo $ad_text?>
</div>
<?php else:?>
<a class="officiallink" href="<?php echo $official_url?>">
	<span class="caption">公式サイト</span>
	<?php if(!empty($title_official)):?><span class="title"><?php echo $title_official?></span><?php endif;?>
	<?php if(!empty($title_read)):?><span class="read"><?php echo $title_read?></span><?php endif;?>
</a>
<?php endif;?>