<!-- Ads234 -->
<section class="banners">
	<ul>
<?php foreach($adRightBottoms as $ad):?>
		<!--<?php echo $ad["AdRightBottom"]["note"]?>-->
		<li><?php echo $this->Common->adLinkImage($ad["AdRightBottom"], "adrb")?></li>
<?php endforeach;?>
	</ul>
</section>
