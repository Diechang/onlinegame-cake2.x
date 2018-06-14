<nav class="title-nav">
	<div class="title-nav-wrap">
		<ul>
			<li<?php if($this->action == "index"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "index")?>">トップ</a></li>
			<li<?php if($this->action == "rating"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "rating")?>">評価(<?php echo $title["Titlesummary"]["vote_count_vote"]?>)</a></li>
			<li<?php if($this->action == "review" or $this->action == "single"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "review")?>">レビュー(<?php echo $title["Titlesummary"]["vote_count_review"]?>)</a></li>
<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
			<li<?php if($this->action == "pc"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "pc")?>">推奨PC(<?php echo $title["Titlesummary"]["pc_count"]?>)</a></li>
<?php endif;?>
			<li<?php if($this->action == "link"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "link")?>">攻略リンク(<?php echo $title["Titlesummary"]["fansite_count"]?>)</a></li>
		</ul>
	</div>
</nav>