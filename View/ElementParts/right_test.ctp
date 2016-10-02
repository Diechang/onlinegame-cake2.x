<!-- tests -->
<section class="tests framed">
	<div class="framed-body">
		<h1>
			<span class="main">無料テスト中オンラインゲーム</span>
			<span class="sub">新作ゲームを無料で遊ぶチャンス！</span>
		</h1>
		<ul class="titles">
<?php foreach($rightTests as $rightTest):?>
			<li>
				<h2 class="title">
					<?php echo $this->Common->title_link_text(
						$this->Common->title_separated_span($rightTest["Title"]["title_official"], $rightTest["Title"]["title_read"]),
						$rightTest["Title"]["url_str"])?>
				</h2>
				<div class="image">
					<?php echo $this->Common->title_link_thumb(
						$this->Common->thumb_name($rightTest["Title"]["thumb_name"]),
						$this->Common->title_separated_case($rightTest["Title"]["title_official"], $rightTest["Title"]["title_read"]),
						$rightTest["Title"]["url_str"], 60)?>
				</div>
				<p class="description"><?php echo mb_strimwidth(strip_tags($rightTest["Title"]["description"]), 0, 120, " …", "UTF-8")?></p>
				<p class="data">
					<?php echo $this->Common->test_label($rightTest["Service"]["id"]);?>
					<span class="value"><?php echo $this->Common->date_format($rightTest["Title"]["test_start"], "date") . "～" . $this->Common->date_format($rightTest["Title"]["test_end"], "date")?></span>
				</p>
				<p class="data data-official">
					<span class="label label-official">公式サイト</span>
					<?php echo $this->Common->official_link_text($rightTest["Title"]["title_official"], $rightTest["Title"]["ad_use"], $rightTest["Title"]["ad_text"], $rightTest["Title"]["official_url"])?>
				</p>
			</li>
<?php endforeach;?>
		</ul>
	</div>
</section>
