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
		return $this->output($this->Form->label(strtolower($model) . "_" . $item[$model]["id"],
												$this->Form->checkbox(strtolower($model) . "[]", array(
														"value" => $item[$model]["id"],
														"checked" => (!empty($this->request->query[strtolower($model)]) && in_array($item[$model]["id"], $this->request->query[strtolower($model)])),
														"id" => strtolower($model) . "_" . $item[$model]["id"],
														"hiddenField" => false)) . " " . $item[$model]["str"]));
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
			$src .= "<li>" . $this->Form->label($key, $this->Form->checkbox($key, array(
															"id" => $key,
															"checked" => !empty($this->request->query[$key]),
															"hiddenField" => false)) . " " . $val) . "</li>\n";
		}
		return $this->output($src);
	}

	/**
	 * 並び順チェックボックス
	 *
	 * @return html
	 * @access public
	 */
	function orderCheckList()
	{
		$src	= "";
		$count	= 0;
		foreach($this->orders as $key => $val)
		{
			$src .= "<li>" . $this->Form->label("order" . ucwords($key), $this->Form->input("order", array(
															"type" => "radio",
															"options" => array($key => (" " . $val)),
															"default" => (isset($this->request->query["order"]) ? $this->request->query["order"] : "rating"),
															"hiddenField" => false))) . "</li>\n";
			$count++;
		}
		return $this->output($src);
	}
}
?>