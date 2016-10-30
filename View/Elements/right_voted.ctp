<?php if(!empty($rightVoted)):?>
<section class="myPosts framed">
	<div class="framed-body">
		<h2>
			<span class="main">最近投稿したレビュー</span>
			<span class="sub">パスワードがあればいつでも編集できます</span>
		</h2>
		<ul class="titles">
	<?php foreach($rightVoted as $rightVote):?>
			<li>
				<h2 class="title">
					<?php echo $this->Common->title_link_text(
						$this->Common->title_separated_span($rightVote["Title"]["title_official"], $rightVote["Title"]["title_read"]),
						$rightVote["Title"]["url_str"])?>
				</h2>
				<div class="image">
					<?php echo $this->Common->title_link_thumb(
						$this->Common->thumb_name($rightVote["Title"]["thumb_name"]),
						$this->Common->title_separated_case($rightVote["Title"]["title_official"], $rightVote["Title"]["title_read"]),
						$rightVote["Title"]["url_str"], 60)?>
				</div>
		<?php if(!empty($rightVote["Vote"]["pass"])):?>
				<p class="more">
					<?php echo $this->Html->link("編集する", array("controller" => "votes", "action" => "edit", $rightVote["Vote"]["id"]), array("rel" => "nofollow"))?>
				</p>
		<?php endif;?>
				<p class="date">最終更新：<?php echo $this->Common->date_format($rightVote["Vote"]["modified"])?></p>
			</li>
	<?php endforeach;?>
		</ul>
	</div>
</section>
<?php endif;?>