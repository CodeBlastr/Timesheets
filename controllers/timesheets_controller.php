<?php
class TimesheetsController extends TimesheetsAppController {

	var $name = 'Timesheets';
	var $helpers = array('Html', 'Form');
	

	function index() {
		$this->paginate = array('order' => array('created DESC'));
		$this->set('timesheets', $this->paginate());
	}

	function view($id = null) {		
		if (!$id) {
			$this->flash(__('Invalid Timesheet', true), array('action'=>'index'));
		}
		#these next two lines are there, because for some reason it was throwing an error saying that TimesheetTime was not associated with Project
		#$this->Timesheet->contain(array('TimesheetTime' => array('Project', 'ProjectIssue')));
		$timesheet = $this->Timesheet->find('first', array(
			'conditions' => array(
				'Timesheet.id' => $id,
				),
			'contain' => array(
				'TimesheetTime' => array(
					'Task',
					),
				),
			));
		$this->set('timesheet', $timesheet);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Timesheet->create();
			if ($this->Timesheet->save($this->data)) {
				$this->Session->setFlash(__('The Timesheet has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Timesheet could not be saved. Please, try again.', true));
			}
		}
		#these next two lines are there, because for some reason it was throwing an error saying that TimesheetTime was not associated with Project
		#$this->Timesheet->TimesheetTime->bindModel(array('belongsTo'=>array('Project')));
		#$this->Timesheet->TimesheetTime->bindModel(array('belongsTo'=>array('ProjectIssue')));
		#$this->Timesheet->TimesheetTime->bindModel(array('belongsTo'=>array('Creator')));
		#$this->Timesheet->contain(array('TimesheetTime' => array('Project', 'ProjectIssue', 'Creator')));
		
		$Project = ClassRegistry::init('Project');
		$projects = $Project->find('list', array('contain' => array(), 'order' => 'Project.name'));
		#$projects = Set::combine($projects, '{n}.Project.id', array('Project Name : {0} ', '{n}.Project.displayName')); 		
			
		$timesheetTimes = $this->Timesheet->TimesheetTime->find('list');
		$creators = $this->Timesheet->TimesheetTime->Creator->find('list');
		$contacts = $this->Timesheet->TimesheetTime->Project->Contact->query("SELECT concat(Contact.first_name, ' ', Contact.last_name) AS name, Contact.contact_id FROM contact_people AS Contact WHERE Contact.contact_id IN (SELECT contact_id FROM projects) UNION SELECT Contact.name AS name, Contact.contact_id FROM contact_companies AS Contact WHERE Contact.contact_id IN (SELECT contact_id FROM projects) ORDER BY name");
		$contacts = Set::combine($contacts,'{n}.0.contact_id',array('{0}','{n}.0.name')); 
		$this->set(compact('timesheetTimes', 'projects', 'contacts', 'creators'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Timesheet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Timesheet->delete($id)) {
			$this->Session->setFlash(__('Timesheet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	
	/** 
	 * @todo This ajax_list function probably can be removed, or transferred to use the app_controller version
	**/
	function __ajax_list($base, $models){ 
	 	foreach ($models as $modelkey => $model):
			if (isset($model['upper'])):
				if (isset($model['conditions'])) : 
					$types[$modelkey] = $this->$base->$model['upper']->$model['up']->$modelkey->find('list', array('conditions' => $model['conditions']));
				else :
					$types[$modelkey] = $this->$base->$model['upper']->$model['up']->$modelkey->find('list');
				endif;
			elseif (isset($model['up'])): 
				if (isset($model['conditions'])) : 
					$types[$modelkey] = $this->$base->$model['up']->$modelkey->find('list', array('conditions' => $model['conditions']));
				else :
					$types[$modelkey] = $this->$base->$model['up']->$modelkey->find('list');
				endif;
			else: 
				if (isset($model['conditions'])) : 
					$types[$modelkey] = $this->$base->$modelkey->find('list', array('conditions' => $model['conditions']));	
				else :
					$types[$modelkey] = $this->$base->$modelkey->find('list');
				endif;
			endif;
	        foreach ($types[$modelkey] as $typekey => $value): 
	            $type[$modelkey][] = array($typekey,$value);
	        endforeach;
		endforeach;
	    $this->set('ajaxTypeList', $type); 
	}

}
?>