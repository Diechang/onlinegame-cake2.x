<?php
/**
 * タイトルページ用ヘルパー
 */
class TitlePageHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html', 'Common');

/**
 * メタキーワード
 *
 * @param	string	$action
 * @param	string	$official
 * @param	string	$read
 * @param	string	$abbr
 * @param	string	$sub
 * @return	string
 * @access	public
 */
	function metaKeywords($action, $official, $read = null, $abbr = null, $sub = null)
	{
		$words	= array($official, $read, $abbr, $sub);
		$mores	= array(
			"index"		=> array("動作環境", "スペック", "動画", "ムービー", "パッケージ"),
			"rating"	=> array("評価"),
			"review"	=> array("レビュー"),
			"allvotes"	=> array("レビュー", "評価"),
			"single"	=> array("レビュー", "評価"),
			"events"	=> array("イベント", "キャンペーン"),
			"event"		=> array("イベント", "キャンペーン"),
			"pc"		=> array("推奨PC", "パソコン", "モデル"),
			"link"		=> array("攻略", "WIKI", "ファンサイト"),
			"search"	=> array("動画", "ムービー", "ブログ"),
		);
		$ret = array_merge(array_filter($words), $mores[$action]);
		return $this->output(implode(",", $ret));
	}

/**
 * Youtube ビデオ埋め込み
 *
 * @param	string	$id Youtube video ID
 * @return	html
 * @access	public
 */
	function videoEmbed($id)
	{//$id = youtube v param
		if(!empty($id))
		{
			return '<div class="video"><iframe width="640" height="360" src="https://www.youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe></div>';
		}
		else
		{
			return '<p class="noData">関連動画が登録されていません。</p>';
		}
	}

	
/**
 * スペックデータ列：左右同値なら一行化
 *
 * @param	string	$header
 * @param	string	$low
 * @param	string	$high
 * @return	html
 * @access	public
 */
	function specRows($header, $low, $high)
	{
		if(!empty($low) or !empty($high))
		{
			$ret = '<tr>';
			$ret .= '<th nowrap="nowrap">' . $header . '</th>';
			if($low == $high)
			{
				$ret .= '<td colspan="2" class="eq">' . nl2br($low) . '</td>';
			}
			else
			{
				$ret .= '<td>';
				$ret .= (!empty($low)) ? nl2br($low) : "-";
				$ret .= '</td>';
				$ret .= '<td>';
				$ret .= (!empty($high)) ? nl2br($high) : "-";
				$ret .= '</td>';
			}
			$ret .= '</tr>';
			//
			return $ret . "\n";
		}
	}


/** Rates
------------------------------ **/
/**
 * good class or bad class
 * 
 * @param	number	$point
 * @param	array	$labels strings
 * @param	number	$limit
 * @return	string
 * @access	public
 */
	function goodOrBad($point, $labels = array("good", "bad"), $limit = 3)
	{
		return ($point < $limit) ? $labels[1] : $labels[0];
	}
}
?>