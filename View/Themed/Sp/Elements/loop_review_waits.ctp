<ul class="borderedLinks imageLinks imageLinks-s">
<?php foreach($waits as $wait): ?>
	<li>
		<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $wait["Title"]["url_str"], "ext" => "html"));?>">
			<div class="images">
				<div class="thumb"><?php echo $this->Common->titleThumb($wait["Title"], 40)?></div>
			</div>
			<div class="data">
				<div class="title">
					<?php echo $this->Common->titleSeparatedDiv($wait["Title"]["title_official"], $wait["Title"]["title_read"])?>
				</div>
			</div>
		</a>
	</li>
<?php endforeach;?>
</ul>