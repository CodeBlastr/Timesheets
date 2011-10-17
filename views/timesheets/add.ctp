<h2 class="toggleClick" name="TimesheetTimeSearchForm">Timesheet Builder</h2>
<div class="timesheets form" id="timesheets-search">
<?php echo $this->Form->create('TimesheetTime', array('action' => 'search'));?>
	<fieldset>
 		<legend><?php __('Time Search');?></legend>
	<?php
		echo $this->Form->input('contact_id', array('type' => 'select', 'multiple' => true, 'label' => array('class' => 'toggleClick', 'name' => 'TimesheetTimeContactId')));
		echo $this->Form->input('project_id', array('type' => 'select', 'multiple' => true, 'label' => array('class' => 'toggleClick', 'name' => 'TimesheetTimeProjectId')));
		echo $this->Form->input('creator_id', array('type' => 'select', 'multiple' => true, 'label' => array('class' => 'toggleClick', 'name' => 'TimesheetTimeCreatorId')));
		echo $this->Form->input('started_on', array('type' => 'text', 'label' => 'Start On or After'));
		echo $this->Form->input('ended_on', array('type' => 'text', 'label' => 'Ended Before'));
	?>
	</fieldset>
<?php echo $this->Form->end('Search Times');?>
<?php echo $this->Form->create('Timesheet');?>
	<fieldset>
 		<legend><?php __('Create Timesheet');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
    	<div class="input select" id="times"></div>
    <?php 
		#echo $this->Form->input('TimesheetTime', array('type' => 'select', 'multiple' => true));
		echo $this->Form->hidden('save');
	?>
	</fieldset>
<?php echo $this->Form->end('Save Timesheet');?>
</div>

<?php 
// set the contextual menu items
$this->Menu->setValue(array(
	array(
		'heading' => 'Timesheets',
		'items' => array(
			$this->Html->link(__('List Timesheets', true), '/timesheets/'),
			$this->Html->link(__('New Timesheet', true), '/timesheets/add'),
			)
		),
   )
);
?>


	<script type="text/javascript">
		$(function() {
			$("#TimesheetTimeStartedOn, #TimesheetTimeEndedOn").datepicker(	{
				dateFormat: 'yy-mm-dd',
				yearRange: '2010:<?php echo date('Y'); ?>',
				changeMonth: true,
				changeYear: true
				});
    
			// fill in the project issues drop down
			$('#TimesheetTimeSearchForm').change(function() {
				var contactId = $("#TimesheetTimeContactId").val();
				var projectId = $("#TimesheetTimeProjectId").val();
				var creatorId = $("#TimesheetTimeCreatorId").val();
				var startedOn = $("#TimesheetTimeStartedOn").val();
				var endedOn = $("#TimesheetTimeEndedOn").val();
				$("#loadingimg").show();
				$.ajax({
				    url:'/timesheets/timesheet_times/search.json',
					dataType: 'json',
				    type: 'POST',
				    data:'data[TimesheetTime][contact_id]='+contactId+'&data[TimesheetTime][project_id]='+projectId+'&data[TimesheetTime][creator_id]='+creatorId+'&data[TimesheetTime][started_on]='+startedOn+'&data[TimesheetTime][ended_on]='+endedOn,	
				    success: function(result){		
						var time = '';
						$.each(result, function(i, item) {
             				time += '<option value="' + i + '">' + result[i] + '<\/option>';
						});				
						$("#times").html('<select name="data[TimesheetTime][TimesheetTime][]" multiple="multiple" id="TimesheetTimeTimesheetTime">' + time + '<\/select>'); 
						$("#loadingimg").hide();
				    }
				});
			});	
	
	
		});

	</script> 
    
    
    
    
    
    
    
    
    
    
    