<div class="timesheetsTimesheetTimes view">
<h2><?php  __('TimesheetsTimesheetTime');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timesheet'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($timesheetsTimesheetTime['Timesheet']['name'], array('controller' => 'timesheets', 'action' => 'view', $timesheetsTimesheetTime['Timesheet']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timesheet Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($timesheetsTimesheetTime['TimesheetTime']['id'], array('controller' => 'timesheet_times', 'action' => 'view', $timesheetsTimesheetTime['TimesheetTime']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit TimesheetsTimesheetTime', true), array('action' => 'edit', $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete TimesheetsTimesheetTime', true), array('action' => 'delete', $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List TimesheetsTimesheetTimes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New TimesheetsTimesheetTime', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timesheets', true), array('controller' => 'timesheets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet', true), array('controller' => 'timesheets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timesheet Times', true), array('controller' => 'timesheet_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet Time', true), array('controller' => 'timesheet_times', 'action' => 'add')); ?> </li>
	</ul>
</div>
