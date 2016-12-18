<?php if(!empty($votes)):?>
<ul>
<?php foreach($votes as $vote):?>
	<li>
		<div class="post">
			<div class="post-body">
				<div class="review">
	<?php if(!empty($vote["Vote"]["review"])):?>
					<h2><?php echo $this->Html->link($this->Common->voteTitle($vote["Vote"]), 
						array("controller" => "titles", "action" => "single", "path" => $titlePath, "voteid" => $vote["Vote"]["id"], "ext" => "html"),
						(empty($vote["Vote"]["review"]) ? array("rel" => "nofollow") : null))?></h2>
					<p><?php echo mb_strimwidth(h($vote["Vote"]["review"]), 0, 300, " … " . $this->Html->link("続き", array("action" => "single", "path" => $titlePath, "voteid" => $vote["Vote"]["id"], "ext" => "html")))?></p>
	<?php else:?>
					<h2>評価点数のみ</h2>
	<?php endif;?>
				</div>
				<ul class="data">
					<li><i class="zmdi zmdi-account"></i> <?php echo $this->Common->posterName($vote["Vote"]["poster_name"])?></li>
					<li><i class="zmdi zmdi-time"></i> <?php echo $this->Common->dateFormat($vote["Vote"]["created"], "datetime")?></li>

				<?php if(!empty($vote["Vote"]["pass"])):?>
					<li><i class="zmdi zmdi-edit"></i> <?php echo $this->Html->link("編集", array("controller" => "votes", "action" => "edit", $vote["Vote"]["id"]), array("rel" => "nofollow"))?></li>
				<?php endif;?>
				</ul>
			</div>
		</div>
		<div class="title-comp-rate title-comp-rate-<?php echo $this->TitlePage->goodOrBad($vote["Vote"]["single_avg"])?>">
			<div class="caption">総合評価</div>
			<div class="point"><span class="num"><?php echo $this->Common->pointFormat($vote["Vote"]["single_avg"])?></span>点</div>
			<div class="icon"><i class="zmdi zmdi-thumb-<?php echo $this->TitlePage->goodOrBad($vote["Vote"]["single_avg"], array("up", "down"))?>"></i> <?php echo ucfirst($this->TitlePage->goodOrBad($vote["Vote"]["single_avg"]))?></div>
		</div>
	</li>
<?php endforeach;?>
</ul>
<?php else:?>
<div class="flash flash-info">
	<div class="flash-title">投稿がありません。</div>
	<div class="flash-body">プレイヤーの方はぜひ投稿をお願いします。</div>
</div>
<?php endif;?>