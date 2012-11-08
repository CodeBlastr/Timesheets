<?php
class TimesheetTimesController extends TimesheetsAppController {

	public $name = 'TimesheetTimes';
	public $uses = 'Timesheets.TimesheetTime';
	public $helpers = array('Html', 'Form');
	public $allowedActions = array('desktop_add');



	public function index() {
		$this->TimesheetTime->recursive = 0;
		$this->set('timesheetTimes', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimesheetTime.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timesheetTime', $this->TimesheetTime->read(null, $id));
	}


	public function add() {
		if (!empty($this->request->data)) {
			try {
				$this->TimesheetTime->save($this->request->data);
				$this->Session->setFlash(__('Time saved'));
				$this->redirect(array('action' => 'view', $this->TimesheetTime->id));
			} catch (Exception $e) {
				$this->Session->setFlash(__($e->getMessage()));
			}
		}
		
		$projects = $this->TimesheetTime->Project->find('list');
		$projectId = $this->request->params['named']['project_id'];
		$creators = $this->TimesheetTime->Project->Creator->find('list');	
		if (isset($this->request->params['named']['project_id'])) {
			$tasks = $this->TimesheetTime->Task->find('list', array(
				'conditions' => array(
					'Task.model' => 'Project', 
					'Task.foreign_key' => $this->request->params['named']['project_id'], 
					'Task.parent_id is NOT NULL',
					),
				));
		}
		
		$this->set(compact('timesheets', 'contacts', 'creators', 'projects', 'tasks', 'projectId'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimesheetTime', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimesheetTime->delete($id)) {
			$this->Session->setFlash(__('TimesheetTime deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	

	public function search() {
		if (isset($this->request->data['TimesheetTime'])) {
			foreach ($this->request->data['TimesheetTime'] as $key => $value) : 
				if(strpos($value, ',')) {
					#if the value has a comma in it, we need to break it up and then do conidtion setup
					$values = explode(',', $value);
					foreach ($values as $val) {
						if($key == 'contact_id' && !empty($val) && $val != 'null') :
							$conditions['OR'][] = array('TimesheetTime.project_id' => $this->TimesheetTime->Project->find('list', array('fields' => 'id', 'conditions' => array('contact_id' => $val))));
						elseif (!empty($val) && $val != 'null') : 
							$conditions['OR'][] = array('TimesheetTime.'.$key => $val);
						endif;					
					}
				} else {
					if($key == 'contact_id' && !empty($value) && $value != 'null') :
						$conditions[] = array('TimesheetTime.project_id' => $this->TimesheetTime->Project->find('list', array('fields' => 'id', 'conditions' => array('contact_id' => $value))));
					elseif ($key == 'started_on' && !empty($value) && $value != 'null') : 
						$conditions[] = array('TimesheetTime.started_on >=' => $value);
					elseif ($key == 'ended_on' && !empty($value) && $value != 'null') : 
						$conditions[] = array('TimesheetTime.ended_on <=' => $value);
					elseif (!empty($value) && $value != 'null') : 
						$conditions[] = array('TimesheetTime.'.$key => $value);
					endif;
				}
			endforeach;
			$timesheetTimes = $this->TimesheetTime->find('all', array(
				'conditions' => $conditions,
				'contain' => array(
					'Creator'
					),
				'order' => 'TimesheetTime.started_on',
				));
			$timesheetTimes = Set::combine(
		        $timesheetTimes,
	            '{n}.TimesheetTime.id',
        	       array(
        	         '{0}hr(s) : {1}',
	                 '{n}.TimesheetTime.hours',
					 '{n}.Creator.full_name'
	               )
    	    ); 
			#$timesheetTimes = $this->request->data;
			$this->set(compact('timesheetTimes'));
		} else {
			$this->Session->setFlash(__('Invalid Timesheet', true));
		}			
	}
	
/**
 * added on 01/04/2010 for getting the total hour
 */
	public function time_in_hour($time){
		$arr = explode(":", $time);
		$hour =  $arr[0].".". $arr[1];	
        return $hour;
	}
	
/**
 * added on 01/04/2010 for saving the timesheet details
 */
	public function desktop_add() {
        $data['TimesheetTime'] =  array(         
            'hours' => $_REQUEST['timervalue'],
            'comments' => $_REQUEST['comments'],
            'started_on' => $_REQUEST['timerstart'],
            'ended_on' => $_REQUEST['timerend'],
            'project_id' => $_REQUEST['project_id'],
            'task_id' => $_REQUEST['task_id'],
            'creator_id' => $_REQUEST['user_id'],
            'modifier_id' => $_REQUEST['user_id'],          
            );
		$data['Task'] = array(
			'id' => $_REQUEST['task_id'],
			'is_completed' => $_REQUEST['is_completed'],
			);
        $this->TimesheetTime->set($data);
        if($this->TimesheetTime->add($data)) {
			echo 'Good Job';
		} else {
			echo 'Save Failed';
		}	
		$this->layout = false;	
	}

}