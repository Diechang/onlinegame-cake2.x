<?php
//set blocks
$this->assign("title", "オンラインゲームポータルサイト");
$this->assign("keywords", "オンラインゲーム,ポータルサイト,アバター");
$this->assign("description", "いろんなオンラインゲームが窓口一つで楽しめる。オンラインゲームポータルサイトについてのページです。");
//pankuz
$this->set("pankuz_for_layout", "オンラインゲームポータル");
?>
<!-- about -->
<div class="portal-about pageInfo">
	<h1 class="pageTitle">
		<span class="main">オンラインゲームポータルサイト</span>
		<span class="sub">一つのサイトでいろんなゲームが楽しめる</span>
	</h1>
	<section>
		<h2 class="headline">オンラインゲームポータルサイトとは</h2>
		<div class="capture"><img src="http://capture.heartrails.com/200x300?http://wwww.hangame.co.jp/" alt="ハンゲーム" width="200"></div>
		<p> オンラインゲームポータルサイトとは複数のゲームを提供しているサイトのことです。</p>
		<p>一般的に言われるポータルサイトとは、YahooやGoogleなどのように、インターネットの入り口となるような巨大なWebサイトのことで、「インターネットを始めるならまずはここから」と言われるようなサイトのことですね。</p>
		<p>オンラインゲームポータルサイトはそのオンラインゲーム版です。<br>
		つまり、「オンラインゲームを始めるならまずはここから」と言われるサイトのことです。<br>
		オンラインゲームポータルサイトでは、自社のゲームはもちろん、他社とも提携し、たくさんのゲームを扱っています。</p>
		<p>同じタイトルのゲームであっても、特定のポータルサイトのみでのイベントやキャンペーンなどが行われる場合もあります。。各オンラインゲームのアカウントの管理もポータルサイトからの登録になればわかりやすいですね。</p>
	</section>
	<section>
		<h2 class="headline">友達の輪を広げよう</h2>
		<p>オンラインゲームポータルサイトでは、ハンゲームや@gamesのように、<strong>アバター</strong>と呼ばれる「オンライン上の自分の分身」を持つことができるサービスもあります。<br>
		オシャレな服を着せて、ペットを連れて街を歩いて、アバター同士で会話して。</p>
		<p>ゲームの世界を超えた新しい友情や出会いがあるかもしれません。</p>
		<div class="gAds"><?php echo $this->Gads->ads468()?></div>
	</section>
</div>

<!-- sites -->
<section class="portal-sites">
	<h1>オンラインゲームポータルサイト一覧</h1>
	<ul class="list">
<?php foreach($portals as $portal):?>
		<li>
			<h2 class="title">
				<a href="<?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?>">
					<?php echo $this->Common->title_separated_span($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>
				</a>
			</h2>
			<div class="images">
				<div class="thumb">
					<a href="<?php echo $this->Html->url(array("controller" => "portals", "action" => "view", "path" => $portal["Portal"]["url_str"], "ext" => "html"))?>">
						<img src="http://capture.heartrails.com/160x120?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $this->Common->title_separated_case($portal["Portal"]["title_official"], $portal["Portal"]["title_read"])?>">
					</a>
				</div>
			</div>
			<div class="data">
				<p class="description"><?php echo strip_tags($portal["Portal"]["description"])?></p>
				<p class="official"><span class="label label-official">公式サイト</span> <?php echo $this->Common->official_link_text($portal["Portal"]["title_official"], $portal["Portal"]["ad_use"], $portal["Portal"]["ad_text"], $portal["Portal"]["official_url"])?></p>
			</div>
		</li>
<?php endforeach;?>
	</ul>
</section>
