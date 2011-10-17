<div class="timesheets form">
<?php echo $this->Form->create('TimesheetTime');?>
	<fieldset>
 		<legend><?php __('Add '.$model);?></legend>
	<?php
		foreach ($fields as $field) :
				//select fields
				if (strstr($field, 'type_id')):
					echo $this->Form->input($field, array('after' =>  ' '.$this->Html->link(__('Edit', true), array('controller' => str_replace('_id','s',$field), 'action' => 'index'))));
				//hidden fields
				elseif(isset($this->params['named'][$field])): 
					echo $this->Form->hidden($field, array('value' => $this->params['named'][$field]));
				// text type fields
				else : 
					echo $this->Form->input($field); 
				endif;			
		endforeach;
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<?php 
// set the contextual menu items
$this->Menu->setValue(array(
					  array(
							'heading' => 'Timesheets',
							'items' => array(
											 $this->Html->link(__('Add Time', true), array('controller' => 'timesheet_times', 'action' => 'edit')),
											 )
							),
					  )
				);
?>


<script type="text/javascript">
/*
$(function () {

	// fill in the projects drop down
	$('#TimesheetTimeContactId').change(function() {
		var contactId = $(this).val();
		$("#loadingimg").show();
		$.ajax({
		    url:'/projects/ajax_list/contact_id:'+contactId,
		    type: 'POST',
		    data:'',			
		    success: function(result){				
				$("#TimesheetTimeProjectId").html(result); 
				$("#loadingimg").hide();
		    }
		});
	});	

	// fill in the project issues drop down
	$('#TimesheetTimeProjectId').change(function() {
		var projectId = $(this).val();
		$("#loadingimg").show();
		$.ajax({
		    url:'/project_issues/ajax_list/project_id:'+projectId+'/parent_id:',
		    type: 'POST',
		    data:'',			
		    success: function(result){				
				$("#TimesheetTimeProjectIssueId").html(result); 
				$("#loadingimg").hide();
		    }
		});
	});	
	
}); */
</script>