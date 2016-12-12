<!-- about -->
<div class="archive-about pageInfo">
	<h1 class="pageTitle">
		<span class="main"><?php echo $pageData["str"]?></span>
<?php if(!empty($pageData["str_sub"])):?>
		<span class="sub"><?php echo $pageData["str_sub"]?></span>
<?php endif;?>
	</h1>
	<div class="description">
		<?php echo $pageData["description"]?>
	</div>
	<?php echo $this->Gads->ads468()?>
</div>
