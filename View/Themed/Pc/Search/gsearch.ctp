<?php
//set blocks
$this->assign("title", "キーワード検索結果");
$this->assign("keywords", "");
$this->assign("description", "");
//pankuz
$this->set("pankuz_for_layout", "キーワード検索結果");
//json ld
$this->assign("json_ld", $this->JsonLd->breadCrumbList("キーワード検索結果"));
?>

<section class="search">
	<h1 class="pageTitle">
		<span class="main">検索結果</span>
		<span class="sub">Googleカスタム検索</span>
	</h1>

<script>
  (function() {
    var cx = '012547893117895313482:tu2cfc4bpam';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>
</section>