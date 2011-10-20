<div class="timesheetsTimesheetTimes form">
<?php echo $this->Form->create('TimesheetsTimesheetTime');?>
	<fieldset>
 		<legend><?php echo __('Add TimesheetsTimesheetTime');?></legend>
	<?php
		echo $this->Form->input('timesheet_id');
		echo $this->Form->input('timesheet_time_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List TimesheetsTimesheetTimes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Timesheets', true), array('controller' => 'timesheets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet', true), array('controller' => 'timesheets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timesheet Times', true), array('controller' => 'timesheet_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet Time', true), array('controller' => 'timesheet_times', 'action' => 'add')); ?> </li>
	</ul>
</div>
