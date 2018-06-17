<?php if(!empty($votes)):?>
<ul>
<?php foreach($votes as $vote):?>
	<li>
		<div class="post">
			<a href="<?php echo $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $titleData["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html"))?>"<?php echo empty($vote["Vote"]["review"]) ? " rel='nofollow'" : "" ?>>
				<h3><?php echo $this->Common->voteTitle($vote["Vote"])?></h3>
				<p><?php echo mb_strimwidth(h($vote["Vote"]["review"]), 0, 200, "...<span class='continue'>続き</span>")?></p>
			</a>
			<ul class="data">
				<li><i class="zmdi zmdi-account"></i> <?php echo $this->Common->posterName($vote["Vote"]["poster_name"])?></li>
				<li><i class="zmdi zmdi-time"></i> <?php echo $this->Common->dateFormat($vote["Vote"]["created"], "datetime")?></li>
			<?php if(!empty($vote["Vote"]["pass"])):?>
				<li><a href="<?php echo $this->Common->url(array("controller" => "votes", "action" => "edit", $vote["Vote"]["id"]))?>" rel="nofollow"><i class="zmdi zmdi-edit"></i></a></li>
			<?php endif;?>
			</ul>
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
	<?php if($titleData["service_id"] != 1 && $titleData["votable"] == true):?>
	<div class="flash-body">プレイヤーの方はぜひ投稿をお願いします。</div>
	<?php endif;?>
</div>
<?php endif;?>