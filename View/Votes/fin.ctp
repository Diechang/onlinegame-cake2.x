<?php
//set blocks
$this->assign("title", $vote["Title"]["title_official"] . "レビュー・評価投稿完了");
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $vote["Title"]["title_official"], "url" => array("controller" => "titles", "action" => "index", "path" => $vote["Title"]["url_str"], "ext" => "html")), "投稿完了"));
?>

<div class="flash flash-success">
	<div class="flash-title"><?php echo $vote["Title"]["title_official"]?>への投稿ありがとうございました！</div>
	<div class="flash-body">
		<?php echo $this->Html->link("≪" . $vote["Title"]["title_official"] . "のトップページに戻る",
			array("controller" => "titles", "action" => "index", "path" => $vote["Title"]["url_str"], "ext" => "html"))?>
	</div>
</div>
<section>
	<p><?php echo $this->Html->link("投稿したページを見る", array("controller" => "titles", "action" => "single", "path" => $vote["Title"]["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html"))?></p>
	<h2 class="headline">投稿を共有しませんか？</h2>
	<?php $url = $this->Html->url(array("controller" => "titles", "action" => "single", "path" => $vote["Title"]["url_str"], "voteid" => $vote["Vote"]["id"], "ext" => "html"), true)?>
	<section>
		<fb:comments href="<?php echo $url?>" num_posts="2" width="510"></fb:comments>
		<div class="shares">
			<ul>
				<li><fb:like href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></fb:like></li>
				<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>" data-text="<?php echo $vote["Title"]["title_official"] . "の" . ((!empty($vote["Vote"]["review"])) ? "レビュー書いて" : "評価して") . "みた"?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></li>
				<li><div data-plugins-type="mixi-favorite" data-service-key="07a7f5521b36a765d5898f07c3b0e867a380434c" data-href="<?php echo $url?>" data-show-faces="false" data-show-count="true" data-show-comment="true" data-width="100"></div><script type="text/javascript">(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = 'https://static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script></li>
				<li><g:plusone size="medium" href="<?php echo $url?>"></g:plusone></li>
			</tr>
		</div>
	</section>
	<?php echo $this->Gads->ads468()?>
</section>
<?php if(!empty($noneTitles)):?>

<section class="noneTitles">
	<h2 class="headline">
		<span class="main">まだ評価が投稿されていないタイトル</span>
		<span class="sub">プレイしたことがあるタイトルには是非投稿をお願いします！</span>
	</h2>

	<ul>
	<?php foreach($noneTitles as $none):?>
		<li>
			<?php echo $this->Common->titleLinkText(
				$this->Common->titleSeparatedSpan($none["Title"]["title_official"], $none["Title"]["title_read"]),
				$none["Title"]["url_str"])?>
		</li>
	<?php endforeach;?>
	</ul>
</section>
<?php endif;?>