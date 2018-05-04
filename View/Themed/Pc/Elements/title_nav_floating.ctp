
	<nav class="titles">
		<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"))?>" class="title">
			<div class="image"><?php echo $this->Html->image($this->Common->thumbName($title["Title"]["thumb_name"]),
				array("width" => 160, "alt" => $title["Title"]["title_official"]))?></div>
			<p class="official"><?php echo $title["Title"]["title_official"]?></p>
		</a>
		<ul>
			<li<?php if($this->request->params["action"] == "index"):?> class="current"<?php endif;?>><?php echo $this->Html->link("トップ", array("controller" => "titles", "action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
			<li<?php if($this->request->params["action"] == "rating"):?> class="current"<?php endif;?>><?php echo $this->Html->link("評価(" . $title["Titlesummary"]["vote_count_vote"] . ")", array("controller" => "titles", "action" => "rating", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
			<li<?php if($this->request->params["action"] == "review" or $this->request->params["action"] == "single"):?> class="current"<?php endif;?>><?php echo $this->Html->link("レビュー(" . $title["Titlesummary"]["vote_count_review"] . ")", array("controller" => "titles", "action" => "review", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
<?php
	/* events
		<?php if(!empty($title["Titlesummary"]["event_count"])):?>
		<li<?php if($this->request->params["action"] == "events" or $this->request->params["action"] == "event"):?> class="current"<?php endif;?>><?php echo $this->Html->link("イベント", array("action" => "events", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
		<?php endif;?>
	*/
?>
<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
			<li<?php if($this->request->params["action"] == "pc"):?> class="current"<?php endif;?>><?php echo $this->Html->link("推奨PC(" . $title["Titlesummary"]["pc_count"] . ")", array("controller" => "titles", "action" => "pc", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
<?php endif;?>
			<li<?php if($this->request->params["action"] == "link"):?> class="current"<?php endif;?>><?php echo $this->Html->link("攻略リンク(" . $title["Titlesummary"]["fansite_count"] . ")", array("controller" => "titles", "action" => "link", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
<?php
	/* search
		<li<?php if($this->request->params["action"] == "search"):?> class="current"<?php endif;?>><?php echo $this->Html->link("動画・ブログ", array("controller" => "titles", "action" => "search", "path" => $title["Title"]["url_str"], "ext" => "html"))?></li>
	*/
?>
		</ul>
	</nav>