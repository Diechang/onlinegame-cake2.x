<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">

<title>レビュー投稿をお願いします</title>
<style>
	body
	{
		margin: 0;
		padding: 20px;
	}

	li
	{
		margin-bottom: 1em;
	}
	li.new:after
	{
		content: " new";
		color: red;
		font-size: 12px;
		font-weight: bold;
	}
</style>
</head>

<body>
<h1>依頼内容をご覧いただきありがとうございます。</h1>
<p>以下の中から遊んだことのあるタイトルのレビュー投稿をお願い致します。</p>

<ul>

<?php foreach($titles as $t):?>
<li><a href='/titles/<?php echo $t["Title"]["url_str"]; ?>/review.html#form' target='_blank'><?php echo $this->Common->titleWithCase($t["Title"]["title_official"], $t["Title"]["title_read"]); ?></a></li>
<?php endforeach;?>

</ul>

<h2>以上、ご協力のほど、よろしくお願い致します。</h2>
</body>
</html>
