<?php
//スタイル
//
$this->set("title_for_layout", "オンラインゲーム検索");
$this->set("keywords_for_layout", "検索,サーチ,オンラインゲーム");
$this->set("description_for_layout", "オンラインゲーム検索フォームです。条件を設定して自分好みのオンラインゲームを探してください。");
$this->set("pankuz_for_layout", "オンラインゲーム検索");
?>

<section class="search">
	<h1 class="pageTitle">
		<span class="main">オンラインゲーム検索</span>
		<span class="sub">自分好みのオンラインゲームを探そう</span>
	</h1>
	<div class="form-search">
<?php echo $this->element("search_title_form");?>
	</div>
</section>