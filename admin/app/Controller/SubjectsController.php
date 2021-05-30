<?php

/**
 * @author RosenCS
 * @copyright 2012
 */
class SubjectsController extends AppController {

    public $name = 'Subjects';
    public $helpers = array('Html', 'Form');
    public $uses = array('Category', 'Subject', 'Product');

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

    public function index($sort = 'name', $direction = 'asc', $page = 1) {
        // checkpoint if team is logged in
        $this->checkteam();

        $cond = '';
        if ((isset($this->data['Subjects']['search_submit'])) && ($this->data['Subjects']['search_submit'] == '1')) {
            $search_submit = $this->data['Subjects']['search_submit'];

            if ((isset($this->data['Subjects']['keywords'])) && ($this->data['Subjects']['keywords'] != '')) {
                $keywords = $this->data['Subjects']['keywords'];

                $cond .= "Subject.name LIKE '%" . $keywords . "%'";
            }
        }

        $this->paginate = array(
            'limit' => 10,
            'order' => array(
                'Subject.name' => 'ASC'
            ),
            'contain' => '',
            'conditions' => array(
                $cond
            ),
        );

        $subjects = $this->paginate('Subject');
        $allsubjects = $subjects;
        $this->set(compact('subjects'));

        $sort = strtolower($sort);

        switch ($sort) {
            case 'id' :
                $order = array("Subject.id" => $direction);
                break;
            case 'name':
                $order = array("Subject.name" => $direction);
                break;
            default:
                $order = array("Subject.id" => $direction);
                break;
        }

        $subjects = $this->Subject->find('all', array(
            'limit' => 10, //int
            'page' => $page, //int
            'order' => $order,
            'conditions' => array(
                $cond
            ),
                ));

        $totalSubjects = $this->Subject->find('count');

        $this->set('sort', strtolower($sort));
        $this->set('direction', strtolower($direction));
        $this->set('page', $page);
        $this->set('totalPage', ceil($totalSubjects / 10));
        $this->set('subjects', $subjects);
    }

    public function add_new() {
        $this->checkteam();

        if ((isset($this->data['Subjects'])) && (!empty($this->data['Subjects']))) {

            $flag = 0;
            extract($this->data['Subjects']);
            $subject_name = $this->data['Subjects']['name'];

            if (!$subject_name) {
                $flag = 1;
                $this->Session->setFlash(__('Subject Name is required!', true));
                $this->redirect(array('controller' => 'subjects', 'action' => 'add_new/'));
            }
            if ($flag == 0) {
                $thesubject['Subject']['name'] = $subject_name;
                $thesubject['Subject']['id'] = $this->data['Subjects']['id'];

                if ($this->Subject->save($thesubject)) {
                    $this->Session->setFlash(__('The Subject has been added successfully!', true));
                } else {
                    $this->Session->setFlash(__('Add New Subject faild!', true));
                }

                $this->redirect(array('controller' => 'subjects', 'action' => '/'));
            }
        }
    }

    public function edit($id = null) {
        $userType = array('1' => 'Admin', '2' => 'User');
        $this->set(compact('userType'));

        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Subjects', 'action' => 'index'));

        $this->checkadmin(); // session read

        $this->Subject->id = $id;
        if (!$this->Subject->exists()) {
            throw new NotFoundException(__('Invalid Subject'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Subject->save($this->request->data)) {
                $this->Session->setFlash(__('The Subject has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Subject->read(null, $id);
        }

        $subject = $this->Subject->find('first', array(
            'conditions' => array(
                'Subject.id' => $id
            ),
                ));

        $this->set('subject', $subject);
    }

    public function delete($id = null) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Subjects', 'action' => 'index'));

        $this->checkadmin();
        $this->Subject->id = $id;
        if ($this->Subject->delete()) {
            $this->Session->setFlash(__('Subject deleted'));
            $this->redirect(array('action' => 'index'));
            $this->Session->setFlash(__('Subject was not deleted'));
        } else {
            $this->Session->setFlash(__('Unable to remove subject using the id.'));
        }
        $this->redirect(array('action' => 'index'));
    }

    function checkAdmin() {
        if ($this->Session->check('user_type') and ($this->Session->read('user_type') != 1)) //and ($this->Session->read('user_type') != 1)))
            $this->redirect(array('controller' => 'Appointments', 'action' => 'index'));
    }

}

?>