<?php if(!empty($recommends)):?>
<!-- recommend -->
<section class="title-recommend">
	<h2>このゲームのプレイヤーにおすすめ</h2>
	<ul class="borderedLinks imageLinks imageLinks-s">
	<?php foreach($recommends as $recommend):?>
		<li>
			<a href="<?php echo $this->Common->titleLinkUrl($recommend["Title"]["url_str"])?>">
				<div class="images">
					<div class="thumb">
						<?php echo $this->Common->titleThumb($recommend["Title"])?>
					</div>
				</div>
				<div class="data">
					<div class="title">
						<?php echo $this->Common->titleSeparatedDiv($recommend["Title"]["title_official"], $recommend["Title"]["title_read"])?>
					</div>
					<?php echo $this->Common->starZmdi($recommend["Titlesummary"]["vote_avg_all"]);?>
				</div>
			</a>
		</li>
	<?php endforeach;?>
	</ul>
</section>
<?php endif;?>