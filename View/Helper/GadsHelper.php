<?php
/**
 * Google Adsense用ヘルパー
 */
class GadsHelper extends AppHelper
{
/**
 * Both responsive
 *
 * @param	bool	$withdiv
 * @return	html
 * @access	public
 */
	function adsResponsive($withdiv = true)
	{
		$src = "";
		$src .= ($withdiv) ?  "<div class=\"gAds\">\n" : "";
		
		$src .= $this->bothResponsive();
		
		$src .= ($withdiv) ? "</div>\n" : "";

		return $this->output($src);
	}
	
/**
 * Both 468x60
 *
 * @param	bool	$withdiv
 * @return	html
 * @access	public
 */
	function ads468($withdiv = true)
	{
		$src = "";
		$src .= ($withdiv) ?  "<div class=\"gAds\">\n" : "";
		
		$src .= $this->both468();
		
		$src .= ($withdiv) ? "</div>\n" : "";

		return $this->output($src);
	}

/**
 * Text 336x280
 *
 * @return	html
 * @access	public
 */
	function text336()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame text336 */
google_ad_slot = "2678606057";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Image 300x250
 *
 * @return	html
 * @access	public
 */
	function image300()
	{
		$src = <<< HIRE
<!-- Google Adsense 300 -->
<script type="text/javascript">
google_ad_client = "ca-pub-5378944923532596";
google_ad_slot = "6748251167";
google_ad_width = 300;
google_ad_height = 250;
</script>
<!-- [DZ]onlinegame image300 -->
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Both 468x60
 *
 * @return	html
 * @access	public
 */
	function both468()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame both468 */
google_ad_slot = "9479232132";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Both responsive
 *
 * @return	html
 * @access	public
 */
	function bothResponsive()
	{
		$src = <<< HIRE
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- [DZ]onlinegame bothResponsive -->
<ins class="adsbygoogle"
	style="display:block"
	data-ad-client="ca-pub-5378944923532596"
	data-ad-slot="6068122704"
	data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
HIRE;
			return $src;
	}

/**
 * Text responsive
 *
 * @return	html
 * @access	public
 */
	function textResponsive()
	{
		$src = <<< HIRE
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- [DZ]onlinegame textResponsive -->
<ins class="adsbygoogle"
		style="display:block"
		data-ad-client="ca-pub-5378944923532596"
		data-ad-slot="5183428205"
		data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
HIRE;
			return $src;
	}
}
?>