<?php echo $this->Form->create("Title", array("action" => "add", "type" => "file", "inputDefaults" => array("div" => false, "label" => false, "monthNames" => false, "dateFormat" => "YMD", "minYear" => 1990, "maxYear" => date("Y") + 2)))?>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $this->Form->checkbox("public", array("checked" => true))?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td>
				<?php echo $this->Form->input("title_official")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">読み</th>
			<td>
				<?php echo $this->Form->input("title_read")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サブタイトル</th>
			<td>
				<?php echo $this->Form->input("title_sub")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">省略タイトル</th>
			<td>
				<?php echo $this->Form->input("title_abbr")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">検索キーワード</th>
			<td>
				<?php echo $this->Form->input("keyword")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL文字列</th>
			<td>
				<?php echo $this->Form->input("url_str")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サムネイル</th>
			<td>
				<?php echo $this->Form->file("thumb_image")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $this->Form->textarea("description", array("class" => "editor"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サービス状態</th>
			<td>
				<?php echo $this->Form->input("service_id", array("default" => 2))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">正式サービス開始日</th>
			<td class="dateField">
				<?php echo $this->Form->text("service_start", array("type" => "date", "class" => "dateField-input input-medium"))?>
				<a href="javascript:void(0)" class="dateField-remove btn btn-small"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">テスト開始日</th>
			<td class="dateField">
				<?php echo $this->Form->text("test_start", array("type" => "date", "class" => "dateField-input input-medium"))?>
				<a href="javascript:void(0)" class="dateField-remove btn btn-small"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">テスト終了日</th>
			<td class="dateField">
				<?php echo $this->Form->text("test_end", array("type" => "date", "class" => "dateField-input input-medium"))?>
				<a href="javascript:void(0)" class="dateField-remove btn btn-small"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ文字</th>
			<td>
				<?php echo $this->Form->input("category_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ</th>
			<td>
				<?php echo $this->Form->input("Category", array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">スタイル</th>
			<td>
				<?php echo $this->Form->input("Style", array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ポータル</th>
			<td>
				<?php echo $this->Form->input("Portal", array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">課金方式</th>
			<td>
				<?php echo $this->Form->input("fee_id")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">料金</th>
			<td>
				<?php echo $this->Form->text("fee_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告利用</th>
			<td>
				<?php echo $this->Form->checkbox("ad_use")?> 広告を利用する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<?php echo $this->Form->textarea("ad_text", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーS120</th>
			<td>
				<?php echo $this->Form->textarea("ad_banner_s", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーM234</th>
			<td>
				<?php echo $this->Form->textarea("ad_banner_m", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーL468</th>
			<td>
				<?php echo $this->Form->textarea("ad_banner_l", array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Copyright</th>
			<td><?php echo $this->Form->textarea("copyright")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公式URL</th>
			<td>
				<?php echo $this->Form->input("official_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">公式スマホURL</th>
			<td>
				<?php echo $this->Form->input("official_url_sp")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">App Store URL</th>
			<td>
				<?php echo $this->Form->input("appdl_app_store")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Google Play URL</th>
			<td>
				<?php echo $this->Form->input("appdl_google_play")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Video</th>
			<td>
				<?php echo $this->Form->input("video")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>

<?php 
	$adPlatforms = array(
		"pc" => "PC",
		"sp" => "スマホ",
		"ios" => "iOS",
		"android" => "Android",
	);
?>
<?php foreach($adPlatforms as $key => $value):?>
	<h2><?php echo $value?>広告設定</h2>
	<table class="edit table table-bordered titleAds-table">
		<tr>
			<th nowrap="nowrap">テキスト広告</th>
			<td>
				<div class="titleAds-preview-text"></div>
				<?php echo $this->Form->input("Titlead.{$key}_text_src", array("class" => "titleAds-ad-text focusSelect"))?>
				<div><a href="javascript:void(0)" class="btn btn-info titleAds-get-text">GetTitleAdText</a></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">イメージ広告</th>
			<td>
				<div class="titleAds-preview-image"></div>
				<?php echo $this->Form->input("Titlead.{$key}_image_src", array("class" => "titleAds-ad-image focusSelect"))?>
				<div><a href="javascript:void(0)" class="btn btn-info titleAds-get-image">GetTitleAdImage</a></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告URL</th>
			<td><?php echo $this->Form->input("Titlead.{$key}_part_url", array("class" => "titleAds-part-url"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td><?php echo $this->Form->input("Titlead.{$key}_part_text", array("class" => "titleAds-part-text"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告画像src</th>
			<td><?php echo $this->Form->input("Titlead.{$key}_part_img_src", array("class" => "titleAds-part-img-src"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告トラッキングsrc</th>
			<td><?php echo $this->Form->input("Titlead.{$key}_part_track_src", array("class" => "titleAds-part-track-src"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告開始日時</th>
			<td class="dateField">
				<?php echo $this->Form->input("Titlead.{$key}_start", array("type" => "datetime-local", "class" => "dateField-input", "step" => "1800"))?>
				<a href="javascript:void(0)" class="dateField-remove btn btn-small"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告終了日時</th>
			<td class="dateField">
				<?php echo $this->Form->text("Titlead.{$key}_end", array("type" => "datetime-local", "class" => "dateField-input", "step" => "1800"))?>
				<a href="javascript:void(0)" class="dateField-remove btn btn-small"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リダイレクト</th>
			<td>
				<?php echo $this->Form->input("Titlead.{$key}_noredirect")?> しない
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $this->Form->submit("登録", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php endforeach;?>
<?php echo $this->Form->end()?>