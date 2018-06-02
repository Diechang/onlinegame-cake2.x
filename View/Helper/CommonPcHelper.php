<?php
/**
 * PC共用ヘルパー
 */
App::uses("CommonHelper", "View/Helper");
class CommonPcHelper extends CommonHelper
{
	/** Util
	------------------------------ **/

/**
 * パンクズ出力
 *
 * @param	mixed	$data String or Array(String or Array(["str"],["url"]))
 * @return	html
 * @access	public
 */
	function pankuzLinks($data)
	{
		if(!empty($data))
		{
			if(is_array($data))
			{//配列
				$ret = "";
				foreach($data as $val)
				{
					$ret .= "<li>";
					if(is_array($val))
					{//文字列["str"]とURL配列["url"]の配列
						$ret .= '<i class="zmdi zmdi-chevron-right"></i> ' . $this->Html->link($val["str"], $val["url"]);
					}
					else
					{//文字列
						$ret .= '<i class="zmdi zmdi-chevron-right"></i> ' . $val;
					}
					$ret .= "</li>";
				}
				return $ret;
			}
			elseif(is_string($data))
			{//文字列
				return '<li><i class="zmdi zmdi-chevron-right"></i> ' . $data . '</li>';
			}
		}
		else
		{
			return "";
		}
	}


	/** Links
	------------------------------ **/

/**
 * タイトルページリンク
 *
 * @param	string	$str
 * @param	string	$path
 * @param	string	$action
 * @param	string	$hash
 * @param	bool	$escape
 * @return	html
 * @access	public
 */
	function titleLinkText($str = null, $path = null, $action = "index", $hash = null, $escape = false)
	{
		return $this->Html->link($str, $this->titleLinkUrl($path, $action, $hash), array("escape" => $escape));
	}

/**
 * サムネイルリンク
 *
 * @param	string	$thumb_name
 * @param	string	$alt
 * @param	string	$path
 * @param	number	$width
 * @param	string	$action
 * @return	html
 * @access	public
 */
	function titleLinkThumb($thumb_name, $alt = null, $path = null, $width = 160, $action = "index")
	{
		return $this->Html->image($thumb_name, array(
			"alt"	=> $alt,
			"width"	=> $width,
			"url"	=> $this->titleLinkUrl($path, $action)
		));
	}

	/**
	 * 公式リンク
	 *
	 * @param	string	$str
	 * @param	bool	$ad_use
	 * @param	string	$ad_text
	 * @param	string	$official_url
	 * @param	number	$service_id
	 * @param	bool	$titleName
	 * @return	html
	 * @access	public
	 */
		function officialLinkText($str, $ad_use, $ad_text, $official_url, $service_id = null, $titleName = false)
		{
			if($service_id != 1 or $service_id == null)
			{
				return (!empty($ad_use) && !empty($ad_text)) ? $ad_text : $this->Html->link($str, $official_url, array("target" => "_blank", "escape" => false));
			}
			else
			{//Titles only
				if($titleName)
				{
					$ret = $str;
				}
				else
				{
					$ret = "サービス終了・休止中";
				}
				return '<span class="ended">' . $ret . '</span>';
			}
		}
	
	/**
	 * プラットフォームリンク/テキスト
	 *
	 * @param	array	$platforms
	 * @param	string	$tag
	 * @return	html
	 * @access	public
	 */
		function platformsLink($platforms, $tag = null)
		{
			$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
			$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";
	
			if(!empty($platforms))
			{
				if(is_array($platforms))
				{
					$text = "";
					foreach($platforms as $platform)
					{
						$text .= $tagStart . $this->Html->link($platform['str'], array('controller' => 'platforms', 'path' => $platform['path'], 'ext' => 'html'), array("class" => $platform["path"])) . $tagEnd . "\n";
					}
				}
				else
				{
					$text = $tagStart . $platforms . $tagEnd;
				}
			}
			else
			{
				$text = "データ未登録";
			}
			return $text;
		}
	
	/**
	 * カテゴリリンク/テキスト
	 *
	 * @param	array	$categories
	 * @param	string	$tag
	 * @return	html
	 * @access	public
	 */
		function categoriesLink($categories, $tag = null)
		{
			$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
			$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";
	
			if(!empty($categories))
			{
				if(is_array($categories))
				{
					$text = "";
					foreach($categories as $category)
					{
						$text .= $tagStart . $this->Html->link($category['str'], array('controller' => 'categories', 'path' => $category['path'], 'ext' => 'html')) . $tagEnd . "\n";
					}
				}
				else
				{
					$text = $tagStart . $categories . $tagEnd;
				}
			}
			else
			{
				$text = "データ未登録";
			}
			return $text;
		}
	
	/**
	 * スタイルリンク/テキスト
	 *
	 * @param	array	$styles
	 * @param	string	$tag
	 * @return	html
	 * @access	public
	 */
		function stylesLink($styles, $tag = null)
		{
			$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
			$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";
	
			if(!empty($styles))
			{
				$text = "";
				foreach($styles as $style)
				{
					$text .= $tagStart . $this->Html->link($style['str'], array('controller' => 'styles', 'path' => $style['path'], 'ext' => 'html')) . $tagEnd . "\n";
				}
			}
			else
			{
				$text = "データ未登録";
			}
			return $text;
		}


	/** Votes
	------------------------------ **/

/**
 * スター表示
 *
 * @param	number	$rate
 * @param	string	$color	"w" or "b"
 * @param	number	$width
 * @return	html
 * @access	public
 */
	function starBlock($rate = 0, $color = "w", $width = 150)
	{
		$ret = '<div class="stars stars-' . $color . $width . ' stars-rate' . round($rate * 2) * 10 . '"></div>';
		return $this->output($ret);
	}
}
?>