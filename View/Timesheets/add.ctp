<div class="timesheets form" id="timesheets-search">
    <?php echo $this->Form->create('TimesheetTime', array('action' => 'search'));?>
	<fieldset>
	    <?php
		echo $this->Form->input('project_id', array('class' => 'super-select', 'type' => 'select', 'multiple' => true));
		echo $this->Form->input('creator_id', array('class' => 'super-select', 'type' => 'select', 'multiple' => true));
		echo $this->Form->input('started_on', array('type' => 'date', 'label' => 'Start On or After'));
		echo $this->Form->input('ended_on', array('type' => 'date', 'label' => 'Ended Before')); ?>
	</fieldset>
    <?php echo $this->Form->end('Search Times');?>
</div>

<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Timesheets',
		'items' => array(
			$this->Html->link(__('List'), array('controller' => 'timesheets', 'action' => 'index')),
			)
		),
	))); ?>