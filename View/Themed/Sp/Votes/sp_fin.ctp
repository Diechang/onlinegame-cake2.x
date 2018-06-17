<?php
//set blocks
$this->assign("title", $vote["Title"]["title_official"] . "レビュー・評価投稿完了");
//pankuz
// $this->set("pankuz_for_layout", array(array("str" => $vote["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $vote["Title"]["url_str"], "ext" => "html")), "投稿完了"));
?>

<div class="flash flash-success">
	<div class="flash-title"><?php echo $vote["Title"]["title_official"]?>への投稿ありがとうございました！</div>
	<div class="flash-body">
		<?php echo $this->Html->link("≪" . $vote["Title"]["title_official"] . "のトップページに戻る",
			array("controller" => "titles", "action" => "index", "path" => $vote["Title"]["url_str"], "ext" => "html"))?>
	</div>
</div>
<section>
	<h2>投稿を共有しませんか？</h2>
	<div class="section-body">
		<?php echo $this->Html->link("投稿したページを見る", array("controller" => "titles", "action" => "single", "path" => $vote["Title"]["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html"), array("class" => "button button-block"))?>
		<?php echo $this->element("comp_shares", array("url" =>  $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $vote["Title"]["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html", "sp" => false), true)))?>
	</div>
</section>
<?php echo $this->Gads->ads320()?>

<?php if(!empty($noneTitles)):?>
<section class="noneTitles">
	<h2>まだ評価が投稿されていないタイトル</h2>

	<ul class="borderedLinks imageLinks imageLinks-s">
<?php foreach($noneTitles as $none):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($none["Title"]["url_str"]);?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($none["Title"], 40);?></div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($none["Title"]["title_official"], $none["Title"]["title_read"]);?>
					</div>
				</div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
<?php endif;?>