<?php echo $this->Form->create('Timesheet', array('url' => '/timesheets/timesheets/add'));?>
	<fieldset>
		<?php
        echo $this->Form->input('Timesheet.name');
		echo $this->Form->input('TimesheetTime.TimesheetTime', array('label' => 'Select times', 'class' => 'super-select')); ?>
    	<div class="input select" id="times"></div>
	</fieldset>
<?php echo $this->Form->end('Save Timesheet');?>