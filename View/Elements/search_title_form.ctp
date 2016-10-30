<?php $searchMst = $this->requestAction(array("controller" => "element_parts", "action" => "search_title_form"))?>
<!-- Search form -->
<?php echo $this->Form->create(false, array("type" => "get", "url" => array("controller" => "search", "action" => "result"), "id" => "SearchTitle", "inputDefaults" => array("label" => false, "div" => false)));?>
<!-- <form name="SearchTitle" action="<?php echo $this->Html->url(array("controller" => "search", "action" => "result"))?>" method="get"> -->
		
	<fieldset class="keyword">
		<legend>キーワード</legend>
		<div class="inputs"><?php echo $this->Form->text("keyword");?></div>
	</fieldset>
<!-- 
	<div class="frameWide">
		<h3><?php echo $this->Html->image("design/content_search_title_keyword.gif", array("alt" => "キーワード"))?></h3>
		<div class="body">
			<input type="text" name="keyword" value="<?php if(isset($this->request->params["url"]["keyword"])){echo h($this->request->params["url"]["keyword"]);}?>" class="text" />
		</div>
	</div>
 -->

	<fieldset class="genres">
		<legend>ジャンル</legend>
		<div class="inputs">
			<ul>
	<?php foreach($searchMst["Categories"] as $mstCategory):?>
				<li><?php echo $this->SearchPage->check_list($mstCategory, "Category");?></li>
	<?php endforeach;?>
			</ul>
		</div>
	</fieldset>
<!-- 
		<div class="frameHalf flLeft">
			<h3><?php echo $this->Html->image("design/content_search_title_genre.gif", array("alt" => "ジャンル"))?></h3>
			<div class="body">
				<ul>
<?php foreach($searchMst["Categories"] as $mstCategory):?>
					<?php echo $this->SearchPage->checkList($mstCategory, "Category", "categories")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
 -->

	<fieldset class="styles">
		<legend>スタイル・環境</legend>
		<div class="inputs">
			<ul>
	<?php foreach($searchMst["Styles"] as $mstStyle):?>
				<li><?php echo $this->SearchPage->check_list($mstStyle, "Style");?></li>
	<?php endforeach;?>
			</ul>
		</div>
	</fieldset>
<!-- 
		<div class="frameHalf flRight">
			<h3><?php echo $this->Html->image("design/content_search_title_style.gif", array("alt" => "スタイル・環境"))?></h3>
			<div class="body">
				<ul>
<?php foreach($searchMst["Styles"] as $mstStyle):?>
					<?php echo $this->SearchPage->checkList($mstStyle, "Style", "styles")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
 -->

	<fieldset class="services">
		<legend>サービス状態</legend>
		<div class="inputs">
			<ul>
<?php foreach($searchMst["Services"] as $mstService):?>
				<li><?php echo $this->SearchPage->check_list($mstService, "Service", "services")?></li>
<?php endforeach;?>
			</ul>
		</div>
	</fieldset>
<!-- 
		<div class="frameWide">
			<h3><?php echo $this->Html->image("design/content_search_title_service.gif", array("alt" => "サービス状態"))?></h3>
			<div class="body">
				<ul class="tile clearfix">
<?php foreach($searchMst["Services"] as $mstService):?>
					<?php echo $this->SearchPage->checkList($mstService, "Service", "services")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
 -->

	<fieldset class="other">
		<legend>ついでに</legend>
		<div class="inputs">
			<ul>
				<?php echo $this->SearchPage->other_check_list()?>
			</ul>
		</div>
	</fieldset>
<!-- 
		<div class="frameWide">
			<h3><?php echo $this->Html->image("design/content_search_title_other.gif", array("alt" => "ついでに"))?></h3>
			<div class="body">
				<ul>
					<?php echo $this->SearchPage->otherCheckList()?>
				</ul>
			</div>
		</div>
 -->

	<fieldset class="order">
		<legend>並び順</legend>
		<div class="inputs">
			<ul>
				<?php echo $this->SearchPage->order_check_list()?>
			</ul>
		</div>
	</fieldset>
<!-- 
		<div class="frameWide">
			<h3><?php echo $this->Html->image("design/content_search_title_order.gif", array("alt" => "並び順"))?></h3>
			<div class="body">
				<ul>
					<?php echo $this->SearchPage->orderCheckList()?>
				</ul>
			</div>
		</div>
 -->
	<div class="submit">
		<button class="button button-search"><i class="zmdi zmdi-search"></i> この条件で検索する</button>
	</div>
<!-- 	<div class="buttons"><input type="submit" value="この条件で検索" class="button" /></div> -->
<?php echo $this->Form->end();?>
