<div class="title-header">
	<div class="title-header-body">
		<h1>
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"))?>">
				<span class="official"><?php echo $title["Title"]["title_official"]?></span>
				<?php echo (!empty($title["Title"]["title_sub"])) ? '<span class="sub">' . $title["Title"]["title_sub"] . '</span>' : ""?>
				<?php echo (!empty($title["Title"]["title_read"])) ? '<span class="read">' . $title["Title"]["title_read"] . '</span>' : ""?>
			</a>
		</h1>
	</div>
</div>