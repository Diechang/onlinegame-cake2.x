<?php
//Title vars
$titleWithStrs = $this->Common->titleWithStrs($title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]);
//set blocks
$this->assign("title", $titleWithStrs["Abbr"] . " 推奨PC（パソコン）");
$this->assign("keywords", $this->TitlePage->metaKeywords($this->request->params["action"], $title["Title"]["title_official"], $title["Title"]["title_read"], $title["Title"]["title_abbr"], $title["Title"]["title_sub"]));
$this->assign("description", $titleWithStrs["Sub"] . "の推奨PC(パソコン)です。ショップが推奨するゲームモデルPCで快適プレイ！");
//assigns
$this->assign("title_header", $this->element("title_header"));
$this->assign("title_nav_floating", $this->element("title_nav_floating", array("title" => $title)));
//pankuz
$this->set("pankuz_for_layout", array(array("str" => $titleWithStrs["Case"], "url" => array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), "推奨PC"));
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList(array(
	array("name" => $titleWithStrs["Case"], "id" => $this->Html->url(array("action" => "index", "path" => $title["Title"]["url_str"], "ext" => "html")), true),
	"推奨PC",
)));
$this->append("json_ld", $this->JsonLd->titlePcs($lowPrice, $highPrice, $titleWithStrs["Case"] . "推奨PC"));
//OGP
$this->element("title_ogp", array("titleWithStrs" => $titleWithStrs));
?>

<!-- nav -->
<?php echo $this->element("title_nav")?>

<!-- pc -->
<section class="title-pc">
	<h1>
		<span class="main">推奨モデルPC(パソコン)</span>
		<span class="sub"><?php echo $title["Title"]["title_official"]?>を快適に遊ぶための推奨環境モデルPC</span>
	</h1>
	<?php if(empty($pcs)):?>
	<div class="flash flash-danger">
		<div class="flash-title">PCデータがありません</div>
		<div class="flash-body">登録されていない、または削除されました。</div>
	</div>
	<?php else:?>
	<div class="flash flash-warning">
		<div class="flash-title">掲載されている価格や購入特典等のデータは、登録時点のものです</div>
		<div class="flash-body">必ずショップページにて最新データの確認をお願いいたします</div>
	</div>
	<!-- pickup -->
		<?php foreach($pcs["pickups"] as $pickup):?>
		<section class="pickup">
			<span class="ribbon">おすすめ</span>
			<h2><?php echo $this->Common->adLinkText($pickup["Pc"], "pc")?></h2>
			<div class="image"><?php echo $this->Common->adLinkImage($pickup["Pc"], "pc")?></div>
			<div class="data">
				<table>
					<tr>
						<th nowrap="nowrap">CPU</th>
						<td><?php echo nl2br($pickup["Pc"]["cpu"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">グラフィック</th>
						<td><?php echo nl2br($pickup["Pc"]["graphic"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">メモリ</th>
						<td><?php echo nl2br($pickup["Pc"]["memory"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">HDD</th>
						<td><?php echo nl2br($pickup["Pc"]["hdd"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">ドライブ</th>
						<td><?php echo nl2br($pickup["Pc"]["drive"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">OS</th>
						<td><?php echo nl2br($pickup["Pc"]["os"])?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">ショップ</th>
						<td><?php echo $pickup["Pcshop"]["ad_use"] ? $pickup["Pcshop"]["ad_text"] : $this->Html->link($pickup["Pcshop"]["shop_name"], $pickup["Pcshop"]["shop_url"], array("target" => "_blank"))?></td>
					</tr>
					<tr>
						<th nowrap="nowrap">価格</th>
						<td class="price"><?php echo number_format($pickup["Pc"]["price"])?> 円</td>
					</tr>
				</table>
			</div>
			<?php if(!empty($pickup["Pc"]["present"])):?>
			<div class="special">
				<span class="caption">購入特典</span>
				<div class="body">
					<?php echo $pickup["Pc"]["present"]?>
				</div>
			</div>
			<?php endif;?>
			<!-- shop link -->
			<div class="shoplink">
				<span class="caption">商品の購入・詳細はこちら</span>
				<i class="icon zmdi zmdi-chevron-right"></i>
				<?php echo $this->Common->adLinkText($pickup["Pc"], "pc")?>
			</div>
		</section>
		<?php endforeach;?>
		<!--Types-->
		<?php foreach($pctypes as $pctype):?>
		<?php if(!empty($pcs[$pctype["Pctype"]["path"]])):?>
			<!-- <?php echo $pctype["Pctype"]["path"]?> -->
			<section class="list list-<?php echo $pctype["Pctype"]["path"]?>">
				<h2><i class="zmdi zmdi-<?php echo ($pctype["Pctype"]["path"] == "desktop") ? "desktop-windows" : "laptop"?>"></i> <?php echo $pctype["Pctype"]["str"]?>PC一覧</h2>
				<?php foreach($pcgrades as $pcgrade):?>
				<?php if(!empty($pcs[$pctype["Pctype"]["path"]][$pcgrade["Pcgrade"]["path"]])):?>
					<h3 class="<?php echo $pcgrade["Pcgrade"]["path"]?>"><?php echo $pcgrade["Pcgrade"]["str"]?></h3>
					<dl>
					<?php foreach($pcs[$pctype["Pctype"]["path"]][$pcgrade["Pcgrade"]["path"]] as $pc):?>
						<dt class="<?php echo (!empty($pc["Pc"]["pickup"])) ? "pickup" : ""?>"><?php echo $this->Common->adLinkText($pc["Pc"], "pc")?></dt>
						<dd>
							<div class="image"><?php echo $this->Common->adLinkImage($pc["Pc"], "pc")?></div>
							<div class="data">
								<table>
									<tr>
										<th nowrap="nowrap">CPU</th>
										<td><?php echo nl2br($pc["Pc"]["cpu"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">グラフィック</th>
										<td><?php echo nl2br($pc["Pc"]["graphic"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">メモリ</th>
										<td><?php echo nl2br($pc["Pc"]["memory"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">HDD</th>
										<td><?php echo nl2br($pc["Pc"]["hdd"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">ドライブ</th>
										<td><?php echo nl2br($pc["Pc"]["drive"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">OS</th>
										<td><?php echo nl2br($pc["Pc"]["os"])?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">購入特典</th>
										<td><?php echo (strlen(strip_tags($pc["Pc"]["present"])) > 0) ? "あり" : "なし"?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">ショップ</th>
										<td><?php echo $pc["Pcshop"]["ad_use"] ? $pc["Pcshop"]["ad_text"] : $this->Html->link($pc["Pcshop"]["shop_name"], $pc["Pcshop"]["shop_url"], array("target" => "_blank"))?></td>
									</tr>
									<tr>
										<th nowrap="nowrap">価格</th>
										<td class="price"><?php echo number_format($pc["Pc"]["price"])?> 円</td>
									</tr>
								</table>
							</div>
							<div class="shop"><a href="#" class="button button-official">商品の購入・詳細はこちら</a></div>
						</dd>
					<?php endforeach;?>
					</dl>
				<?php endif;?>
				<?php endforeach;?>
			</section>
		<?php endif;?>
		<?php endforeach;?>
	<?php endif;?>
</section>

<!-- details -->
<?php echo $this->element("title_details", array("titleWithStrs" => $titleWithStrs))?>

<!-- recommends -->
<?php echo $this->element("title_recommends", array($recommends))?>