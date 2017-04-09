<?php
class JumpController extends AppController
{

	var $name		= 'Jump';
	var $uses		= array("Portal", "Pc", "Package",
							"AdCenterBottom", "AdLeftBottom", "AdLeftTop", "AdRightBottom", "AdRightTop");

/** Modelds
------------------------------ **/
	function title($platform = null, $path = null)
	{
		$this->_emptyToHome($platform);
		$this->_emptyToHome($path);

		$this->Title->virtualFields = array(
			"pc_default_url" => "Title.official_url",
			"sp_default_url" => "Title.official_url_sp",
			"ios_default_url" => "Title.appdl_app_store",
			"android_default_url" => "Title.appdl_google_play",
		);
		$title = $this->Title->find("first", array(
			"conditions" => array("Title.url_str" => $path),
			"contain" => array("Titlead"),
		));
		// debug($title);
		// exit;

		// set times & flags
		$times = array(
			"now" => strtotime("now"),
			"start" => strtotime(!empty($title["Titlead"]["{$platform}_start"])	? ($title["Titlead"]["{$platform}_start"]) : false),
			"end" => strtotime(!empty($title["Titlead"]["{$platform}_end"])		? ($title["Titlead"]["{$platform}_end"]) : false),
		);
		$flags = array(
			"start" => (!empty($times["start"]) && $times["start"] < $times["now"]),
			"end" => (!empty($times["end"]) && $times["end"] > $times["now"]),
			"empties" => (empty($times["start"]) && empty($times["end"])),
		);
		// debug($times);
		// debug($flags);
		
		//set url
		$url = $title["Title"]["{$platform}_default_url"];
		if(!empty($title["Titlead"]["{$platform}_part_url"]))
		{
			// between
			if($flags["start"] && $flags["end"])			$url = $title["Titlead"]["{$platform}_part_url"];
			// start
			elseif($flags["start"] && empty($times["end"]))	$url = $title["Titlead"]["{$platform}_part_url"];
			// end
			elseif($flags["end"] && empty($times["start"]))	$url = $title["Titlead"]["{$platform}_part_url"];
			// both empty
			elseif($flags["empties"])						$url = $title["Titlead"]["{$platform}_part_url"];
		}
		$this->set("url", $url);
		// debug($url);
		// exit;
		//set options
		$this->set("options", array(
			"title" => $title["Title"]["title_official"] . " リンククリック"
		));

		$this->_renderMetaRedirect();
	}

	function portal($id = null)
	{
		$this->_emptyToHome($id);
	}

	function pc($id = null)
	{
		$this->_metaAdRedirect("Pc", $id);
	}

	function package($id = null)
	{
		$this->_metaAdRedirect("Package", $id);
	}

/** Ad models
------------------------------ **/
	//AdCenterBottom
	function adcb($id = null)
	{
		$this->_metaAdRedirect("AdCenterBottom", $id);
	}
	//AdLeftBottom
	function adlb($id = null)
	{
		$this->_metaAdRedirect("AdLeftBottom", $id);
	}
	//AdLeftTop
	function adlt($id = null)
	{
		$this->_metaAdRedirect("AdLeftTop", $id);
	}
	//AdRightBottom
	function adrb($id = null)
	{
		$this->_metaAdRedirect("AdRightBottom", $id);
	}
	//AdRightTop
	function adrt($id = null)
	{
		$this->_metaAdRedirect("AdRightTop", $id);
	}

/** Other
------------------------------ **/
	function rakutensearch($word = null)
	{
		$this->_emptyToHome($word);
		return $this->redirect("http://hb.afl.rakuten.co.jp/hgc/0f2e5b02.017da200.0f2e5b03.c8eee4aa/?pc=http%3a%2f%2fsearch.rakuten.co.jp%2fsearch%2fmall%2f" . urlencode($word) . "%2f-%2f%3fscid%3daf_ich_link_urltxt&m=http%3a%2f%2fm.rakuten.co.jp%2f");
	}


/** Private methods
------------------------------ **/
/**
 * 単一モデル仕様のシンプルリダイレクト
 */
	private function _simpleRedirect($model, $id)
	{
		$this->_emptyToHome($id);
		$this->$model->recursive = -1;
		$jump = $this->$model->findById($id);
//		pr($jump);
//		exit;
//		@include '/home/diechang/www/onlinegame.dz-life.net/ra/phptrack.php';
//		@_raTrack('Jump - ' . $model . ' - ' . $id);
		return $this->redirect($jump[$model]["ad_part_url"]);
	}


/**
 * 単一広告モデル仕様のメタタグリダイレクト
 */
	private function _metaAdRedirect($model, $id)
	{
		$this->_emptyToHome($id);
		$this->$model->recursive = -1;
		$jump = $this->$model->findById($id);
		$this->set("url", $jump[$model]["ad_part_url"]);
		$this->set("options", array(
			"title" => (!empty($jump[$model]["ad_part_text"]))
						? ($jump[$model]["ad_part_text"] . " リンククリック")
						: ($jump[$model]["note"] . " バナークリック")
		));

		$this->_renderMetaRedirect();
	}


/**
 * メタタグリダイレクト
 */
	private function _renderMetaRedirect()
	{
		//Use layout
		$this->layout = false;
		$this->render("/Layouts/metaredirect");
	}
}
?>