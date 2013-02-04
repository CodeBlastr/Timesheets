<?php
class TimesheetsTimesheetTime extends TimesheetsAppModel {

	public $name = 'TimesheetsTimesheetTime';
	public $validate = array(
		'timesheet_id' => array('numeric'),
		'timesheet_time_id' => array('numeric')
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'Timesheet' => array(
			'className' => 'Timesheets.Timesheet',
			'foreignKey' => 'timesheet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TimesheetTime' => array(
			'className' => 'Timesheets.TimesheetTime',
			'foreignKey' => 'timesheet_time_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

} 