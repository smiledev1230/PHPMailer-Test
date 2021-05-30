<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class TeamsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    var $uses = array('Team', 'User');
    var $helpers = array('Html', 'Form');
    var $beforeFilter = array('requireLogin' => array('except' => array('index')));

    function session_read() {

        $team_id = $this->Session->read('team_id');
        $this->set('team_id', $team_id);

        if (!empty($team_id)) {
            $this->layout = 'team';
            $find_team = $this->Team->findById($team_id);
            $this->set('find_team', $find_team);
        } else {

            $this->redirect(array('controller' => 'teams', 'action' => 'login'));
        }
    }

    function logout() {
        $this->Session->destroy();
        $this->Session->write('team_id', '');
        $this->Session->write('referal_url', '');
        $this->Session->write('user_type', '');
        $this->Session->write('isLogin', false);
        $this->redirect(array('controller' => 'teams', 'action' => 'login'));
    }

    function login() {
        $logins = null;

        if (!empty($this->data)) {
            $logins = $this->getAdminTeam($this->data['username'], $this->data['password']);

            if (!empty($logins)) {
                $this->Session->write('team_id', $logins['Team']['id']);
                $this->Session->write('user_type', $logins['Team']['super_user']);
                $this->Session->write('isLogin', true);
                $admin_id = $this->Session->read('team_id');
                $referal_url = $this->Session->read("referal_url");
                if (empty($referal_url)) {

                    $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                } else {

                    $url = explode('/', $referal_url);
                    if ($url[1] == 'users' && $url[2] == 'add_new')
                        $this->redirect($referal_url);
                    else
                        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                }
            } else {
                $error = "Invalid Username / Password";
                $this->set('error', $error);
            }
        }
        $this->set('logins', $logins);
    }

    function email_reset($email = '') {

        $out = array('email' => '0');
        if ((isset($_REQUEST['email'])) && ($_REQUEST['email'] != "")) {

            $conditions = array("User.email" => $_REQUEST['email']);
            $find_customer = $this->User->find('first', array('conditions' => $conditions));
            //var_dump($_REQUEST['email'], $find_customer);
            //exit;
            if (!$find_customer) {
                $out = array("email" => '1');
            } else {

                //$new_password = substr(md5(uniqid(mt_rand(), true)), 0, 8);
                $new_password = substr(mt_rand(), 0, 8);
                //$hash_password = Security::hash(Configure::read('Security.salt').$new_password);
                $hash_password = $new_password;

                $this->User->updateAll(array(
                    'User.password' => '\'' . $hash_password . '\''), array(
                    'User.email' => $_REQUEST['email']
                        )
                );

                $to = $find_customer['User']['email'];
                //$to = 'rosen@grossmaninteractive.com';
                $subject = "New Password Credentials for Cellar-Book";

                $message = "Dear " . $find_customer['User']['username'] . '<br /><br />';
                $message .= 'As requested, we have reset your password for Cellar-Book. When you go to <a href="http://www.soutirage.com/">www.soutirage.com</a>, please use the following username and password to login:' . '<br /><br/>';
                $message .= 'Username: ' . $find_customer['User']['username'] . '<br/>';
                $message .= 'Password: ' . $hash_password . '<br/><br/>';
                $message .= 'If you haven\'t requested a new password or are having trouble logging in, please email us at <a href="mailto:support@soutirage.com">support@soutirage.com</a>.' . '<br /><br />';
                $message .= 'Best,' . '<br />';
                $message .= 'Cellar-Book Team' . '<br />';
                $headers = 'From: Cellar-Book <support@soutirage.com>' . "\r\n";
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                if (mail($to, $subject, $message, $headers)) {
                    $out = array("email" => '2');
                } else {
                    $out = array("email" => '3');
                }
            }
        }
        echo '{"status":' . json_encode($out) . '}';
        exit;
    }

    function getAdminTeam($a, $b) {
        $user = $this->Team->find('first', array('conditions' => "Team.username='" . $a . "' and Team.password='" . md5($b) . "'"));
        return $user;
    }

    public function index($sort = 'id', $direction = 'asc', $page = 1) {
        $this->checkteam();
        $cond = '';
        if ((isset($this->data['Teams']['search_submit'])) && ($this->data['Teams']['search_submit'] == '1')) {
            $search_submit = $this->data['Teams']['search_submit'];
            if ((isset($this->data['Teams']['search_name'])) && ($this->data['Teams']['search_name'] != '')) {
                $search_name = $this->data['Teams']['search_name'];

                $cond .= "(Team.username LIKE '%" . $search_name . "%')";
            }
        }

        $users = $this->Team->find('all', array(
            'limit' => 10, //int
            'page' => $page, //int
            'conditions' => array(
                $cond
            ),
            'order' => array(
                "Team.$sort" => $direction,
            ),
                ));
        $totalUsers = $this->Team->find('count');

        $this->set('currentUser', $this->Team->find('first', array('conditions' => array('Team.id' => $this->Session->read('team_id')))));

        $this->set('teams', $users);
        $this->set('sort', strtolower($sort));
        $this->set('direction', strtolower($direction));
        $this->set('page', $page);
        $this->set('totalPage', ceil($totalUsers / 10));
        $this->set(compact('users'));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->checkadmin();
        $this->layout = "admin";
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add_user() {
        //$this->checkteam();
        $this->checkadmin(); // session read
        //only super user allowed
        $currentUser = $this->Team->find('first', array('conditions' => array('Team.id' => $this->Session->read('team_id'))));

        if ($currentUser['Team']['super_user'] != 1)
            $this->redirect(array('controller' => 'Teams', 'action' => 'index'));

        $userType = array('1' => 'Admin', '2' => 'User');
        $this->set(compact('userType'));

        if ($this->request->is('post')) {
            $post = $this->data['Teams'];
            $data = array(
                'Team' => array(
                    'id' => '',
                    'username' => $post['username'],
                    'password' => md5($post['password']),
                    'email' => $post['email'],
                    'super_user' => $post['user_type'],
                )
            );
            $this->Team->create();
            if ($this->Team->save($data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'add_user'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Teams', 'action' => 'add_user'));

        $userType = array('1' => 'Admin', '2' => 'User');
        $this->set(compact('userType'));

        $this->checkadmin(); // session read

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        //$clients = $this->Team->find('first');

        $clients = $this->Team->find('first', array(
            'conditions' => array(
                'Team.id' => $id
            ),
                ));

        $this->set('client', $clients);
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Teams', 'action' => 'add_user'));

        $this->checkadmin();
        $this->Team->id = $id;
        if ($this->Team->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
            $this->Session->setFlash(__('User was not deleted'));
        } else {
            $this->Session->setFlash(__('Unable to remove user using the id.'));
        }
        $this->redirect(array('action' => 'index'));
    }

    function checkAdmin() {
        if ($this->Session->check('user_type') and ($this->Session->read('user_type') != 1)) //and ($this->Session->read('user_type') != 1)))
            $this->redirect(array('controller' => 'Appointments', 'action' => 'index'));
    }

}
