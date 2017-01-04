<?php
class PlatformsTitle extends AppModel
{
	var $name = 'PlatformsTitle';
//	var $primaryKey = 'title_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Platform' => array(
			'className' => 'Platform',
			'foreignKey' => 'platform_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>