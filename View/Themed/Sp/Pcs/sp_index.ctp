<?php
//set blocks
$this->assign("title", "オンラインゲーム用PC（パソコン）");
$this->assign("keywords", "オンラインゲーム,PC,パソコン,推奨,BTO");
$this->assign("description", "オンラインゲーム用PC（パソコン）についてのページです。ゲームに特化したBTOパソコンで快適にプレイを楽しみたい方は参考にどうぞ。");
//pankuz
// $this->set("pankuz_for_layout", "オンラインゲーム用PC");
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList("オンラインゲーム用PC"));
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main">オンラインゲーム用PC(パソコン)</span>
		<span class="sub">快適プレイを楽しむための推奨スペックPC</span>
	</h1>
	<div class="pageDescription">
		<p>派手な演出や、美しいグラフィックスが楽しめる3Dオンラインゲームなどでは、BTOパソコンショップなどからそれぞれのゲームの動作スペックを満たす推奨PCが販売されています。中にはPCを買うことで特典としてゲーム内アイテムや、非売品グッズがもらえるショップもありますので、ゲームをより楽しみたい方はオンラインゲーム用PCを一度チェックしてみてください。</p>
	</div>
</div>
<?php echo $this->Gads->ads320();?>
<!-- titles -->
<section class="pc-titles">
	<h2>タイトル別推奨PCを探す</h2>
	<ul class="borderedLinks imageLinks">
<?php foreach($titles as $title):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($title["Title"]["url_str"], "pc")?>">
				<div class="images">
					<div class="thumb"><?php echo $this->Common->titleThumb($title["Title"])?></div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($title["Title"]["title_official"], $title["Title"]["title_read"])?>
					</div>
					<div class="counts">
						<div class="count count-desktop<?php echo (empty($title["desktopCount"])) ? " count-none" : " "?>" title="デスクトップPC">
							<span class="caption"><i class="zmdi zmdi-desktop-windows"></i></span>
							<span class="number"><?php echo $title["desktopCount"]?></span>
						</div>
						<div class="count count-note<?php echo (empty($title["noteCount"])) ? " count-none" : " "?>" title="ノートPC">
							<span class="caption"><i class="zmdi zmdi-laptop"></i></span>
							<span class="number"><?php echo $title["noteCount"]?></span>
						</div>
					</div>
					<div class="price">
						<span class="caption">価格</span>
						<span class="number"><?php echo number_format($title["lowestPrice"])?><span class="unit">円〜</span></span>
					</div>
				</div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
