<?php
class JumpController extends AppController
{

	var $name		= 'Jump';
	var $uses		= array("Title", "Portal", "Pc", "Package",
							"AdCenterBottom", "AdLeftBottom", "AdLeftTop", "AdRightBottom", "AdRightTop");

/** Modelds
------------------------------ **/
	function title($id = null)
	{
		$this->_emptyToHome($id);
	}

	function portal($id = null)
	{
		$this->_emptyToHome($id);
	}

	function pc($id = null)
	{
		$this->_simpleRedirect("Pc", $id);
	}

	function package($id = null)
	{
		$this->_simpleRedirect("Package", $id);
	}

/** Ad modelds
------------------------------ **/
	//AdCenterBottom
	function adcb($id = null)
	{
		$this->_metaRedirect("AdCenterBottom", $id);
	}
	//AdLeftBottom
	function adlb($id = null)
	{
		$this->_metaRedirect("AdLeftBottom", $id);
	}
	//AdLeftTop
	function adlt($id = null)
	{
		$this->_metaRedirect("AdLeftTop", $id);
	}
	//AdRightBottom
	function adrb($id = null)
	{
		$this->_metaRedirect("AdRightBottom", $id);
	}
	//AdRightTop
	function adrt($id = null)
	{
		$this->_metaRedirect("AdRightTop", $id);
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
 * 単一モデル仕様のメタタグリダイレクト
 */
	private function _metaRedirect($model, $id)
	{
		$this->_emptyToHome($id);
		$this->$model->recursive = -1;
		$this->set("url", $this->$model->findById($id)[$model]["ad_part_url"]);
		//Use layout
		$this->layout = false;

		$this->render("/Layouts/metaredirect");
	}
}
?>