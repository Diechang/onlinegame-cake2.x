<!-- Ads234 -->
<section class="banners">
	<ul>
<?php foreach($adRightBottoms as $ad):?>
		<!--<?php echo $ad["AdRightBottom"]["note"]?>-->
		<li><?php echo $this->Common->ad_link_image($ad["AdRightBottom"], "adrb")?></li>
<?php endforeach;?>
	</ul>
</section>
