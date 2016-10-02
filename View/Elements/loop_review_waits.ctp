<ul class="list">
<?php foreach($waits as $wait): ?>
	<li>
		<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $wait["Title"]["url_str"], "ext" => "html"));?>">
			<div class="thumb">
				<?php echo $this->Html->image($this->Common->thumb_name($wait["Title"]["thumb_name"]),
					array("alt" => $this->Common->title_separated_case($wait["Title"]["title_official"], $wait["Title"]["title_read"])));?>
			</div>
			<div class="title"><?php echo $wait["Title"]["title_official"];?></div>
		</a>
	</li>
<?php endforeach;?>
</ul>