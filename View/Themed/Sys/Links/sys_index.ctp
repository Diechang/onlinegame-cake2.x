<?php echo $this->Form->create("Link", array("url" => array("action" => "lump")))?>
	<h2>相互リンク一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<?php echo $this->Form->submit("一括修正", array("class" => "btn"))?>
		<input type="text" id="word_searcher" />
		<select id="narrow_changer" class="category" onchange="LT.narrowCategory(this.value)">
			<option value="all" selected="selected">すべて</option>
	<?php foreach($linkcategories as $linkcategory):?>
			<option value="<?php echo $linkcategory["Linkcategory"]["path"]?>"><?php echo $linkcategory["Linkcategory"]["path"]?></option>
	<?php endforeach;?>
		</select>
	</div>
	<?php echo $this->element("sys_list_links", array("links" => $links))?>
	<div class="controll"><?php echo $this->Form->submit("一括修正", array("class" => "btn"))?></div>
<?php echo $this->Form->end()?>
