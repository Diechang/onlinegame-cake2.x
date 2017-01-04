<!-- platforms -->
<section class="platforms">
	<h2>
		<span class="main">プラットフォーム</span>
		<span class="sub">対応環境で探す</span>
	</h2>
	<ul>
<?php foreach($leftPlatforms as $platform):?>
		<li><?php echo $this->Html->link($platform["Platform"]["str"], array("controller" => "platforms", "action" => "index", "path" => $platform["Platform"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
</section>
