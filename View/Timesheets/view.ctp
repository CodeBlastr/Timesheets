<div class="timesheet view">		
	<table cellpadding="0" cellspacing="0" class="table-hover">
		<tr>
    		<th><?php echo $this->Paginator->sort('name');?></th>
        	<th><?php echo $this->Paginator->sort('comments');?></th>
        	<th><?php echo $this->Paginator->sort('started_on');?></th>
        	<th><?php echo $this->Paginator->sort('hours');?></th>
		</tr>
		<?php
        foreach ($timesheetTimes as $timeItem) {
		?>
		<tr>
			<td>
				<span id="task<?php echo $timeItem['TimesheetTime']['id']; ?>"><?php echo $this->Html->link($projects[$timeItem['Task']['foreign_key']], array('admin' => false, 'plugin' => 'projects', 'controller' => 'projects', 'action' => 'view', $timeItem['Task']['foreign_key']), array('escape' => false)); ?></span>
			</td>
			<td>
				<span id="comments<?php echo $timeItem['TimesheetTime']['id']; ?>"><?php echo __($timeItem['TimesheetTime']['comments']); ?></span>
			</td>
			<td>
				<span id="started<?php echo $timeItem['TimesheetTime']['id']; ?>"><?php echo ZuhaInflector::datify($timeItem['TimesheetTime']['started_on']); ?></span>
			</td>
			<td>
				<span id="hour<?php echo $timeItem['TimesheetTime']['id']; ?>"><?php echo __($timeItem['TimesheetTime']['hours']); ?></span>
			</td>
		</tr>
       	<?php
        } ?>
        <tr>
        	<td></td>
            <td></td>
            <td></td>
            <td><?php echo number_format(round($totalHours[0][0]['total_hours'], 2), 2, '.', ''); ?></td>
        </tr>                    
	</table>
</div>


<p class="timing"><strong><?php echo __($timesheet['Timesheet']['name']);?></strong><?php echo __(' was '); ?><strong><?php echo __('Created: '); ?></strong><?php echo $this->Time->niceShort($timesheet['Timesheet']['created']); ?><?php echo __(', '); ?><strong><?php echo __('Last Modified: '); ?></strong><?php echo $this->Time->niceShort($timesheet['Timesheet']['modified']); ?></p>
<?php echo $this->element('paging');?>

<?php
$this->set('context_menu', array('menus' => array(
	array('heading' => 'Timesheets',
		'items' => array(
    		 $this->Html->link(__('List'), array('controller' => 'timesheets', 'action' => 'index')),
    		 $this->Html->link(__('Edit'), array('controller' => 'timesheets', 'action' => 'edit')),
			)
		)
	))); ?>