<?php echo $this->Form->create('Timesheet', array('url' => '/timesheets/timesheets/add'));?>
	<fieldset>
 		<legend><?php echo __('Create Timesheet');?></legend>
		<?php
		echo $this->Form->input('TimesheetTime.timesheet_time_id', array('multiple' => 'multiple'));
		echo $this->Form->input('Timesheet.id');
		echo $this->Form->input('Timesheet.name');
		 ?>
    	<div class="input select" id="times"></div>
	</fieldset>
<?php echo $this->Form->end('Save Timesheet');?>