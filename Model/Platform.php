<?php
class Platform extends AppModel
{
	var $name = 'Platform';
	var $displayField = 'str';
	var $validate = array(
		'str' => 'notBlank',
		'path' => array(
			"alphaNumeric" => array(
				"rule" => "alphaNumeric",
			),
			"isUnique" => array(
				"rule" => "isUnique",
			),
		),
		'sort' => 'numeric',
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Title' => array(
			'className' => 'Title',
			'joinTable' => 'platforms_titles',
			'foreignKey' => 'platform_id',
			'associationForeignKey' => 'title_id',
			'unique' => true,
			'conditions' => array('Title.public' => 1),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	//Callbacks
	function afterSave($created, $options = array())
	{
		$this->clearElementCache("left_" . strtolower($this->name));
		$this->clearElementCache("search_title_form");
	}

	function afterDelete()
	{
		$this->clearElementCache("left_" . strtolower($this->name));
		$this->clearElementCache("search_title_form");
	}
}
?>
