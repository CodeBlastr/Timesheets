<?php
class TimesheetTime extends TimesheetsAppModel {

	var $name = 'TimesheetTime';
	var $validate = array(); 
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Project' => array(
			'className' => 'Projects.Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProjectIssue' => array(
			'className' => 'Projects.ProjectIssue',
			'foreignKey' => 'project_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Task' => array(
			'className' => 'Tasks.Task',
			'foreignKey' => 'task_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Timesheet' => array(
			'className' => 'Timesheets.Timesheet',
			'joinTable' => 'timesheets_timesheet_times',
			'foreignKey' => 'timesheet_time_id',
			'associationForeignKey' => 'timesheet_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);
	
	
	function add($data) {
		if ($this->save($data)) :
			if (!empty($data['Task']['is_completed'])) :
				if ($this->Task->complete($data)) :
					return true;
				else :
					# return true because we aren't rolling back if this didn't work
					return true;
				endif;
			endif;
			# if task data is not there, and its saved, return true
			return true;
		else : 
			return false;
		endif;
	}

}
?>