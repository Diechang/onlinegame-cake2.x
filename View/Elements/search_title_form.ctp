<?php $searchMst = $this->requestAction(array("controller" => "element_parts", "action" => "search_title_form"))?>
<!-- Search form -->
<?php echo $this->Form->create(false, array("type" => "get", "url" => array("controller" => "search", "action" => "result"), "id" => "SearchTitle", "inputDefaults" => array("label" => false, "div" => false)));?>
		
	<fieldset class="keyword">
		<legend>キーワード</legend>
		<div class="inputs"><?php echo $this->Form->text("keyword", array("value" => (isset($this->request->query["keyword"])) ? $this->request->query["keyword"] : null));?></div>
	</fieldset>

	<fieldset class="genres">
		<legend>ジャンル</legend>
		<div class="inputs">
			<ul>
	<?php foreach($searchMst["Categories"] as $mstCategory):?>
				<li><?php echo $this->SearchPage->checkList($mstCategory, "Category");?></li>
	<?php endforeach;?>
			</ul>
		</div>
	</fieldset>

	<fieldset class="styles">
		<legend>スタイル・環境</legend>
		<div class="inputs">
			<ul>
	<?php foreach($searchMst["Styles"] as $mstStyle):?>
				<li><?php echo $this->SearchPage->checkList($mstStyle, "Style");?></li>
	<?php endforeach;?>
			</ul>
		</div>
	</fieldset>

	<fieldset class="services">
		<legend>サービス状態</legend>
		<div class="inputs">
			<ul>
<?php foreach($searchMst["Services"] as $mstService):?>
				<li><?php echo $this->SearchPage->checkList($mstService, "Service", "services")?></li>
<?php endforeach;?>
			</ul>
		</div>
	</fieldset>

	<fieldset class="other">
		<legend>ついでに</legend>
		<div class="inputs">
			<ul>
				<?php echo $this->SearchPage->otherCheckList()?>
			</ul>
		</div>
	</fieldset>

	<fieldset class="order">
		<legend>並び順</legend>
		<div class="inputs">
			<ul>
				<?php echo $this->SearchPage->orderCheckList()?>
			</ul>
		</div>
	</fieldset>

	<div class="submit">
		<button class="button button-search"><i class="zmdi zmdi-search"></i> この条件で検索する</button>
	</div>
<!-- 	<div class="buttons"><input type="submit" value="この条件で検索" class="button" /></div> -->
<?php echo $this->Form->end();?>
