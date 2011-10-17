<div class="timesheetsTimesheetTimes form">
<?php echo $form->create('TimesheetsTimesheetTime');?>
	<fieldset>
 		<legend><?php __('Add TimesheetsTimesheetTime');?></legend>
	<?php
		echo $form->input('timesheet_id');
		echo $form->input('timesheet_time_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
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
