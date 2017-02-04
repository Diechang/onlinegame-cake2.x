<?php
class Titlead extends AppModel
{
	var $name = 'Titlead';

	var $platforms = array("pc", "sp", "ios", "android");

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Callbacks
	function afterFind($results, $primary = false)
	{
		// debug($results);

		foreach ($results as $key => $val)
		{
			foreach($this->platforms as $platform)
			{
				$results[$key]["Titlead"]["{$platform}_activation"] = (!empty($results[$key]["Titlead"]["{$platform}_text_src"]) or !empty($results[$key]["Titlead"]["{$platform}_image_src"]))
					? $this->_checkTerm($results[$key]["Titlead"]["{$platform}_start"], $results[$key]["Titlead"]["{$platform}_end"])
					: false;
			}
		}

		return $results;
	}

	function beforeValidate($options = array())
	{
		if(!empty($this->data["Titlead"]))
		{
			$platforms = array("pc", "sp", "ios", "android");
			$clumns = array(
				"_text_src",
				"_image_src",
				"_part_url",
				"_part_text",
				"_part_img_src",
				"_part_track_src",
				"_start",
				"_end",
			);
			//
			foreach($platforms as $platform)
			{
				foreach($clumns as $clumn)
				{
					if(isset($this->data["Titlead"][$platform . $clumn]))
					{
						$this->data["Titlead"][$platform . $clumn]		= $this->trim($this->data["Titlead"][$platform . $clumn]);
						$this->data["Titlead"][$platform . $clumn]		= $this->emptyToNull($this->data["Titlead"][$platform . $clumn]);
					}
				}
			}
		}
		return true;
	}

	function _checkTerm($start = null, $end = null)
	{
		// set times & flags
		$times = array(
			"now" => strtotime("now"),
			"start" => !empty($start)	? strtotime($start) : false,
			"end" => !empty($end)		? strtotime($end) : false,
		);
		$flags = array(
			"start" => (!empty($times["start"]) && $times["start"] < $times["now"]),
			"end" => (!empty($times["end"]) && $times["end"] > $times["now"]),
			"empties" => (empty($times["start"]) && empty($times["end"])),
		);
		// debug($times);
		// debug($flags);
		
		//return
		$return = false;
		// between
		if($flags["start"] && $flags["end"])			$return = true;
		// start
		elseif($flags["start"] && empty($times["end"]))	$return = true;
		// end
		elseif($flags["end"] && empty($times["start"]))	$return = true;
		// both empty
		elseif($flags["empties"])						$return = true;

		return $return;
	}
}
?>