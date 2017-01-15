<?php
class Titlead extends AppModel
{
	var $name = 'Titlead';

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
}
?>