<!-- Titles -->
<h3>
	<?php echo $this->Html->link("タイトル新規登録" , array("controller" => "titles" , "action" => "add") , array("class" => "btn btn-success"))?>
	<?php echo $this->Form->create("Title" , array("url" => array("action" => "index") , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
		<?php echo $this->Form->text("w" , array("size" => 10))?>
		<?php echo $this->Form->select("category", $categories , array("empty" => "-カテゴリ-"))?>
		<?php echo $this->Form->select("service", $services , array("empty" => "-サービス-"))?>
		<?php echo $this->Form->submit("タイトル検索" , array("div" => false , "class" => "btn"))?>
	<?php echo $this->Form->end()?>
</h3>

<?php echo $this->Form->create("Title" , array("url" => array("controller" => "titles" , "action" => "lump")))?>
	<h2>タイトル10件 <?php echo $this->Html->link("一覧" , array("controller" => "titles" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_titles" , array("titles" => $titles))?>
	<div class="controll"><input type="submit" value="タイトル一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
<!--  -->
<?php
/* events
<!-- Events -->
<?php echo $this->Form->create("Event" , array("controller" => "events" , "action" => "lump"))?>
	<h2>イベント10件 <?php echo $this->Html->link("一覧" , array("controller" => "events" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_events" , array("events" => $events , "changer" => false))?>
	<div class="controll"><input type="submit" value="イベント一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
*/
?>
<!-- Votes -->
<?php echo $this->Form->create("Vote" , array("url" => array("controller" => "votes" , "action" => "lump")))?>
	<h2>投稿10件 <?php echo $this->Html->link("一覧" , array("controller" => "votes" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_votes" , array("votes" => $votes , "changer" => false))?>
	<div class="controll"><input type="submit" value="投稿一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
<!--  -->
<!-- Fansites -->
<?php echo $this->Form->create("Fansite" , array("url" => array("controller" => "fansites" , "action" => "lump")))?>
	<h2>ファンサイト10件 <?php echo $this->Html->link("一覧" , array("controller" => "fansites" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_fansites" , array("fansites" => $fansites , "changer" => false))?>
	<div class="controll"><input type="submit" value="ファンサイト一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
<!--  -->
<!-- Packages -->
<?php echo $this->Form->create("Package" , array("url" => array("controller" => "packages" , "action" => "lump")))?>
	<h2>パッケージ10件 <?php echo $this->Html->link("一覧" , array("controller" => "packages" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_packages" , array("packages" => $packages , "changer" => false))?>
	<div class="controll"><input type="submit" value="パッケージ一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
<!--  -->
<!-- Pcs -->
<?php echo $this->Form->create("Pc" , array("url" => array("controller" => "pcs" , "action" => "lump")))?>
	<h2>PC10件 <?php echo $this->Html->link("一覧" , array("controller" => "pcs" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_pcs" , array("pcs" => $pcs , "changer" => false))?>
	<div class="controll"><input type="submit" value="PC一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>
<!--  -->
<!-- Links -->
<?php echo $this->Form->create("Link" , array("url" => array("controller" => "links" , "action" => "lump")))?>
	<h2>相互リンク10件 <?php echo $this->Html->link("一覧" , array("controller" => "links" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_links" , array("links" => $links))?>
	<div class="controll"><input type="submit" value="相互リンク一括修正" class="btn" /></div>
<?php echo $this->Form->end()?>