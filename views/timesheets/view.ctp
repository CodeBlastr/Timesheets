<div class="timesheet view">
	<div class="timesheetname">
		<h2><span id="timesheetname"><?php echo $timesheet['Timesheet']['name'];  ?></span></h2>
	</div>
    
<?php #$timesheet['TimesheetTime'] = Set::sort($timesheet['TimesheetTime'], '{n}.'.$this->params['named']['sort'], $this->params['named']['direction']); ?>

  	<div class="timesheets data">
		<h6><?php __('Times') ?></h6>	
        

<p>
<?php
/*
	#chart values
	# find exaamples of this here : http://wiki.github.com/alkemann/CakePHP-Assets/flashcharthelper-exampels

	$timesheet['TimesheetTime'] = Set::sort($timesheet['TimesheetTime'], '{n}.started_on', 'asc');	
	
	# group the times by date, and add them up 
	$n = 0;	
	foreach ($timesheet['TimesheetTime'] as $timesheetTime) : 
		if (array_key_exists(date('D, M j', strtotime($timesheetTime['started_on'])), $newHours)) {
			$newHours[date('D, M j', strtotime($timesheetTime['started_on']))] = $newHours[date('D, M j', strtotime($timesheetTime['started_on']))] + $timesheetTime['hours'];
		} else {
			$newHours[date('D, M j', strtotime($timesheetTime['started_on']))] = $timesheetTime['hours'];
		}
		$n++;
	endforeach;
	
	# out put the summed up times as a daily log
	$i = 0;
	foreach ($newHours as $key => $value) {
		$startedOn[$i]['Hours']['hours'] = $value;
		$startedOn[$i]['Hours']['started_on'] = $key;
		$i++;
	}
	
	$max = max($startedOn);
	echo $flashChart->begin();
    echo $flashChart->setData($startedOn, '{n}.Hours.hours', '{n}.Hours.started_on', 'comps'); 
	$flashChart->setTitle($timesheet['Timesheet']['name'].' by Day', '{color:#f1a334;font-size:25px;padding-bottom:20px;}');
	$flashChart->axis('x',array('labels' => ''));
	$flashChart->axis('y',array('range' => array(0, $max['Hours']['hours'])));
	echo $flashChart->chart('line', array(), 'comps');
	echo $flashChart->render(); */
	
?>
</p>     
        
   
<?php
if ($timesheet['TimesheetTime'][0]) : 
?>		
		<table cellpadding="0" cellspacing="0">
			<tr>
            	<?php $direction = !empty($this->params['named']['direction']) ? $this->params['named']['direction'] == 'asc' ? 'desc' : 'asc' : null; ?>
                
				<th><?php echo $this->Html->link('Task', array($timesheet['Timesheet']['id'], 'sort' => 'Task.description', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Comments', array($timesheet['Timesheet']['id'], 'sort' => 'ProjectIssue.comments', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Started On', array($timesheet['Timesheet']['id'], 'sort' => 'started_on', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Ended On', array($timesheet['Timesheet']['id'], 'sort' => 'ended_on', 'direction' => $direction)); ?></th>
				<th><?php echo $this->Html->link('Hours', array($timesheet['Timesheet']['id'], 'sort' => 'hours', 'direction' => $direction)); ?></th>
			</tr>
			<?php $i = 0; $totalHours = 0; ?>
			<?php foreach ($timesheet['TimesheetTime'] as $timeItem) : ?>
				<?php $class = null; if ($i++ % 2 == 0) : $class = ' class="altrow"'; endif; ?>
				<tr<?php echo $class;?> id="row<?php __($timeItem['id']); ?>">
					<td>
						<span id="task<?php echo $timeItem['id']; ?>"><?php echo $this->Html->link(strip_tags($timeItem['Task']['description']), array('admin' => false, 'plugin' => 'projects', 'controller' => 'projects', 'action' => 'task', $timeItem['Task']['parent_id'])); ?></span>
					</td>
					<td>
						<span id="comments<?php echo $timeItem['id']; ?>"><?php __($timeItem['comments']); ?></span>
					</td>
					<td>
						<span id="started<?php echo $timeItem['id']; ?>"><?php __($time->nice($timeItem['started_on'])); ?></span>
					</td>
					<td>
						<span id="started<?php echo $timeItem['id']; ?>"><?php __($time->nice($timeItem['ended_on'])); ?></span>
					</td>
					<td>
						<span id="hour<?php echo $timeItem['id']; ?>"><?php __($timeItem['hours']); ?></span>
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


<p class="timing"><strong><?php __($timesheet['Timesheet']['name']);?></strong><?php __(' was '); ?><strong><?php __('Created: '); ?></strong><?php echo $time->relativeTime($timesheet['Timesheet']['created']); ?><?php __(', '); ?><strong><?php __('Last Modified: '); ?></strong><?php echo $time->relativeTime($timesheet['Timesheet']['modified']); ?></p>

<?php
	$menu->setValue(
		array(
			  array('heading' => 'Timesheets',
					'items' => array(
									 $this->Html->link(__('Add Timesheet', true), array('controller' => 'timesheets', 'action' => 'edit')),
									 $this->Html->link(__('Add Time', true), array('controller' => 'timesheets_timesheet_times', 'action' => 'add', 'timesheet_id' => $timesheet['Timesheet']['id']))
									 )
					)
			  )
		);
?>