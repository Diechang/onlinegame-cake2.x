<?php
/**
 * Metaタグ用ヘルパー
 */
class MetaHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html');

/**
 * メタタグマップ
 *
 * @var		array
 * @access	public
 */
	var $metaTagMaps = array(
		"noindex" => array("name" => "robots", "contents" => "noindex"),
	);

/**
 * Facebook vars
 * @var string
 */
	var $fbAppId	= "293306697370465";
	var $fbAdmins	= "100001729714962";
	var $fbPageId	= "349894881721182";

	var $ogpOptions	= array();

/**
 * metaタグ出力
 *
 * @param	array	$data Array(Array(cakephp meta options))
 * @return	html
 * @access	public
 */
	function metaTags(&$data)
	{
		$ret = "";
		if(!empty($data))
		{
			foreach($data as $val)
			{
				if(is_string($val))
				{
					$ret .= $this->Html->meta($this->metaTagMaps[$val]) . "\n";
				}
				elseif(is_array($val))
				{
					$ret .= $this->Html->meta($val) . "\n";
				}
			}
		}
		return $this->output($ret);
	}

/**
 * next prev出力
 *
 * @param	array	$url
 * @param	array	$paginator
 * @return	html
 * @access	public
 */
	function pagePrevNext($url = array(), $paginator, $full = false)
	{
		$links = array();
		if($paginator->hasPrev())
		{
			$links[] = $this->Html->meta(array(
				'rel' => 'prev',
				'link' => $this->Html->url(array_merge($url, array("?" => array('page' => $paginator->current() - 1))), $full)
			));
		}
		if($paginator->hasNext())
		{
			$links[] = $this->Html->meta(array(
				'rel' => 'next',
				'link' => $this->Html->url(array_merge($url, array("?" => array('page' => $paginator->current() + 1))), $full)
			));
		}
		return implode($links);
	}

/**
 * OGP出力
 *
 * @access public
 * @return html
 */
	function ogpTags()
	{
		//Default params
		$params = Set::merge(array(
			"type"			=> "website",
			"title"			=> "オンラインゲームライフ",
			"url"			=> $this->Html->url("/", true),
			"image"			=> $this->Html->url("/img/design/logo.png", true),
			"description"	=> "無料オンラインゲーム情報サイト。ユーザーによるレビュー・評価の投稿による人気オンラインゲームランキングや攻略サイトリンク集、ムービー検索も可能。",
			"site_name"		=> "オンラインゲームライフ",
		), $this->ogpOptions);

		$ret = array(
			"0" => '<meta property="fb:app_id" content="' . $this->fbAppId . '">',
			"1" => '<meta property="fb:admins" content="' . $this->fbAdmins . '">',
//			"2" => '<meta property="fb:page_id" content="' . $this->fbPageId . '">',
		);

		foreach($params as $key => $v){
			$ret[] = '<meta property="og:' . $key . '" content="' . $v . '">';
		}

		$ret = implode("\n", $ret);

		return $ret;
	}
}
?>