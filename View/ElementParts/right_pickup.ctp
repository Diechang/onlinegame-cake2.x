<!-- pickups -->
<section class="pickups framed">
	<div class="framed-body">
		<h2>
			<span class="main">新作ピックアップ</span>
			<span class="sub">最近サービスが開始された注目タイトル！</span>
		</h2>
		<ul class="titles">
<?php foreach($rightPickups as $rightPickup):?>
			<li>
				<h2 class="title">
					<?php echo $this->Common->titleLinkText(
						$this->Common->titleSeparatedSpan($rightPickup["Title"]["title_official"], $rightPickup["Title"]["title_read"]),
						$rightPickup["Title"]["url_str"])?>
				</h2>
				<div class="image">
					<?php echo $this->Common->titleLinkThumb(
						$this->Common->thumbName($rightPickup["Title"]["thumb_name"]),
						$this->Common->titleWithCase($rightPickup["Title"]["title_official"], $rightPickup["Title"]["title_read"]),
						$rightPickup["Title"]["url_str"], 60)?>
				</div>
				<p class="description"><?php echo mb_strimwidth(strip_tags($rightPickup["Title"]["description"]), 0, 120, " …", "UTF-8")?></p>
				<p class="data">
					<span class="label label-genre">ジャンル</span>
					<?php echo $this->Common->categoriesLink($rightPickup["Category"])?>
				</p>
				<p class="data data-official">
					<span class="label label-official">公式サイト</span>
					<?php echo $this->Common->officialLinkText($rightPickup["Title"]["title_official"], $rightPickup["Title"]["ad_use"], $rightPickup["Title"]["ad_text"], $rightPickup["Title"]["official_url"])?>
				</p>
			</li>
<?php endforeach;?>
		</ul>
	</div>
</section>
