<?php

//App::import('Helper', 'DatePicker');
App::uses('CakeEmail', 'Network/Email');

/**
 * @author --
 * @copyright 2013
 */
class VisitorsController extends AppController {

    var $name = 'Visitors';
    var $helpers = array('Html', 'Form');
    var $uses = array('Appointment_visitor', 'User', 'Product', 'Category', 'Image', 'Subject', 'Email_template');

    public function session_read() {

        $team_id = $this->Session->read('team_id');
        $this->set('team_id', $team_id);

        if (!empty($team_id)) {
            //$this->layout = 'team';
            $find_team = $this->Team->findById($team_id);
            $this->set('find_team', $find_team);
        } else {
            $this->redirect(array('controller' => 'teams', 'action' => 'login'));
        }
    }

    public function index($index = 'all') {
        //$this->layout = 'appointments';        
        $appointments = $this->Appointment_visitor->find('all');
        $this->set(compact('appointments'));
    }

    public function confirm($id = null) {
        $appointment = $this->Appointment_visitor->findById($id);
        $this->set('data', $appointment);
    }
    
    public function view($id = null) {
        $appointment = $this->Appointment_visitor->findById($id);
        $this->set('data', $appointment);
    }

    public function save_confirm() {

        // Has any form data been POSTed?
        if ($this->request->is('post')) {
            var_dump($this->request->data['firstname']);
            // If the form data can be validated and saved...
            $this->Appointment_visitor->id = $this->request->data['confirm_appointment'];
            $this->Appointment_visitor->read();

            $this->Appointment_visitor->set('firstname', $this->request->data['Appointment']['firstname']);
            $this->Appointment_visitor->set('lastname', $this->request->data['Appointment']['lastname']);
            $this->Appointment_visitor->set('email', $this->request->data['Appointment']['email']);
            $this->Appointment_visitor->set('phone', $this->request->data['Appointment']['phone']);
            $this->Appointment_visitor->set('first_preference_date', $this->request->data['Appointment']['first_preference_date']);
            $this->Appointment_visitor->set('first_preference_time', $this->request->data['Appointment']['first_preference_time']);
            $this->Appointment_visitor->set('second_preference_date', $this->request->data['Appointment']['second_preference_date']);
            $this->Appointment_visitor->set('second_preference_time', $this->request->data['Appointment']['second_preference_time']);
            $this->Appointment_visitor->set('comments', $this->request->data['Appointment']['comments']);
            $this->Appointment_visitor->set('status_confirm', $this->request->data['status_confirm']);

            if ($this->Appointment_visitor->save()) {
                // Set a session flash message and redirect.
                $this->Session->setFlash('Updating was success!');
                $this->redirect('/visitors');
            }
        }

        // If no form data, find the recipe to be edited
        // and hand it to the view.
        $this->set('recipe', $this->Recipe->findById($id));
    }

}

?>