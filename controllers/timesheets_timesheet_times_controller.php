<?php
class TimesheetsTimesheetTimesController extends TimesheetsAppController {

	var $name = 'TimesheetsTimesheetTimes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->TimesheetsTimesheetTime->recursive = 0;
		$this->set('timesheetsTimesheetTimes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimesheetsTimesheetTime.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timesheetsTimesheetTime', $this->TimesheetsTimesheetTime->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TimesheetsTimesheetTime->create();
			if ($this->TimesheetsTimesheetTime->save($this->data)) {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime could not be saved. Please, try again.', true));
			}
		}
		$timesheets = $this->TimesheetsTimesheetTime->Timesheet->find('list');
		$timesheetTimes = $this->TimesheetsTimesheetTime->TimesheetTime->find('list');
		$this->set(compact('timesheets', 'timesheetTimes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TimesheetsTimesheetTime', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TimesheetsTimesheetTime->save($this->data)) {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TimesheetsTimesheetTime->read(null, $id);
		}
		$timesheets = $this->TimesheetsTimesheetTime->Timesheet->find('list');
		$timesheetTimes = $this->TimesheetsTimesheetTime->TimesheetTime->find('list');
		$this->set(compact('timesheets','timesheetTimes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimesheetsTimesheetTime', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimesheetsTimesheetTime->delete($id)) {
			$this->Session->setFlash(__('TimesheetsTimesheetTime deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->TimesheetsTimesheetTime->recursive = 0;
		$this->set('timesheetsTimesheetTimes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimesheetsTimesheetTime.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timesheetsTimesheetTime', $this->TimesheetsTimesheetTime->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->TimesheetsTimesheetTime->create();
			if ($this->TimesheetsTimesheetTime->save($this->data)) {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime could not be saved. Please, try again.', true));
			}
		}
		$timesheets = $this->TimesheetsTimesheetTime->Timesheet->find('list');
		$timesheetTimes = $this->TimesheetsTimesheetTime->TimesheetTime->find('list');
		$this->set(compact('timesheets', 'timesheetTimes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TimesheetsTimesheetTime', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TimesheetsTimesheetTime->save($this->data)) {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimesheetsTimesheetTime could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TimesheetsTimesheetTime->read(null, $id);
		}
		$timesheets = $this->TimesheetsTimesheetTime->Timesheet->find('list');
		$timesheetTimes = $this->TimesheetsTimesheetTime->TimesheetTime->find('list');
		$this->set(compact('timesheets','timesheetTimes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimesheetsTimesheetTime', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimesheetsTimesheetTime->delete($id)) {
			$this->Session->setFlash(__('TimesheetsTimesheetTime deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>