<?php

App::uses('AppController', 'Controller');

/**
 * @author RosenCS
 * @copyright 2012
 */
class UsersController extends AppController {

    var $name = 'Users';
    var $helpers = array('Html', 'Form');
    var $uses = array('User', 'Team', 'User_interest', 'Appointment', 'Product', 'Category', 'Image');

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

    public function index() {

        // checkpoint if team is logged in
        $this->checkteam();

        //$this->layout = "home";
    }

    public function edit($id = 0) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect('/');

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ($id != 0)) {
            $theuser = $this->User->findById($id);
            $this->set('theuser', $theuser);
        }
    }

    public function update() {

        // checkpoint if team is logged in
        $this->checkteam();

        //var_dump($this->data);
        //exit;
        if ((isset($this->data['Users'])) && (!empty($this->data['Users']))) {

            extract($this->data['Users']);
            $theuser['User']['id'] = $id;
            $theuser['User']['title'] = $title;
            $theuser['User']['firstname'] = $firstname;
            $theuser['User']['lastname'] = $lastname;
            $theuser['User']['email'] = $email;

            if ($this->User->save($theuser)) {
                $this->Session->setFlash(__('The User has been updated successfully!', true));
            } else {
                $this->Session->setFlash(__('Update faild!', true));
            }
        }

        $this->redirect("/");
    }

    public function add_new() {

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($this->data['Users'])) && (!empty($this->data['Users']))) {

            $flag = 0;
            
            $user = $this->data['Users'];

            if (!$user['title']) {
                $flag = 1;
                $this->set('title_error', 'Select title!');
            }

            if ($user['firstname'] == '') {
                $flag = 1;
                $this->set('firstname_error', 'First Name cannot be empty!');
            }

            if ($user["lastname"] == '') {
                $flag = 1;
                $this->set('lastname_error', 'Last Name cannot be empty!');
            }

            if ($user["email"] == '') {
                $flag = 1;
                $this->set('email_error', 'E-Mail cannot be empty!');
            }

            if ($flag == 0) {
                $theuser['User']['title'] = $user["title"];
                $theuser['User']['firstname'] = $user["firstname"];
                $theuser['User']['lastname'] = $user["lastname"];
                $theuser['User']['email'] = $user["email"];

                $this->User->create();
                if ($this->User->save($theuser)) {
                    $this->Session->setFlash(__('The User has been added successfully!', true));
                } else {
                    $this->Session->setFlash(__('Add New User faild!', true));
                }

                $this->redirect("/");
            }
        }
    }

    public function delete($id = 0) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect('/');

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ($id != 0)) {

            if ($this->User->delete($id)) {
                $this->Session->setFlash(__('User has been deleted successfully!', true));
            } else {
                $this->Session->setFlash(__('Delete faild!', true));
            }
        } else {
            $this->Session->setFlash(__('Invalid User id', true));
        }

        $this->redirect('/');
    }

    public function editInterested($id = 0) {

        //$this->layout = 'editInterested';

        //only able to be accessed via email submit
        if (empty($this->data)) {
            header('Location: http://www.honestinstall.com');
        }

        //email submit appointment_id will be 0
        if ($this->request->is('post')) {

            if (!empty($this->data['User']['appointment_id']))
                $appointmentId = $this->data['User']['appointment_id'];
            else
                $appointmentId = $this->data['appointment_id'];

            if (!empty($this->data['Appointment']['products']))
                $products = $this->data['Appointment']['products'];
            else
                $products = $this->data['product'];

            if ($this->data['key'] != md5($appointmentId))
                header('Location: http://www.honestinstall.com');
        }


        $appointment = $this->Appointment->findById($appointmentId);
        $this->User_interest->deleteAll(array('User_interest.appointment_id' => $appointmentId['appointment_id']), true);
        foreach ($products as $element => $value) {
            if (strpos($element, '-')) {
                $temp = explode("-", $element);
                $element = $temp[1];
            }
            $this->User_interest->set(array(
                'id' => '',
                'appointment_id' => $appointmentId,
                'user_id' => $appointment['Appointment']['user_id'],
                'product_id' => $element,
            ));
            if ($this->User_interest->save())
                $this->Session->setFlash(__('Your order has been updated successfully!', true));
        }
        $id = $appointmentId;



        $all_nodes = $this->Category->children(1);
        $parent_cat_ids = array();
        foreach ($all_nodes as $node) {
            if ($node['Category']['parent_id'] == '1') {
                $parent_cat_ids[] = $node;
                $parent_node[] = $node;
            }
        }

        if ((is_array($parent_cat_ids)) && (!empty($parent_cat_ids))) {

            $x = 0;
            foreach ($parent_cat_ids as $parent_cat_id) {
                $child_nodes[$parent_cat_id['Category']['id']]['ProductList'] = $this->__productNode($parent_cat_id['Category']['id']);
                if (isset($child_nodes[$parent_cat_id['Category']['id']]['ProductList'][$x]))
                    for ($counter = 0; $counter < (sizeof($child_nodes[$parent_cat_id['Category']['id']]['ProductList'][$x])); $counter++) {
                        if ($this->User_interest->findByProductId($child_nodes[$parent_cat_id['Category']['id']]['ProductList'][$x][$counter]['Product']['id'])) {
                            $child_nodes[$parent_cat_id['Category']['id']]['ProductList'][$x][$counter]['Product']['checked'] = 1;
                        } else {
                            $child_nodes[$parent_cat_id['Category']['id']]['ProductList'][$x][$counter]['Product']['checked'] = 0;
                        }
                    }
                $x++;
            }
        }

        //$this->set('products', $this->Product->find('all'));
        //$this->set('products', $listProduct);
        $this->set('id', $id);
        $this->set('parent_node', $parent_node);
        $this->set('child_nodes', $child_nodes);
        $this->set('key', $this->data['key']);
    }

    public function interested($sort = 'id', $direction = 'asc', $page = 1) {
        $isMailPost = false;
        $cond = "";
        if ((isset($this->data['Users']['search_id'])) && ($this->data['Users']['search_submit'] == '1')) {
            if ((isset($this->data['Users']['search_id'])) && ($this->data['Users']['search_id'] != '')) {
                $search_id = $this->data['Users']['search_id'];
                $cond .= "(User_interest.appointment_id LIKE '%" . $search_id . "%')";
            }
        } else if ($this->request->is('post')) {
            
        }

        if (($this->Session->read('team_id') == 0 or $this->Session->read('team_id') == null) and ($isMailPost == true))
            header('Location: https://honestinstall.com?m=true');
        /*
          $this->paginate = array(
          'limit' => 10,
          'order' => array(
          'User_interest.id' => 'DESC'
          ),
          'conditions' => array(
          $cond
          ),
          'fields' => array('User_interest.*', 'User.*', 'Product.*', 'Image.*'),
          'joins' => array(
          array(
          'table' => 'users',
          'alias' => 'User',
          'type' => 'LEFT',
          'conditions' => array(
          'User_interest.user_id = User.id'
          )
          ),
          array(
          'table' => 'products',
          'alias' => 'Product',
          'type' => 'LEFT',
          'conditions' => array(
          'User_interest.product_id = Product.id'
          )
          ),
          array(
          'table' => 'images',
          'alias' => 'Image',
          'type' => 'LEFT',
          'conditions' => array(
          'User_interest.product_id = Image.product_id'
          )
          ),
          )
          );
         * 
         */
        $_userInterests = $this->paginate('User_interest');
        $this->set('interests', $_userInterests);

        $sort = strtolower($sort);
        if ($sort == 'appointment_id')
            $order = array("User_interest.$sort" => $direction);
        else if ($sort == 'firstname')
            $order = array("User.$sort" => $direction);
        else if ($sort == 'email')
            $order = array("User.$sort" => $direction);
        else
            $order = array("Product.name" => $direction);

        $userInterests = $this->User_interest->find('all', array(
            'limit' => 10, //int
            'page' => $page, //int
            'order' => $order,
            'conditions' => $cond,
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'User_interest.user_id = User.id'
                    )
                ),
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'User_interest.product_id = Product.id'
                    )
                ),
                array(
                    'table' => 'images',
                    'alias' => 'Image',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'User_interest.product_id = Image.product_id'
                    )
                ),
            ),
            'fields' => array('User_interest.*', 'User.*', 'Product.*', 'Image.*'),
                ));

        $totalUserInterests = $this->User_interest->find('count');
        $this->set('sort', strtolower($sort));
        $this->set('direction', strtolower($direction));
        $this->set('page', $page);
        $this->set('totalPage', ceil($totalUserInterests / 10));

        $this->set('interests', $userInterests);
    }

    private function __productNode($cid = 1) {

        $allChildren = $this->Category->children($cid);

        $category_parent = $this->Category->query('SELECT Category.* FROM categories AS Category WHERE Category.id = ' . $cid);

        $allChildren = array_merge($category_parent, $allChildren);
        //$allChildren = $this->Category->children(13);
        //var_dump($allChildren);
        //exit;


        $products = array();
        foreach ($allChildren as $children) {
            //var_dump($children);
            $allproducts = $this->Product->find('all', array(
                'conditions' => array('Product.category_id = ' . $children['Category']['id']),
                'fields' => array('Product.*', 'Category.*'),
                'joins' => array(
                    array(
                        'table' => 'categories',
                        'alias' => 'Category',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Product.category_id = Category.id'
                        )
                    )
                ),
                'order' => array(
                    'Product.id' => 'DESC'
                )
                    ));

            if ((is_array($allproducts)) && (!empty($allproducts))) {

                $i = 0;
                foreach ($allproducts as $product) {
                    $product_id = $product['Product']['id'];

                    $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
                    $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

                    if (!empty($picture_main)) {
                        $allproducts[$i]['Image'] = array('name' => $picture_main['Image']['name']);
                    } else if (!empty($picture_subs)) {
                        $allproducts[$i]['Image'] = array('name' => $picture_subs['Image']['name']);
                    } else {
                        $allproducts[$i]['Image'] = array('name' => 'no_image.gif');
                    }
                    $i++;
                }
            }

            if (!empty($allproducts))
                $products[] = $allproducts;
        }

        return $products;
    }

}

?>