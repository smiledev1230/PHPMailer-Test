<?php

App::uses('AppController', 'Controller');

/**
 * @author RosenCS
 * @copyright 2012
 */
class PagesController extends AppController {

    var $name = 'Pages';
    var $helpers = array('Html', 'Text');
    var $uses = array('User', 'Appointment');

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

    public function home($sort = 'id', $direction = 'asc', $page = 1) {
        // checkpoint if team is logged in
        $this->checkteam();

        $cond = '';
        if ((isset($this->data['Users']['search_submit'])) && ($this->data['Users']['search_submit'] == '1')) {
            $search_submit = $this->data['Users']['search_submit'];

            if ((isset($this->data['Users']['search_name'])) && ($this->data['Users']['search_name'] != '')) {
                $search_name = $this->data['Users']['search_name'];

                $cond .= "(User.firstname LIKE '%" . $search_name . "%' OR User.lastname LIKE '%" . $search_name . "%')";
            }

            if ((isset($this->data['Users']['search_email'])) && ($this->data['Users']['search_email'] != '')) {
                $search_email = $this->data['Users']['search_email'];

                $cond .= $cond != '' ? ' AND ' : '';
                $cond .= "User.email LIKE '%" . $search_email . "%'";
            }
        }
        $users = $this->User->find('all', array(
            'limit' => 10, //int
            'page' => $page, //int
            'conditions' => array(
                $cond
            ),
            'order' => array(
                "User.$sort" => $direction,
            ),
                ));
        $totalUsers = $this->User->find('count');

        $this->set('users', $users);
        $this->set('sort', strtolower($sort));
        $this->set('direction', strtolower($direction));
        $this->set('page', $page);
        $this->set('totalPage', ceil($totalUsers / 10));
        $this->set(compact('users'));
    }

}

?>