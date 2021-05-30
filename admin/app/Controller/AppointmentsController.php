<?php

//App::import('Helper', 'DatePicker');
App::uses('CakeEmail', 'Network/Email');

/**
 * @author RosenCS
 * @copyright 2012
 */
class AppointmentsController extends AppController {

    var $name = 'Appointments';
    var $helpers = array('Html', 'Form');
    var $uses = array('Appointment_visitor', 'Appointment', 'User', 'Product', 'Category', 'Image', 'Subject', 'Email_template');

    public function confirm($id = null) {
        $appointment = $this->Appointment_visitor->findById($id);
//----------------------------------------------
        if ($id == 0 and ($this->request->is('post') == false))
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));

        $this->checkteam();

        $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));

//submit email
        if ((isset($this->data['Appointment']['add_appointment'])) && ($this->data['Appointment']['add_appointment'] == '1')) {

//selected products from email preview
            if (isset($this->data['Appointment']['preview_products'])) {
                $temp = explode(',', $this->data['Appointment']['preview_products']);
                foreach ($temp as $data) {
                    $a = explode('[products]', $data);
                    $b = explode(']', $a[1]);
                    $c = ltrim($b[0], '[');
                    $products[] = $c;
                }
            }

            $flag = 0;
            $cakemail = new CakeEmail();
            $bccemail = array();
            $appointment = array();

            $subject = $this->data['Appointment']['subject'];
            $email = $user["User"]["email"];
            $bcc_email = $this->data['Appointment']['bcc_email'];
            $other_bccs = $this->data['Appointment']['other_bccs'];
            $title = $this->data['Appointment']['title'];
            $service = $this->data['Appointment']['service'];
            $date_appointment = $this->data['Appointment']['date_appointment'];
            $time_in = $this->data['time_in'];
            $time_out = $this->data['time_out'];
            $comment = $this->data['Appointment']['comment'];
            $appointment['Appointment']['email'] = $email;
            $user_id = $this->User->findByEmail($email);

            $contentTemplate = $this->Email_template->find('first');
            $placeholders = array(
                '|title|',
                '|lastname|',
                '|service|',
                '|date_appointment|',
                '|time_in|',
            );
            $vals = array(
                $title,
                $user['User']['lastname'],
                $service,
                $date_appointment,
                $time_in,
            );

            $content = str_replace($placeholders, $vals, $contentTemplate['Email_template']['content']);

            if (empty($user_id)) {

                $flag = 1;
                $this->set('email_error', 'There is no customer with this E-mail address!');
            } else if (!empty($user_id)) {


                if ((!empty($user_id)) && (isset($subscription))) {
                    $appointment['Appointment']['user_id'] = $user_id['User']['id'];
                    $userupdate['User']['id'] = $user_id['User']['id'];
                    $userupdate['User']['subscription'] = $subscription;
                    $this->User->saveAll($userupdate);
                }

                $appointment['Appointment']['subject'] = $subject;

                if (isset($other_emails)) {
                    $appointment['Appointment']['other_emails'] = $other_emails;
                    if ($array_other_emails = explode(',', $other_emails)) {
                        foreach ($array_other_emails as $each_other_email) {
                            $each_other_email = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_email);

                            if ($this->isValidEmail($each_other_email)) {
                                $ccemail[] = $each_other_email;
                            }
                        }
                        $cakemail->cc($ccemail);
                    }
                }

                if (($bcc_email != '') && ($this->isValidEmail($bcc_email))) {
                    $appointment['Appointment']['bcc_email'] = $bcc_email;
                    $bccemail[] = $bcc_email;
                }

                if ($other_bccs) {
                    $appointment['Appointment']['other_bccs'] = $other_bccs;
                    if ($array_other_bccs = explode(',', $other_bccs)) {
                        foreach ($array_other_bccs as $each_other_bccs) {
                            $each_other_bccs = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_bccs);

                            if ($this->isValidEmail($each_other_bccs)) {
                                $bccemail[] = $each_other_bccs;
                            }
                        }
                    }
                }
                if (!empty($bccemail)) {
                    $cakemail->bcc($bccemail);
                }

                $appointment['Appointment']['service'] = $service;
                $appointment['Appointment']['date_appointment'] = date('Y-m-d', strtotime($date_appointment));
                $appointment['Appointment']['time_in'] = $time_in;
                $appointment['Appointment']['time_out'] = $time_out;
                if ($comment) {
                    $appointment['Appointment']['comment'] = $comment;
                }

                $productstoemail = array();

                if ((isset($this->data['Appointment']['products'])) && (!empty($this->data['Appointment']['products'])) || !empty($products)) {
                    if (!empty($products)) {
                        $appointment['Appointment']['products'] = serialize($products);
                        $data = $products;
                    } else {
                        $appointment['Appointment']['products'] = serialize($this->data['Appointment']['products']);
                        $data = $this->data['Appointment']['products'];
                    }

                    $x = 0;

                    foreach ($data as $prodkey => $prodval) {
                        $catid_array = explode('-', $prodkey);
                        $catid = $catid_array[0];
                        $cond = "Product.id = " . $prodval . " AND Product.category_id = " . $catid . "";
                        $conditions = array(
                            'order' => array(
                                'Product.name' => 'ASC'
                            ),
                            'contain' => '',
                            'conditions' => array(
                                $cond
                            ),
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
                            )
                        );

                        $theproduct = $this->Product->find('first', $conditions);

                        $imgprod = $theproduct;

                        $product_id = $imgprod['Product']['id'];

                        $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
                        $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

                        if (!empty($picture_main)) {
                            $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else if (!empty($picture_subs)) {
                            $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else {
                            $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
                        }

                        $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
                        $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
                        $x++;
                    }
                }

                $appointment['Appointment']['date_added'] = date('Y-m-d H:i:s');
                $appointment['Appointment']['date_updated'] = date('Y-m-d H:i:s');
                $appointment['Appointment']['user_id'] = $user['User']['id'];

                if ($this->Appointment->save($appointment)) {
                    $success = true;

                    $cakemail->to($email);
                    $cakemail->from(array('noreply@honestinstall.com' => 'Honestinstall'));
                    $cakemail->config('default');
                    $cakemail->subject('HonestInstall - Appointment Confirmation');
                    $viewVars = array();
                    $viewVars['form_url'] = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/editInterested/0';
                    $viewVars['uid'] = $user_id['User']['id'];
                    $viewVars['lastname'] = $user_id['User']['lastname'];
                    $viewVars['date'] = date('D, M j, Y', strtotime($date_appointment));
                    $viewVars['subject'] = $subject;
                    $viewVars['time_in'] = date('g:i a', strtotime($time_in));
                    $viewVars['time_out'] = date('g:i a', strtotime($time_out));
                    $viewVars['service'] = $service;
                    $viewVars['comment'] = $comment;
                    $viewVars['productstoemail'] = $productstoemail;
                    $viewVars['appointment_id'] = $this->Appointment->getInsertID();
                    $viewVars['key'] = md5($this->Appointment->getInsertID());
                    $viewVars['title'] = $content;
                    $cakemail->template('Email.testing');

                    $cakemail->viewVars($viewVars);
                    if ($cakemail->send()) {
                        $this->Session->setFlash('<span style="color:red;">Your Appointment Message has been sent successfully!</span>');
                        $this->redirect(array('controller' => 'appointments', 'action' => '/'));
                    }
                }
            }
        }

// all category parent nodes - no child
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
                $x++;
            }
        }

        $subjects = $this->Subject->find('list');
        $this->set(compact('subjects'));
        $this->set('user_id', $id);
        $this->set('child_nodes', $child_nodes);
        $this->set('parent_node', $parent_node);
        $this->set('data', $appointment);
        $this->set('id', $id);
    }

    public function visitors($index = 'all') {
        $appointments = $this->Appointment_visitor->find('all', array('order' => array('Appointment_visitor.input_time DESC', 'Appointment_visitor.id DESC'),));
        $this->set(compact('appointments'));
    }

    public function deleteVisitor($id = 0) {
        $this->Appointment_visitor->delete($id, true);
        $this->Session->setFlash('<span style="color:red;">The confirmation has been removed successfully.</span>');
        $this->redirect(array('controller' => 'appointments', 'action' => 'visitors'));
    }

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
        $cond = '';
        if ((isset($this->data['Appointments']['search_submit'])) && ($this->data['Appointments']['search_submit'] == '1')) {
            $search_submit = $this->data['Appointments']['search_submit'];

            if ((isset($this->data['Appointments']['appointment'])) && ($this->data['Appointments']['appointment'] != '')) {
                $search_appointment = $this->data['Appointments']['appointment'];

                $cond .= "(";
                $cond .= "	User.firstname LIKE '%" . $search_appointment . "%' OR ";
                $cond .= "	User.lastname LIKE '%" . $search_appointment . "%' OR ";
                $cond .= "	User.email LIKE '%" . $search_appointment . "%' OR ";
                $cond .= "	Appointment.subject LIKE '%" . $search_appointment . "%' OR ";
                $cond .= "	Appointment.service LIKE '%" . $search_appointment . "%'";
                $cond .= ")";
            }
        }

        if ($index == 'all') {
            $this->paginate = array(
                'limit' => 10,
                'order' => array(
                    'Appointment.id' => 'DESC'
                ),
                'conditions' => array(
                    $cond
                ),
                'fields' => array('Appointment.*', 'User.*'),
                'joins' => array(
                    array(
                        'table' => 'users',
                        'alias' => 'User',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Appointment.user_id = User.id'
                        )
                    )
                )
            );
        } else {
            $this->paginate = array(
                'limit' => 10,
                'order' => array(
                    'Appointment.id' => 'DESC'
                ),
                'conditions' => array(
                    'Appointment.user_id = ' => $index
                ),
                'fields' => array('Appointment.*', 'User.*'),
                'joins' => array(
                    array(
                        'table' => 'users',
                        'alias' => 'User',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Appointment.user_id = User.id'
                        )
                    )
                )
            );
        }
        $_appointments = $this->paginate('Appointment');
        $x = 0;
        foreach ($_appointments as $appointment) {

            if (strlen($appointment['Appointment']['subject']) > 10) {
                $appointment['Appointment']['mo_subject'] = $appointment['Appointment']['subject'];
                $one_subject = substr($appointment['Appointment']['subject'], 0, 3);
                $two_subject = substr($appointment['Appointment']['subject'], -3);
                $appointment['Appointment']['subject'] = $one_subject . '...' . $two_subject;
            } else {
                $appointment['Appointment']['mo_subject'] = '';
            }

            if (strlen($appointment['User']['firstname']) > 12) {
                $appointment['User']['mo_firstname'] = $appointment['User']['firstname'];
                $one_subject = substr($appointment['User']['firstname'], 0, 5);
                $two_subject = substr($appointment['User']['firstname'], -4);
                $appointment['User']['firstname'] = $one_subject . '...' . $two_subject;
            } else {
                $appointment['User']['mo_firstname'] = '';
            }

            if (strlen($appointment['User']['lastname']) > 12) {
                $appointment['User']['mo_lastname'] = $appointment['User']['lastname'];
                $one_subject = substr($appointment['User']['lastname'], 0, 5);
                $two_subject = substr($appointment['User']['lastname'], -4);
                $appointment['User']['lastname'] = $one_subject . '...' . $two_subject;
            } else {
                $appointment['User']['mo_lastname'] = '';
            }

            $appointments[$x] = $appointment;
            $x++;
        }

        $this->set(compact('appointments'));
    }

    public function add_test() {
        $this->layout = 'appointments_test';

        $this->data = array(
            "time_in" => "09:30 am",
            "time_out" => "02:30 pm",
            "Appointment" => array(
                "add_appointment" => "1",
                "subject" => "Test Subject",
                "subscription" => "N",
                "email" => "php.proper@gmail.com",
                "other_emails" => "",
                "bcc_email" => "bcc@rosen.com",
                "other_bccs" => "",
                "title" => "Mr.",
                "service" => "Service Call",
                "date_appointment" => "03/14/2012",
                "time_in" => "9:30",
                "time_out" => "14:30",
                "comment" => "comments here, comments here, comments here, comments herecomments here, comments here, comments here, comments herecomments here, comments here, comments here, comments here",
                "products" => array(
                    "2-7" => "7",
                    "4-13" => "13",
                    "2-8" => "8",
                    "2-12" => "12",
                    "2-9" => "9"
                )
            )
        );

        if ((isset($this->data['Appointment']['add_appointment'])) && ($this->data['Appointment']['add_appointment'] == '1')) {
            $flag = 0;
            $cakemail = new CakeEmail();
            $bccemail = array();
            $appointment = array();

            $subject = $this->data['Appointment']['subject'];
            $subscription = $this->data['Appointment']['subscription'];
            $email = $this->data['Appointment']['email'];
            $other_emails = $this->data['Appointment']['other_emails'];
            $bcc_email = $this->data['Appointment']['bcc_email'];
            $other_bccs = $this->data['Appointment']['other_bccs'];
            $title = $this->data['Appointment']['title'];
            $service = $this->data['Appointment']['service'];
            $date_appointment = $this->data['Appointment']['date_appointment'];
            $time_in = $this->data['Appointment']['time_in'];
            $time_out = $this->data['Appointment']['time_out'];
            $comment = $this->data['Appointment']['comment'];
            $appointment['Appointment']['email'] = $email;
            $user_id = $this->User->findByEmail($email);

            if (empty($user_id)) {

                $flag = 1;
                $this->set('email_error', 'There is no customer with this E-mail address!');
            } else if (!empty($user_id)) {

                $appointment['Appointment']['user_id'] = $user_id['User']['id'];
                $userupdate['User']['id'] = $user_id['User']['id'];
                $userupdate['User']['subscription'] = $subscription;
//$this->User->saveAll($userupdate);


                $appointment['Appointment']['subject'] = $subject;

                if ($other_emails) {
                    $appointment['Appointment']['other_emails'] = $other_emails;
                    if ($array_other_emails = explode(',', $other_emails)) {
                        foreach ($array_other_emails as $each_other_email) {
                            $each_other_email = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_email);

                            if ($this->isValidEmail($each_other_email)) {
                                $ccemail[] = $each_other_email;
                            }
                        }
                        $cakemail->cc($ccemail);
                    }
                }

                if (($bcc_email != '') && ($this->isValidEmail($bcc_email))) {
                    $appointment['Appointment']['bcc_email'] = $bcc_email;
                    $bccemail[] = $bcc_email;
                }

                if ($other_bccs) {
                    $appointment['Appointment']['other_bccs'] = $other_bccs;
                    if ($array_other_bccs = explode(',', $other_bccs)) {
                        foreach ($array_other_bccs as $each_other_bccs) {
                            $each_other_bccs = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_bccs);

                            if ($this->isValidEmail($each_other_bccs)) {
                                $bccemail[] = $each_other_bccs;
                            }
                        }
                    }
                }
                if (!empty($bccemail)) {
                    $cakemail->bcc($bccemail);
                }

                $appointment['Appointment']['service'] = $service;
                $appointment['Appointment']['date_appointment'] = date('Y-m-d', strtotime($date_appointment));
                $appointment['Appointment']['time_in'] = $time_in;
                $appointment['Appointment']['time_out'] = $time_out;
                if ($comment) {
                    $appointment['Appointment']['comment'] = $comment;
                }

                $productstoemail = array();

                if ((isset($this->data['Appointment']['products'])) && (!empty($this->data['Appointment']['products']))) {
                    $appointment['Appointment']['products'] = serialize($this->data['Appointment']['products']);

                    $x = 0;
                    foreach ($this->data['Appointment']['products'] as $prodkey => $prodval) {
                        $catid_array = explode('-', $prodkey);
                        $catid = $catid_array[0];

                        $cond = "Product.id = " . $prodval . " AND Product.category_id = " . $catid . "";
                        $conditions = array(
                            'order' => array(
                                'Product.name' => 'ASC'
                            ),
                            'contain' => '',
                            'conditions' => array(
                                $cond
                            ),
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
                            )
                        );

                        $theproduct = $this->Product->find('first', $conditions);

                        $imgprod = $theproduct;

                        $product_id = $imgprod['Product']['id'];

                        $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
                        $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

                        if (!empty($picture_main)) {
                            $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else if (!empty($picture_subs)) {
                            $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else {
                            $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
                        }

                        $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
                        $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
                        $x++;
                    }
                }

                $appointment['Appointment']['date_added'] = date('Y-m-d H:i:s');
                $appointment['Appointment']['date_updated'] = date('Y-m-d H:i:s');



                $this->set('form_url', 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/interested');
                $this->set('uid', $user_id['User']['id']);
                $this->set('title', $user_id['User']['title']);
                $this->set('lastname', $user_id['User']['lastname']);
                $this->set('date', date('l, M j-S, Y', strtotime($date_appointment)));
                $this->set('subject', $subject);
                $this->set('title', $title);
                $this->set('time_in', date('g:i a', strtotime($time_in)));
                $this->set('time_out', date('g:i a', strtotime($time_out)));
                $this->set('service', $service);
                $this->set('comment', $comment);
                $this->set('productstoemail', $productstoemail);
            }
        }
    }

    function editEmail() {
        if ($this->request->is('post')) {

            $data = array(
                'Email_template' => array(
                    'id' => '1',
                    'content' => $this->data['Appointment']['content'],
                )
            );
            $this->Email_template->create();
            $this->Email_template->save($data);
        }
//id 1 for email editor template
        $this->set('contentTemplate', $this->Email_template->findById(1));
    }

    function editEmailConfirmation() {
        if (!empty($this->data)) {
            $data = array(
                'Email_template' => array(
                    'id' => '2',
                    'content' => $this->data['email']['content'],
                )
            );
            $this->Email_template->create();
            $this->Email_template->save($data);
            $this->Session->setFlash('<span style="color:red;">Email content has edited.</span>');
        }
//id 2 for visitor email configuration
        $this->set('contentTemplate', $this->Email_template->findById(2));
    }

    function editEmailPreview() {
        if (!$_POST)
            $this->redirect(array('controller' => 'appointments', 'action' => 'editEmail'));

//example data
        $products = array('2-16', '3-17');

        $x = 0;
        foreach ($products as $product) {
            $catid_array = explode('-', $product);
            $catid = $catid_array[0];
            $prodId = $catid_array[1];

            $cond = "Product.id = " . $prodId . " AND Product.category_id = " . $catid . "";
            $conditions = array(
                'order' => array(
                    'Product.name' => 'ASC'
                ),
                'contain' => '',
                'conditions' => array(
                    $cond
                ),
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
                )
            );

            $theproduct = $this->Product->findById(1, $conditions);

            $imgprod = $theproduct;

            $product_id = $imgprod['Product']['id'];

            $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
            $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

            if (!empty($picture_main)) {
                $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else if (!empty($picture_subs)) {
                $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else {
                $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
            }

            $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
            $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
            $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
            $x++;
        }

        $this->set('productstoemail', $productstoemail);

        $placeholders = array(
            '|title|',
            '|lastname|',
            '|service|',
            '|date_appointment|',
            '|time_in|',
        );
        $vals = array(
            'Mr. ',
            'Honest',
            'Service Call',
            '05/21/2013',
            '10:00 am',
        );

        $content = str_replace($placeholders, $vals, $_POST['data']['Appointment']['preview_content']);
        $this->set('content', $content);
    }

    public function preview() {
        if ($this->request->is('post') == false)
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));

        $temp = explode(',', $this->data['preview_products']);
        foreach ($temp as $data) {
            $a = explode('[products]', $data);
            $b = explode(']', $a[1]);
            $c = ltrim($b[0], '[');
            $products[] = $c;
        }

//var_dump($products);
//exit();

        $x = 0;
        foreach ($products as $product) {
            $catid_array = explode('-', $product);
            $catid = $catid_array[0];
            $prodId = $catid_array[1];

            $cond = "Product.id = " . $prodId . " AND Product.category_id = " . $catid . "";
            $conditions = array(
                'order' => array(
                    'Product.name' => 'ASC'
                ),
                'contain' => '',
                'conditions' => array(
                    $cond
                ),
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
                )
            );

            $theproduct = $this->Product->find('first', $conditions);

            $imgprod = $theproduct;

            $product_id = $imgprod['Product']['id'];

            $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
            $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

            if (!empty($picture_main)) {
                $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else if (!empty($picture_subs)) {
                $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else {
                $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
            }

            $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
            $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
            $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
            $x++;
        }

        $user = $this->User->find('first', array('conditions' => array('User.id' => $this->data['user_id'])));

//getting template
        $contentTemplate = $this->Email_template->find('first');
        $placeholders = array(
            '|title|',
            '|lastname|',
            '|service|',
            '|date_appointment|',
            '|time_in|',
        );
        $vals = array(
            $this->data['preview_title'],
            $user['User']['lastname'],
            $this->data['preview_service'],
            $this->data['preview_date'],
            $this->data['preview_time_in'],
        );

        $content = str_replace($placeholders, $vals, $contentTemplate['Email_template']['content']);
        $this->set('content', $content);

        $result = $this->Appointment->query("SELECT MAX(ID) FROM Appointments");
        $this->set('subject', $this->data['preview_subject']);
        $this->set('date_appointment', $this->data['preview_date']);
        $this->set('title', $this->data['preview_title']);
        $this->set('lastname', $user['User']['lastname']);
        $this->set('time_in', $this->data['preview_time_in']);
        $this->set('time_out', $this->data['preview_time_out']);
        $this->set('service', $this->data['preview_service']);
        $this->set('comment', $this->data['preview_comment']);
        $this->set('appointment_id', ($result[0][0]["MAX(ID)"] + 1));
        $this->set('productstoemail', $productstoemail);
        $this->set('form_url', 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/editInterested/0');
        $this->set('uid', $user['User']['id']);
        $this->set('email', $user["User"]["email"]);
        $this->set('bcc_email', $this->data['preview_bcc']);
        $this->set('other_bccs', $this->data['preview_other_bcc']);
        $this->set('key', md5(($result[0][0]["MAX(ID)"] + 1)));
        $this->set('preview_products', $this->data['preview_products']);
    }

    public function previewConfirm($id = 0) {
        if ($this->request->is('post') == false)
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));

        if (isset($this->data['Appointment']['products']))
            foreach ($this->data['Appointment']['products'] as $key => $value)
                $products[] = $key;

        $x = 0;
        foreach ($products as $product) {
            $catid_array = explode('-', $product);
            $catid = $catid_array[0];
            $prodId = $catid_array[1];

            $cond = "Product.id = " . $prodId . " AND Product.category_id = " . $catid . "";
            $conditions = array(
                'order' => array(
                    'Product.name' => 'ASC'
                ),
                'contain' => '',
                'conditions' => array(
                    $cond
                ),
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
                )
            );

            $theproduct = $this->Product->find('first', $conditions);

            $imgprod = $theproduct;

            $product_id = $imgprod['Product']['id'];

            $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
            $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

            if (!empty($picture_main)) {
                $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else if (!empty($picture_subs)) {
                $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else {
                $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
            }

            $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
            $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
            $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
            $x++;
        }

//$user = $this->User->find('first', array('conditions' => array('User.id' => $this->data['user_id'])));
        $firstname = $this->data['firstname'];
        $lastname = $this->data['lastname'];
        $firstPreferenceDate = $this->data["Appointment"]['date_appointment'];
        $firstPreferenceTime = $this->data['time_in'];
        $secondPreferenceDate = $this->data["Appointment"]['date_appointment2'];
        $secondPreferenceTime = $this->data['time_out'];
        $title = $this->data ["Appointment"]['title'];

        $content = "
        
$title $firstname $lastname, <br/><br/>

Thank you for booking your contacting us. <br/><br/>

We have you scheduled for: <br/><br/>

First preference date: $firstPreferenceDate ARRIVAL: $firstPreferenceTime <br/>
Second preference date: $secondPreferenceDate ARRIVAL: $secondPreferenceTime <br/><br/>

See you then, if you have any questions please contact us: 972-470-3528 <br/><br/>

-Honest Install | Service Team.        

        ";

        $this->set('content', $content);
        $this->set('subject', 'Honest Install - Appointment Confirmation');
        $this->set('title', $title);
        $this->set('productstoemail', $productstoemail);
        $this->set('form_url', 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/editInterested/0');
        $this->set('email', $this->data['email']);
        $this->set('id', $id);
    }

    public function add_new($id = 0) {
//$this->layout = 'appointments';
//----------------------------------------------
        if ($id == 0 and ($this->request->is('post') == false))
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));

        $this->checkteam();

        $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));

//submit email
        if ((isset($this->data['Appointment']['add_appointment'])) && ($this->data['Appointment']['add_appointment'] == '1')) {

//selected products from email preview
            if (isset($this->data['Appointment']['preview_products'])) {
                $temp = explode(',', $this->data['Appointment']['preview_products']);
                foreach ($temp as $data) {
                    $a = explode('[products]', $data);
                    $b = explode(']', $a[1]);
                    $c = ltrim($b[0], '[');
                    $products[] = $c;
                }
            }

            $flag = 0;
            $cakemail = new CakeEmail();
            $bccemail = array();
            $appointment = array();

            $subject = $this->data['Appointment']['subject'];
            $email = $user["User"]["email"];
            $bcc_email = $this->data['Appointment']['bcc_email'];
            $other_bccs = $this->data['Appointment']['other_bccs'];
            $title = $this->data['Appointment']['title'];
            $service = $this->data['Appointment']['service'];
            $date_appointment = $this->data['Appointment']['date_appointment'];
            $time_in = $this->data['time_in'];
            $time_out = $this->data['time_out'];
            $comment = $this->data['Appointment']['comment'];
            $appointment['Appointment']['email'] = $email;
            $user_id = $this->User->findByEmail($email);

            $contentTemplate = $this->Email_template->find('first');
            $placeholders = array(
                '|title|',
                '|lastname|',
                '|service|',
                '|date_appointment|',
                '|time_in|',
            );
            $vals = array(
                $title,
                $user['User']['lastname'],
                $service,
                $date_appointment,
                $time_in,
            );

            $content = str_replace($placeholders, $vals, $contentTemplate['Email_template']['content']);

            if (empty($user_id)) {

                $flag = 1;
                $this->set('email_error', 'There is no customer with this E-mail address!');
            } else if (!empty($user_id)) {


                if ((!empty($user_id)) && (isset($subscription))) {
                    $appointment['Appointment']['user_id'] = $user_id['User']['id'];
                    $userupdate['User']['id'] = $user_id['User']['id'];
                    $userupdate['User']['subscription'] = $subscription;
                    $this->User->saveAll($userupdate);
                }

                $appointment['Appointment']['subject'] = $subject;

                if (isset($other_emails)) {
                    $appointment['Appointment']['other_emails'] = $other_emails;
                    if ($array_other_emails = explode(',', $other_emails)) {
                        foreach ($array_other_emails as $each_other_email) {
                            $each_other_email = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_email);

                            if ($this->isValidEmail($each_other_email)) {
                                $ccemail[] = $each_other_email;
                            }
                        }
                        $cakemail->cc($ccemail);
                    }
                }

                if (($bcc_email != '') && ($this->isValidEmail($bcc_email))) {
                    $appointment['Appointment']['bcc_email'] = $bcc_email;
                    $bccemail[] = $bcc_email;
                }

                if ($other_bccs) {
                    $appointment['Appointment']['other_bccs'] = $other_bccs;
                    if ($array_other_bccs = explode(',', $other_bccs)) {
                        foreach ($array_other_bccs as $each_other_bccs) {
                            $each_other_bccs = str_replace(array("\r\n", "\r", "\n", "\t"), '', $each_other_bccs);

                            if ($this->isValidEmail($each_other_bccs)) {
                                $bccemail[] = $each_other_bccs;
                            }
                        }
                    }
                }
                if (!empty($bccemail)) {
                    $cakemail->bcc($bccemail);
                }

                $appointment['Appointment']['service'] = $service;
                $appointment['Appointment']['date_appointment'] = date('Y-m-d', strtotime($date_appointment));
                $appointment['Appointment']['time_in'] = $time_in;
                $appointment['Appointment']['time_out'] = $time_out;
                if ($comment) {
                    $appointment['Appointment']['comment'] = $comment;
                }

                $productstoemail = array();

                if ((isset($this->data['Appointment']['products'])) && (!empty($this->data['Appointment']['products'])) || !empty($products)) {
//var_dump($products);
//exit();
                    if (!empty($products)) {
                        $appointment['Appointment']['products'] = serialize($products);
                        $data = $products;
                    } else {
                        $appointment['Appointment']['products'] = serialize($this->data['Appointment']['products']);
                        $data = $this->data['Appointment']['products'];
                    }

                    $x = 0;

//                    foreach ($this->data['Appointment']['products'] as $prodkey => $prodval) {
                    foreach ($data as $prodkey => $prodval) {
                        $catid_array = explode('-', $prodkey);
                        $catid = $catid_array[0];
                        $cond = "Product.id = " . $prodval . " AND Product.category_id = " . $catid . "";
                        $conditions = array(
                            'order' => array(
                                'Product.name' => 'ASC'
                            ),
                            'contain' => '',
                            'conditions' => array(
                                $cond
                            ),
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
                            )
                        );

                        $theproduct = $this->Product->find('first', $conditions);

                        $imgprod = $theproduct;

                        $product_id = $imgprod['Product']['id'];

                        $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
                        $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

                        if (!empty($picture_main)) {
                            $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else if (!empty($picture_subs)) {
                            $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
                        } else {
                            $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
                        }

                        $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
                        $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
                        $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
                        $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
                        $x++;
                    }
                }

                $appointment['Appointment']['date_added'] = date('Y-m-d H:i:s');
                $appointment['Appointment']['date_updated'] = date('Y-m-d H:i:s');
                $appointment['Appointment']['user_id'] = $user['User']['id'];

                if ($this->Appointment->save($appointment)) {
                    $success = true;

                    $cakemail->to($email);
                    $cakemail->from(array('noreply@honestinstall.com' => 'Honestinstall'));
                    $cakemail->config('default');
                    $cakemail->subject('HonestInstall - Appointment Confirmation');
                    $viewVars = array();
                    $viewVars['form_url'] = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/editInterested/0';
                    $viewVars['uid'] = $user_id['User']['id'];
                    $viewVars['lastname'] = $user_id['User']['lastname'];
                    $viewVars['date'] = date('D, M j, Y', strtotime($date_appointment));
                    $viewVars['subject'] = $subject;
                    $viewVars['time_in'] = date('g:i a', strtotime($time_in));
                    $viewVars['time_out'] = date('g:i a', strtotime($time_out));
                    $viewVars['service'] = $service;
                    $viewVars['comment'] = $comment;
                    $viewVars['productstoemail'] = $productstoemail;
                    $viewVars['appointment_id'] = $this->Appointment->getInsertID();
                    $viewVars['key'] = md5($this->Appointment->getInsertID());
                    $viewVars['title'] = $content;
                    $cakemail->template('Email.testing');

                    $cakemail->viewVars($viewVars);
                    if ($cakemail->send()) {
                        $this->Session->setFlash('<span style="color:red;">Your Appointment Message has been sent successfully!</span>');
                        $this->redirect(array('controller' => 'appointments', 'action' => '/'));
                    }
                }
            }
        }

// all category parent nodes - no child
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
                $x++;
            }
        }

        $subjects = $this->Subject->find('list');
        $this->set(compact('subjects'));
        $this->set('user_id', $id);
        $this->set('child_nodes', $child_nodes);
        $this->set('parent_node', $parent_node);
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

    private function __productNode_TEST($cid = 1, $products = array()) {

        var_dump($products);
//echo 'SELECT Category.* FROM categories AS Category WHERE Category.parent_id = '.$cid;
//echo "\n\n";

        $allproducts = $this->Product->find('all', array(
            'conditions' => array('Product.category_id = ' . $cid),
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

//var_dump($allproducts);

        if ((is_array($allproducts)) && (!empty($allproducts))) {

//$allproducts = $products;
            $i = 0;
//$product = array();
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

//var_dump($allproducts);

        if (!empty($allproducts)) {
            foreach ($allproducts as $singleproduct) {
//var_dump($singleproduct);
//$products[] = $singleproduct;
            }
        }

//$products[] = $allproducts;
        if (!empty($allproducts))
            $products[] = $allproducts;
        $category_childrens = $this->Category->query('SELECT Category.* FROM categories AS Category WHERE Category.parent_id = ' . $cid);

        if ((is_array($category_childrens)) && (!empty($category_childrens))) {
            var_dump($products);
            echo "\n\n";
            foreach ($category_childrens as $category_children) {
                $this->__productNode($category_children['Category']['id'], $products);
            }
        }
        return $products;
    }

    public function view($id = null) {
        $this->checkteam();
        $appointment = $this->Appointment->findById($id);
        $this->set('user', $this->User->findById($appointment['Appointment']['user_id']));
        $this->set('data', $appointment);
    }

    function mail_back($id = 0) {
        $appointment = $this->Appointment->find('first', array(
            'conditions' => array('Appointment.id' => $id, 'Appointment.mail_back' => 0)
        ));
        if ($appointment) {
            $this->Appointment->id = $id;
            $this->Appointment->set(array(
                'mail_back' => 1,
            ));
            $this->Appointment->save();

            $to = "gerrysabar@gmail.com";
            $subject = "Appointment complain";
            $message = "Hello! \n 
            A customer with appoinment id: $id just click notification that the email doesn't belong to him/her. \n\n\n
            
            Honest Install Autoresponder.";
            $from = "noreply@honestinstall.com";
            $headers = "From:" . "Honest Install System";
            mail($to, $subject, $message, $headers);
        }
    }

    function email_visitor() {
        $data = array(
            'Appointment_visitor' => array(
                'id' => $this->data['Appointment']['id'],
                'status_confirm' => 1,
            )
        );

        $productstoemail = array();

        $x = 0;

        foreach ($this->data['products'] as $prodval => $prodkey) {
            $cond = "Product.id = " . $prodval . " AND Product.category_id = " . $prodkey . "";
            $conditions = array(
                'order' => array(
                    'Product.name' => 'ASC'
                ),
                'contain' => '',
                'conditions' => array(
                    $cond
                ),
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
                )
            );

            $theproduct = $this->Product->find('first', $conditions);

            $imgprod = $theproduct;

            $product_id = $imgprod['Product']['id'];

            $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
            $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

            if (!empty($picture_main)) {
                $theproduct['Image'] = array('name' => $picture_main['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else if (!empty($picture_subs)) {
                $theproduct['Image'] = array('name' => $picture_subs['Image']['name'], 'id' => $picture_main['Image']['id']);
            } else {
                $theproduct['Image'] = array('name' => 'no_image.gif', 'id' => 0);
            }

            $img_path = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'img/products/' . $theproduct['Image']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['cid'] = $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['pid'] = $theproduct['Product']['id'];
            $productstoemail[$theproduct['Category']['name']][$x]['url'] = 'http://' . $_SERVER['SERVER_NAME'] . '?pid=' . $theproduct['Product']['id'] . '&cid=' . $theproduct['Product']['category_id'];
            $productstoemail[$theproduct['Category']['name']][$x]['name'] = $theproduct['Product']['name'];
            $productstoemail[$theproduct['Category']['name']][$x]['image'] = $img_path;
            $productstoemail[$theproduct['Category']['name']][$x]['description'] = $theproduct['Product']['description'];
            $x++;
        }

//if ($this->Appointment_visitor->save($data)) {
        $success = true;
        $cakemail = new CakeEmail();
        $cakemail->to($this->data['Appointment']['email']);
        $cakemail->from(array('noreply@honestinstall.com' => 'Honestinstall'));
        $cakemail->config('default');
        $cakemail->subject('HonestInstall - Appointment Confirmation');

        $viewVars = array();
        $viewVars['emailContent'] = $this->data['Appointment']['edit'];
        $viewVars['productstoemail'] = $productstoemail;
        $viewVars['form_url'] = 'http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'index.php/users/editInterested/0';
        //$viewVars['appointment_id'] = $this->Appointment->getInsertID();
        $cakemail->template('Email.email_visitor');

        $cakemail->viewVars($viewVars);
        if ($cakemail->send()) {
            $this->Session->setFlash('<span style="color:red;">Your Appointment Message has been sent successfully!</span>');
            $this->redirect(array('controller' => 'appointments', 'action' => '/'));
        }
    }

}
?>