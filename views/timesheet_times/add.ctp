<div class="timesheets form">

<?php echo $this->Form->create('TimesheetTime');?>
	<fieldset>
 		<legend><?php __('Add Time Record');?></legend>
	<?php
		echo $this->Form->input('hours', array('label' => 'How much time?')); 
		echo $this->Form->input('comments', array('label' => 'What was accomplished?')); 
		echo $this->Form->input('started_on', array('label' => 'When did this time start?')); 
		echo $this->Form->input('project_id', array('label' => 'Which project is this time for?', 'value' => $projectId)); 
		echo $this->Form->input('task_id', array('label' => 'Which task is this time for?')); 
		echo $this->Form->input('creator_id', array('label' => 'Who is logging this time?')); 
	?>
    </fieldset>
        
<?php echo $this->Form->end('Save');?>

</div>


<?php 
// set the contextual menu items
echo $this->Element('context_menu', array('menus' => array(
	array(
		'heading' => 'Timesheets',
		'items' => array(
			$this->Html->link(__('Add Time', true), array('controller' => 'timesheet_times', 'action' => 'edit')),
			)
		),
	)));
?>