<?php
//set blocks
$this->assign("title", "オンラインゲームポータルサイト");
$this->assign("keywords", "オンラインゲーム,ポータルサイト,アバター");
$this->assign("description", "いろんなオンラインゲームが窓口一つで楽しめる。オンラインゲームポータルサイトについてのページです。");
//pankuz
// $this->set("pankuz_for_layout", "オンラインゲームポータル");
//json ld
// $this->assign("json_ld", $this->JsonLd->breadCrumbList("オンラインゲームポータル"));
?>
<div class="pageInfo">
	<h1 class="pageTitle">
		<span class="main">オンラインゲームポータルサイト</span>
		<span class="sub">一つのサイトでいろんなゲームが楽しめる</span>
	</h1>
</div>
<?php echo $this->Gads->ads320();?>
<section class="portal-about">
	<h2>オンラインゲームポータルサイトとは</h2>
	<div class="portal-about-body">
		<div class="capture"><img src="http://capture.heartrails.com/200x200?http://wwww.hangame.co.jp/" alt="ハンゲーム" width="100" /></div>
		<p> オンラインゲームポータルサイトとは複数のゲームを提供しているサイトのことです。</p>
		<p>一般的に言われるポータルサイトとは、YahooやGoogleなどのように、インターネットの入り口となるような巨大なWebサイトのことで、「インターネットを始めるならまずはここから」と言われるようなサイトのことですね。</p>
		<p>オンラインゲームポータルサイトはそのオンラインゲーム版です。<br />
		つまり、「オンラインゲームを始めるならまずはここから」と言われるサイトのことです。<br />
		オンラインゲームポータルサイトでは、自社のゲームはもちろん、他社とも提携し、たくさんのゲームを扱っています。</p>
		<p>同じタイトルのゲームであっても、特定のポータルサイトのみでのイベントやキャンペーンなどが行われる場合もあります。。各オンラインゲームのアカウントの管理もポータルサイトからの登録になればわかりやすいですね。</p>
	</div>
</section>
<section class="portal-about">
	<h2>友達の輪を広げよう</h2>
	<div class="portal-about-body">
		<p>オンラインゲームポータルサイトでは、ハンゲームや@gamesのように、<strong>アバター</strong>と呼ばれる「オンライン上の自分の分身」を持つことができるサービスもあります。<br />
		オシャレな服を着せて、ペットを連れて街を歩いて、アバター同士で会話して。</p>
		<p>ゲームの世界を超えた新しい友情や出会いがあるかもしれません。</p>
	</div>
</section>
<?php echo $this->Gads->adsResponsive();?>
<!-- sites -->
<section class="portal-sites">
	<h2>オンラインゲームポータルサイト一覧</h2>
	<ul class="borderedLinks imageLinks imageLinks-s">
<?php foreach($portals as $portal):?>
		<li>
			<a href="<?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?>">
				<div class="images">
					<div class="thumb">
						<img src="https://capture.heartrails.com/160x120?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $this->Common->titleWithCase($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>">
					</div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>
					</div>
				</div>
			</a>
		</li>
<?php endforeach;?>
	</ul>
</section>
