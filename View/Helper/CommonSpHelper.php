<?php
/**
 * SP共用ヘルパー
 */
App::uses("CommonHelper", "View/Helper");
class CommonSpHelper extends CommonHelper
{


	/** Title
	------------------------------ **/
/**
 * サムネイル
 *
 * @param	string	$title
 * @param	number	$width
 * @return	html
 * @access	public
 */
	function titleThumb($title_model, $width = 80)
	{
		return $this->Html->image($this->thumbName($title_model["thumb_name"]), array(
			"alt"	=> $this->titleWithCase($title_model["title_official"], $title_model["title_read"]),
			"width"	=> $width
		));
	}



	/** Lists
	------------------------------ **/
	/**
	 * プラットフォームリスト
	 *
	 * @param	array	$platforms
	 * @param	string	$tag
	 * @return	html
	 * @access	public
	 */
	function platformsList($platforms, $tag = null, $link = false)
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
					if($link)	$text .= $tagStart . $this->Html->link($platform['str'], array('controller' => 'platforms', 'path' => $platform['path'], 'ext' => 'html'), array("class" => $platform["path"])) . $tagEnd . "\n";
					else		$text .= $tagStart . $platform['str'] . $tagEnd . "\n";
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
 * カテゴリリスト
 *
 * @param	array	$categories
 * @param	string	$tag
 * @return	html
 * @access	public
 */
	function categoriesList($categories, $tag = null, $link = false)
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
					if($link)	$text .= $tagStart . $this->Html->link($category['str'], array('controller' => 'categories', 'path' => $category['path'], 'ext' => 'html')) . $tagEnd . "\n";
					else		$text .= $tagStart . $category['str'] . $tagEnd . "\n";
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
 * スタイルリスト
 *
 * @param	array	$styles
 * @param	string	$tag
 * @return	html
 * @access	public
 */
	function stylesList($styles, $tag = null, $link = false)
	{
		$tagStart	= (!empty($tag)) ? "<" . $tag . ">" : "";
		$tagEnd		= (!empty($tag)) ? "</" . $tag . ">" : "";

		if(!empty($styles))
		{
			$text = "";
			foreach($styles as $style)
			{
				if($link)	$text .= $tagStart . $this->Html->link($style['str'], array('controller' => 'styles', 'path' => $style['path'], 'ext' => 'html')) . $tagEnd . "\n";
				else		$text .= $tagStart . $style['str'] . $tagEnd . "\n";
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
 * スター表示（i,zmdi)
 *
 * @param	number	$rate
 * @param	number	$width
 * @return	html
 * @access	public
 */
	function starZmdi($rate = 0, $width = 75)
	{
		$round	= round($rate * 2) / 2;
		$ret	= '<div class="stars stars-' . $width . '">';
		for($i = 1; $i <= 5; $i++)
		{
			if($round >= $i)			$ret .= '<i class="zmdi zmdi-star"></i>';
			elseif($round <= $i - 1)	$ret .= '<i class="zmdi zmdi-star-outline"></i>';
			else						$ret .= '<i class="zmdi zmdi-star-half"></i>';
		}
		$ret .= '</div>';
		return $this->output($ret);
	}
}
?>