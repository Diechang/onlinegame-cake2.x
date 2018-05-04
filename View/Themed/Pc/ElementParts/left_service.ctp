<!-- services -->
<section class="services">
	<h2>
		<span class="main">サービス状態</span>
		<span class="sub">新作ゲームをチェック</span>
	</h2>
	<ul>
<?php foreach($leftServices as $service):?>
		<li><?php echo $this->Html->link($service["Service"]["str"], array("controller" => "services", "action" => "index", "path" => $service["Service"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
	</ul>
</section>
