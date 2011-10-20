<?php
class Timesheet extends TimesheetsAppModel {

	var $name = 'Timesheet';
	var $validate = array(
		'name' => array('notempty')
	); 
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Creator' => array(
			'className' => 'Users.User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifier' => array(
			'className' => 'Users.User',
			'foreignKey' => 'modifier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'TimesheetTime' => array(
			'className' => 'Timesheets.TimesheetTime',
			'joinTable' => 'timesheets_timesheet_times',
			'foreignKey' => 'timesheet_id',
			'associationForeignKey' => 'timesheet_time_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>