<div class="timesheets index">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
		<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
		foreach ($timesheets as $timesheet) { ?>
			<tr>
				<td>
					<?php echo $this->Html->link(__($timesheet['Timesheet']['name']), array('action' => 'view', $timesheet['Timesheet']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Time->niceShort($timesheet['Timesheet']['created']); ?>
				</td>
				<td class="actions"><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $timesheet['Timesheet']['id']), null, __('Are you sure you want to delete %s?', $timesheet['Timesheet']['name'])); ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
<?php echo $this->Element('paging'); ?>

<?php 
// set contextual search options
$this->set('forms_search', array(
    'url' => '/timesheets/timesheets/index/', 
    'inputs' => array(
    	array(
			'name' => 'contains:name', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Type Your Search and Hit Enter',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Timesheets',
		'items' => array(
			$this->Html->link(__('New Timesheet', true), array('action' => 'add')),
			)
		),
	))); ?>
