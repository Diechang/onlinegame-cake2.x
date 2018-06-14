<div class="title-header">
<?php if($this->action == "sp_index"):?>
	<h1 class="title-name">
		<span class="official"><?php echo $title["Title"]["title_official"]?></span>
		<?php echo (!empty($title["Title"]["title_sub"])) ? '<span class="sub">' . $title["Title"]["title_sub"] . '</span>' : ""?>
		<?php echo (!empty($title["Title"]["title_read"])) ? '<span class="read">' . $title["Title"]["title_read"] . '</span>' : ""?>
	</h1>
<?php else: ?>
	<a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"])?>" class="title-name">
		<span class="official"><?php echo $title["Title"]["title_official"]?></span>
		<?php echo (!empty($title["Title"]["title_sub"])) ? '<span class="sub">' . $title["Title"]["title_sub"] . '</span>' : ""?>
		<?php echo (!empty($title["Title"]["title_read"])) ? '<span class="read">' . $title["Title"]["title_read"] . '</span>' : ""?>
	</a>
<?php endif;?>
	<ul class="platformLabels">
		<?php echo $this->Common->platformsList($title["Platform"], "li")?>
	</ul>
</div>