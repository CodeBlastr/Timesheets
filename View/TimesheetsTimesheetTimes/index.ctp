<div class="timesheetsTimesheetTimes index">
<h2><?php echo __('TimesheetsTimesheetTimes');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('timesheet_id');?></th>
	<th><?php echo $this->Paginator->sort('timesheet_time_id');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timesheetsTimesheetTimes as $timesheetsTimesheetTime):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($timesheetsTimesheetTime['Timesheet']['name'], array('controller' => 'timesheets', 'action' => 'view', $timesheetsTimesheetTime['Timesheet']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($timesheetsTimesheetTime['TimesheetTime']['id'], array('controller' => 'timesheet_times', 'action' => 'view', $timesheetsTimesheetTime['TimesheetTime']['id'])); ?>
		</td>
		<td>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['created']; ?>
		</td>
		<td>
			<?php echo $timesheetsTimesheetTime['TimesheetsTimesheetTime']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timesheetsTimesheetTime['TimesheetsTimesheetTime']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New TimesheetsTimesheetTime', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Timesheets', true), array('controller' => 'timesheets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet', true), array('controller' => 'timesheets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timesheet Times', true), array('controller' => 'timesheet_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timesheet Time', true), array('controller' => 'timesheet_times', 'action' => 'add')); ?> </li>
	</ul>
</div>
