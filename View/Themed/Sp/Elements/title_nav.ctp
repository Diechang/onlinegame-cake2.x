<nav class="title-nav">
	<div class="title-nav-wrap">
		<ul>
			<li<?php if($this->action == "sp_index"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "index")?>">トップ</a></li>
			<li<?php if($this->action == "sp_rating"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "rating")?>">評価(<?php echo $title["Titlesummary"]["vote_count_vote"]?>)</a></li>
			<li<?php if($this->action == "sp_review" or $this->action == "sp_single"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "review")?>">レビュー(<?php echo $title["Titlesummary"]["vote_count_review"]?>)</a></li>
<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
			<li<?php if($this->action == "sp_pc"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "pc")?>">推奨PC(<?php echo $title["Titlesummary"]["pc_count"]?>)</a></li>
<?php endif;?>
			<li<?php if($this->action == "sp_link"):?> class="current"<?php endif;?>><a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "link")?>">攻略リンク(<?php echo $title["Titlesummary"]["fansite_count"]?>)</a></li>
		</ul>
	</div>
</nav>