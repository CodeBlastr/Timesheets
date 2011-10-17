<div class="timesheets form">

<?php echo $form->create('TimesheetTime');?>
	<fieldset>
 		<legend><?php __('Add Time Record');?></legend>
	<?php
		echo $form->input('hours', array('label' => 'How much time?')); 
		echo $form->input('comments', array('label' => 'What was accomplished?')); 
		echo $form->input('started_on', array('label' => 'When did this time start?')); 
		echo $form->input('project_id', array('label' => 'Which project is this time for?', 'value' => $projectId)); 
		echo $form->input('task_id', array('label' => 'Which task is this time for?')); 
		echo $form->input('creator_id', array('label' => 'Who is logging this time?')); 
	?>
    </fieldset>
        
<?php echo $form->end('Save');?>

</div>


<?php 
// set the contextual menu items
$menu->setValue(array(array(
	'heading' => 'Timesheets',
	'items' => array(
		$this->Html->link(__('Add Time', true), array('controller' => 'timesheet_times', 'action' => 'edit')),
		)
	),
));
?>