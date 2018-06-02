<!-- header -->
<header>
	<div class="logo"><?php echo $this->Html->image("design_sp/logo_header.png", array("alt" => "【オンラインゲームライフ】-無料オンラインゲーム情報-", "width" => 170, "height" => 40, "url" => "/sp/"));?></div>
	<div class="topMenu">
		<!-- search -->
		<div class="search topMenu-item">
			<a href="javascript:void(0)" class="trigger-search topMenu-trigger">
				<span class="icon"><img src="/img/design_sp/icon_header_search.png" width="20" height="20"></span>
				<span class="text">検索</span>
			</a>
			<div class="hover-search topMenu-hover">
				
				<?php echo $this->Form->create(false, array(
					"url" => array("controller" => "search", "action" => "gsearch"),
					"type" => "get",
					"class" => "search-form",
					"inputDefaults" => array(
						"label" => false,
						"div" => false
					)
				))?>
					<div class="search-inputs">
						<?php echo $this->Form->input("q", array(
							"type" => "text",
							"class" => "search-text",
							"size" => "31",
							"placeholder" => "キーワード検索",
						))?>
						<?php echo $this->Form->button('<i class="zmdi zmdi-search zmdi-hc-2x"></i>', array(
							"type" => "submit",
							"class" => "search-button"
						))?>
					</div>
					<div class="search-conditions">
						<?php echo $this->Html->link("条件を指定して探す", array("controller" => "search", "action" => "index", "ext" =>"html"))?>
					</div>
				<?php echo $this->Form->end()?>
			</div>
		</div>
		<!-- menu -->
		<div class="menu topMenu-item">
			<a href="javascript:void(0)" class="trigger-menu topMenu-trigger">
				<span class="icon"><img src="/img/design_sp/icon_header_menu.png" width="20" height="20"></span>
				<span class="text">メニュー</span>
			</a>
			<div class="hover-menu topMenu-hover">
				<nav class="menu-list">
					<ul>
						<li><?php echo $this->Html->link("人気ランキング", array("controller" => "ranking", "action" => "index", "path" => "index", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("レビュー", array("controller" => "review", "action" => "index", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("ポータルサイト", array("controller" => "portals", "action" => "index", "ext" => "html"))?></li>
						<li><?php echo $this->Html->link("ゲーム代を稼ぐ", array("controller" => "monies", "action" => "index", "ext" => "html"))?>
						<li><?php echo $this->Html->link("ゲーム用PC", array("controller" => "pcs", "action" => "index", "ext" => "html"))?></li>
						<li>
							<?php echo $this->Html->link("ゲームを探す", array("controller" => "search", "action" => "index", "ext" =>"html"))?>
							<dl>
								<dt>プラットフォームから探す</dt>
								<dd>
									<ul>
<?php foreach($headerPlatforms as $platform):?>
										<li><?php echo $this->Html->link($platform["Platform"]["str"], array("controller" => "platforms", "action" => "index", "path" => $platform["Platform"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
									</ul>
								</dt>
								<dt>ジャンルから探す</dt>
								<dd>
									<ul>
<?php foreach($headerCategories as $category):?>
										<li><?php echo $this->Html->link($category["Category"]["str"], array("controller" => "categories", "action" => "index", "path" => $category["Category"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
									</ul>
								</dd>
								<dt>スタイルから探す</dt>
								<dd>
									<ul>
<?php foreach($headerStyles as $style):?>
										<li><?php echo $this->Html->link($style["Style"]["str"], array("controller" => "styles", "action" => "index", "path" => $style["Style"]["path"], "ext" => "html"))?></li>
<?php endforeach;?>
									</ul>
								</dd>
							</dl>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
