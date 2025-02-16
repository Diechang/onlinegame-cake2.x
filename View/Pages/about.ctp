<?php
//set blocks
$this->assign("title", "当サイトについて");
$this->assign("keywords", "オンラインゲームライフ");
$this->assign("description", "オンラインゲームライフについてのページです。");
//pankuz
$this->set("pankuz_for_layout", "当サイトについて");
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList("当サイトについて"));
?>

<!-- documents -->
<section class="about-doc">
	<h1 class="pageTitle">当サイトについて</h1>
	<dl>
		<dt>サイト名</dt>
		<dd>オンラインゲームライフ</dd>
		<dt>URL</dt>
		<dd><?php echo $this->Html->url("/", true)?></dd>
		<dt>サイト内容</dt>
		<dd>無料で遊べるオンラインゲームをメインに紹介します。<br>
		「ゲームが好きだから、ゲームのサイトをやろう」そんな単純な思いで始めたサイトです。<br>
		ゲームの評価点数やレビューの投稿も可能になっていますのでどんどん投稿をお願いします。<br>
		※Javascript、Cookieを有効にしてご覧ください。</dd>
		<dt>管理人</dt>
		<dd>ZILOW</dd>
	</dl>
	<?php echo $this->Gads->ads468()?>
	<section>
		<h2 class="headline">免責･注意事項</h2>
		<p>当サイトは個人サイトであり、企業や団体とは一切関係ありません。</p>
		<p> 当サイトの利用に関しては、各個人の自己責任でお願いいたします。<br>
		当サイトを利用してのトラブル、損失等、当サイトは一切責任を負えませんのでご了承をお願いいたします。</p>
		<p>当サイト内で使用している画像や文章の無断コピー・転載はお断りいたします。</p>
		<p>当サイトにおける一部の画像・データの著作権は各コンテンツ開発元・運営会社に帰属し、
		当サイト内で記載されている各企業・各製品の名称などは、各企業の登録商標である場合があります。</p>
	</section>
	<section>
		<h2 class="headline">プライバシーポリシー</h2>
		<p>当サイトでは、第三者配信による広告サービスを利用しています。<br>
		このような広告配信事業者は、ユーザーの興味に応じた商品やサービスの広告を表示するため、当サイトや他サイトへのアクセスに関する情報(氏名、住所、メール アドレス、電話番号は含まれません)を使用することがあります。</p>
		<p>このプロセスの詳細やこのような情報が広告配信事業者に使用されないようにする方法については、<a href="http://www.google.com/ads/preferences" target="_blank">ここ</a>（Google Ads   Preferences）をクリックしてください。 </p>
	</section>
	<section>
		<h2 class="headline">ゲーム内容について</h2>
		<p>当サイト内のゲーム情報・データは、各ゲームの公式サイト、及びゲーム情報サイトを参考に構成されています。<br>
		また、当サイトで紹介されているゲーム内容は、執筆時点のものですので、各ゲームのアップデートなどにより、実際のゲーム内容と異なる場合もありますので、あくまで参考程度にご利用ください。</p>
	</section>
	<section>
		<h2 class="headline">評価・レビューの投稿について</h2>
		<p>投稿内容は管理人が随時チェックしています。<br>
		投稿したすぐあとは表示されていても、内容に問題があると判断した場合など、削除する場合もあります。<br>
		（誹謗中傷を含む投稿など）</p>
		<p>評価・レビューは１タイトルにつき１回まででお願いします。<br>
		同一人物によるオール１などの連続投稿が目立ってきたためです。<br>
		投稿時にパスワードを設定することで後から編集することも可能です。</p>
		<p>評価・レビューを投稿するためには、JavaScript・Cookieを有効にしてください。<br>
		（特に設定しない限り通常は有効になっています）<br>
		JavaScript：ロボットによる自動投稿防止のため<br>
		Cookie：同一人物による同一タイトルへの多重投稿防止のため<br>
		ご理解をお願いいたします。</p>
	</section>
</section>

<section class="about-doc">
	<h1>リンクについて</h1>
	<p>当サイトはリンクフリーです。リンクを貼る際の報告なども必要ありません。</p>
	<p><?php echo $this->Html->image("banner8831.gif", array("alt" => "【オンラインゲームライフ】バナー"))?><br>
	手抜きですけどバナーです。（88×31px）<br>
	※ダウンロードしてご利用ください。</p>
	<section>
		<h2 class="headline">相互リンクについて</h2>
		<p>相互リンクをご希望の方は、<?php echo $this->Html->link("相互リンク依頼フォーム", array("controller" => "links", "path" => "index", "ext" => "html", "#" => "form"))?>からご登録をお願いします。<br>
		当サイトにリンクを貼った後に、ご自身のサイトにあったカテゴリにご登録ください。<br>
		管理人によるサイト内容の確認、承認後に掲載されます。</p>
		<p class="clDanger">※更新のないサイト様など、定期的にチェックしてリンクを解除する場合がありますのでご了承ください。</p>
	</section>
	<section>
		<h2 class="headline">攻略サイト・ファンサイトを募集しています</h2>
		<p>当サイトでは、各ゲームの攻略サイト・ファンサイト・コミュニティやギルドサイト等を募集しています。
		各ゲームコンテンツページからのリンクになりますので、相互リンク集より多くのアクセスが期待できます。</p>
		<p>自薦、他薦は問いませんので、各タイトルの『攻略・ファンサイト』ページからお気軽に登録をお願いします。<br>
		掲載基準は若干厳しく設定させていただきますが、自薦の場合は当サイトと相互リンクしていただけると上位に表示されます。</p>
		<p>また、掲載されているリンクは管理人の独断＆無断で掲載させていただいているものが多数あります。もし不快に思われるサイト運営者の方がいましたら、お手数ですが<?php echo $this->Html->link("お問い合わせフォーム", array("controller" => "pages", "action" => "contact", "ext" => "html"))?>よりご連絡いただければただちに削除いたします。</p>
	</section>
</section>