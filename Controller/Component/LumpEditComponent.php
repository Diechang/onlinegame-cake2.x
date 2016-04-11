<?php
/*
 * 一括編集コンポーネント
 */
class LumpEditComponent extends Component
{
/**
 * 既存データと比較して、変更あるものだけ返す
 *
 * @param	array	$data
 * @param	Model	$model
 * @param	string	$order
 * @return	array
 * @access	public
 */
	function changeCheck(&$data, &$model, $order = "DESC")
	{
		$modelName = $model->name;

		$ids	= Set::extract("/id", $data);
		$fields	= array();
		foreach($data[0] as $key => $val)
		{
			$fields[$key] = $key;
		}
//		pr($fields);
//		pr($ids);
		$befores = $model->find("all", array(
			"recursive" => -1,
			"conditions" => array("id" => $ids),
			"fields" => $fields,
			"order" => "id " . $order,
		));
		// pr($befores);
		// pr($data);
		$changed = array();
		$index = 0;
		foreach($data as $key => $val)
		{
			// pr($val);
			// pr($befores[$key][$modelName]);
			if($val != $befores[$key][$modelName])
			{
				$changed[$index] = $val;
				$index++;
				// echo "changed: " . $index;
			}
		}
		// pr($data);
		// pr($changed);
		// exit;
		$data = $changed;
		return (!empty($data)) ? true : false;
	}
}