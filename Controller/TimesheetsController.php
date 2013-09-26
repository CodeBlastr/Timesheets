<?php
class TimesheetsController extends TimesheetsAppController {

	public $name = 'Timesheets';
	public $uses = 'Timesheets.Timesheet';
	public $helpers = array('Html', 'Form');
	

	public function index() {
		$this->paginate = array('order' => array('Timesheet.created' => 'desc'));
		$this->set('timesheets', $this->paginate());
	}

	public function view($id = null) {
    	$this->Timesheet->id = $id;
		if (!$this->Timesheet->exists()) {
			throw new NotFoundException(__('Timesheet not found'));
		}		
		$timesheet = $this->Timesheet->find('first', array('conditions' => array('Timesheet.id' => $id)));
        // get the timesheet times in a paginated format
        $times = Set::extract('/TimesheetsTimesheetTime/timesheet_time_id', $this->Timesheet->TimesheetsTimesheetTime->find('all', array('conditions' => array('TimesheetsTimesheetTime.timesheet_id' => $id))));
        $this->paginate['conditions']['TimesheetTime.id'] = $times;
        $this->paginate['contain'][] = 'Task';
        $totalHours = $this->Timesheet->TimesheetTime->find('all', array('conditions' => array('TimesheetTime.id' => $times), 'fields' => 'SUM(hours) AS total_hours'));
        $timesheetTimes = $this->paginate('Timesheets.TimesheetTime');
		$projectIds = Set::extract('/Task/foreign_key', $timesheetTimes);
		$projects = $this->Timesheet->TimesheetTime->Task->Project->find('list', array('conditions' => array('Project.id' => $projectIds), 'fields'=>array('id', 'name')));
		 
		$this->set(compact('timesheet', 'timesheetTimes', 'totalHours', 'projects'));
        $this->set('title_for_layout', $timesheet['Timesheet']['name']);
        $this->set('page_title_for_layout', __('Timesheet <small>%s</small>', $timesheet['Timesheet']['name']));
	}

	public function add() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			$this->Timesheet->create();
			if ($this->Timesheet->save($this->request->data)) {
				$this->Session->setFlash(__('The Timesheet has been saved'));
				$this->redirect(array('action' => 'view', $this->Timesheet->id));
			} else {
				$this->Session->setFlash(__('The Timesheet could not be saved. Please, try again.'));
			}
		}
		$Project = ClassRegistry::init('Projects.Project');
		$projects = $Project->find('list', array('contain' => array(), 'order' => 'Project.name'));		
		$timesheetTimes = $this->Timesheet->TimesheetTime->find('list');
		$creators = $this->Timesheet->TimesheetTime->Creator->find('list');
		$this->set(compact('timesheetTimes', 'projects', 'creators'));
        $this->set('title_for_layout', 'Timesheet Builder');
        $this->set('page_title_for_layout', 'Timesheet Builder');
	}
    
    public function edit($id) {
        $this->Timesheet->id = $id;
		if (!$this->Timesheet->exists()) {
			throw new NotFoundException(__('Timesheet not found'));
		}
        debug($id);
        break;
    }

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Timesheet'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Timesheet->delete($id)) {
			$this->Session->setFlash(__('Timesheet deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}
}