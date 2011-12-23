<div class="timesheet view">
	<div class="timesheetname">
		<h2><span id="timesheetname"><?php echo $timesheet['Timesheet']['name'];  ?></span></h2>
	</div>
    
<?php #$timesheet['TimesheetTime'] = Set::sort($timesheet['TimesheetTime'], '{n}.'.$this->request->params['named']['sort'], $this->request->params['named']['direction']); ?>

  	<div class="timesheets data">
		<h6><?php echo __('Times') ?></h6>	
     
   
<?php
if ($timesheet['TimesheetTime'][0]) : 
?>		
		<table cellpadding="0" cellspacing="0">
			<tr>
            	<?php $direction = !empty($this->request->params['named']['direction']) ? $this->request->params['named']['direction'] == 'asc' ? 'desc' : 'asc' : null; ?>
                
				<th><?php echo __('Project'); ?></th>
				<th><?php echo $this->Html->link('Comments', array($timesheet['Timesheet']['id'], 'sort' => 'ProjectIssue.comments', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Started On', array($timesheet['Timesheet']['id'], 'sort' => 'started_on', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Ended On', array($timesheet['Timesheet']['id'], 'sort' => 'ended_on', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Hours', array($timesheet['Timesheet']['id'], 'sort' => 'hours', 'direction' => $direction)); ?></th>
			</tr>
			<?php $i = 0; $totalHours = 0; ?>
			<?php foreach ($timesheet['TimesheetTime'] as $timeItem) : ?>
				<?php $class = null; if ($i++ % 2 == 0) : $class = ' class="altrow"'; endif; ?>
				<tr<?php echo $class;?> id="row<?php echo __($timeItem['id']); ?>">
					<td>
						<span id="task<?php echo $timeItem['id']; ?>"><?php echo $this->Html->link($projects[$timeItem['Task']['foreign_key']], array('admin' => false, 'plugin' => 'projects', 'controller' => 'projects', 'action' => 'view', $timeItem['Task']['foreign_key']), array('escape' => false)); ?></span>
					</td>
					<td>
						<span id="comments<?php echo $timeItem['id']; ?>"><?php echo __($timeItem['comments']); ?></span>
					</td>
					<td>
						<span id="started<?php echo $timeItem['id']; ?>"><?php echo __($this->Time->nice($timeItem['started_on'])); ?></span>
					</td>
					<td>
						<span id="started<?php echo $timeItem['id']; ?>"><?php echo __($this->Time->nice($timeItem['ended_on'])); ?></span>
					</td>
					<td>
						<span id="hour<?php echo $timeItem['id']; ?>"><?php echo __($timeItem['hours']); ?></span>
					</td>
				</tr>		
               	<?php $totalHours = $totalHours + floatval($timeItem['hours']); ?>	
				<?php endforeach; ?>
                <tr>
                	<th></th>
                	<th></th>
                	<th></th>
                	<th></th>
                    <th><?php echo number_format(round($totalHours, 2), 2, '.', ''); ?></th>
                </tr>                    
			</table>
<?php
endif;
?>
	</div>
</div>


<p class="timing"><strong><?php echo __($timesheet['Timesheet']['name']);?></strong><?php echo __(' was '); ?><strong><?php echo __('Created: '); ?></strong><?php echo $this->Time->niceShort($timesheet['Timesheet']['created']); ?><?php echo __(', '); ?><strong><?php echo __('Last Modified: '); ?></strong><?php echo $this->Time->niceShort($timesheet['Timesheet']['modified']); ?></p>

<?php
$this->set('context_menu', array('menus' => array(
	array('heading' => 'Timesheets',
		'items' => array(
			 $this->Html->link(__('Add Timesheet', true), array('controller' => 'timesheets', 'action' => 'add')),
			 $this->Html->link(__('Add Time', true), array('controller' => 'timesheets_timesheet_times', 'action' => 'add', 'timesheet_id' => $timesheet['Timesheet']['id']))
			)
		)
	)));
?>