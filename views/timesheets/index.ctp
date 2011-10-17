<div class="timesheets index">
<h2><?php __('Timesheets');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timesheets as $timesheet):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timesheet['Timesheet']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link(__($timesheet['Timesheet']['name'], true), array('action' => 'view', $timesheet['Timesheet']['id'])); ?>
		</td>
		<td>
			<?php echo $time->relativeTime($timesheet['Timesheet']['created']); ?>
		</td>
		<td class="actions"><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $timesheet['Timesheet']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timesheet['Timesheet']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>

<?php 
// set the contextual menu items
$menu->setValue(array(
	array(
		'heading' => 'Timesheets',
		'items' => array(
			$this->Html->link(__('New Timesheet', true), array('action' => 'add')),
			)
		),
	)
);
?>