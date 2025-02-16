<!-- tests -->
<section class="tests framed">
	<div class="framed-body">
		<h2>
			<span class="main">無料テスト情報</span>
			<span class="sub">新作ゲームを無料で遊ぶチャンス！</span>
		</h2>
		<ul class="titles">
<?php foreach($rightTests as $rightTest):?>
			<li>
				<h2 class="title">
					<?php echo $this->Common->titleLinkText(
						$this->Common->titleSeparatedSpan($rightTest["Title"]["title_official"], $rightTest["Title"]["title_read"]),
						$rightTest["Title"]["url_str"])?>
				</h2>
				<div class="image">
					<?php echo $this->Common->titleLinkThumb(
						$this->Common->thumbName($rightTest["Title"]["thumb_name"]),
						$this->Common->titleWithCase($rightTest["Title"]["title_official"], $rightTest["Title"]["title_read"]),
						$rightTest["Title"]["url_str"], 60)?>
				</div>
				<p class="description"><?php echo mb_strimwidth(strip_tags($rightTest["Title"]["description"]), 0, 120, " …", "UTF-8")?></p>
				<p class="data">
					<?php echo $this->Common->testLabel($rightTest["Service"]["id"]);?>
					<span class="value"><?php echo $this->Common->dateFormat($rightTest["Title"]["test_start"], "date") . "～" . $this->Common->dateFormat($rightTest["Title"]["test_end"], "date")?></span>
				</p>
				<p class="data data-official">
					<span class="label label-official">公式サイト</span>
					<?php echo $this->Common->titleJumpLink($rightTest["Title"]["title_official"], $rightTest["Title"], $rightTest["Titlead"])?>
				</p>
			</li>
<?php endforeach;?>
		</ul>
	</div>
</section>
