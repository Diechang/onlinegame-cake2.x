<?php
/*
 * 検索ページ用ヘルパー
 */
class SearchPageHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html', 'Form');

	var $others = array(
					"free"		=> "基本プレイは無料がいい",
					"vote"		=> "みんなの評価やレビューが見たい",
					"fansite"	=> "攻略サイトやファンサイトも見てみたい",
				);
	var $orders = array(
					"rating"	=> "評価の高い順",
					"start"		=> "サービス開始順<span>（正式サービス前のタイトルは後ろに表示されます）</span>",
					"name"		=> "タイトル名順<span>（A～Z、あ～お）</span>",
				);
	var $orders_stripped = array(
					"rating"	=> "評価の高い順",
					"start"		=> "サービス開始順（正式サービス前のタイトルは後ろに表示されます）",
					"name"		=> "タイトル名順（A～Z、あ～お）",
				);

	var $urlParamStrings = null;

	/**
	 * チェックボックス
	 *
	 * @param	array	$item
	 * @param	string	$model
	 * @return	html
	 * @access	public
	 */
	function checkList($item, $model)
	{
		$key		= strtolower($model);

		return $this->output($this->Form->checkbox($key . "[]", array(
			"value" => $item[$model]["id"],
			"checked" => ($this->request->query($key) && in_array($item[$model]["id"], $this->request->query($key))),
			"id" => $key . "_" . $item[$model]["id"],
			"hiddenField" => false)) . " " . $this->Form->label($key . "_" . $item[$model]["id"], $item[$model]["str"]));
	}

	/**
	 * ついでに（その他）チェックボックス
	 *
	 * @return html
	 * @access public
	 */
	function otherCheckList()
	{
		$src = "";
		foreach($this->others as $key => $val)
		{
			$src .= "<li>" . $this->Form->checkbox($key, array(
				"checked" => $this->request->query($key),
				"hiddenField" => false)) . " " . $this->Form->label($key, $val) . "</li>" . PHP_EOL;
		}
		return $this->output($src);
	}

	/**
	 * 並び順ラジオ
	 *
	 * @return html
	 * @access public
	 */
	function orderRadioList()
	{
		$src	= "";
		foreach($this->orders as $key => $val)
		{
			$src .= "<li>" . $this->Form->radio("order", array($key => " " . $val), array(
				"checked" => ($this->request->query("order") == $key),
				"hiddenField" => false)) . "</li>" . PHP_EOL;
		}
		return $this->output($src);
	}

	/**
	 * 並び順セレクト
	 *
	 * @return html
	 * @access public
	 */
	function orderSelect()
	{
		$src = $this->Form->select("order", $this->orders_stripped, array(
			"value" => $this->request->query("order"),
			"empty" => false,
			"class" => "input-select"));
		return $this->output($src);
	}
}
?>