<?php

/**
 * @author RosenCS
 * @copyright 2012
 */
class CategoriesController extends AppController {

    public $name = 'Categories';
    public $helpers = array('Html', 'Form');
    public $uses = array('Category', 'Product');

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

        $cats = $this->Category->generateTreeList(null, null, null, '|');

        $html = '<ul id="browser" class="filetree">' . "\n";

        $i = 0;
        $checkpount = 0;
        $ul = '';
        $li = '';
        foreach ($cats as $key => $cat) {

            if ($i == 0) {
                $html .= '<li>' . '<span class="folder">' . $cat . '</span>' . "\n";
                $i++;
                continue;
            }

            if ($i > 0) {

                $stringcount = 0;
                if (preg_match_all('/\|/', $cat, $arrayfound)) {
                    $stringcount = count($arrayfound[0]);
                }

                if ($stringcount) {
                    $cat = preg_replace('/\|/', '', $cat);

                    $baseurlhtml = Router::url('/') . 'img/';
                    $action_reload = Router::url(array('controller' => "categories"));
                    $action_edit_url = Router::url(array('controller' => "categories", 'action' => "edit/" . $key));
                    $action_delete_url = Router::url(array('controller' => "categories", 'action' => "delete/" . $key));

                    $icon_actions = '<div class="action_icons"><div class="icon_edit"><a href="' . $action_edit_url . '"><img src="/images/icon_edit.png" alt="Edit" /></a></div><div class="icon_delete"><a><img src="/images/icon_delete.png" alt="Delete" onclick="if(confirm(\'Are you sure to delete\nCategory: ' . $cat . '\nThis action will delete all children nodes as well!\')) { location.href=\'' . $action_delete_url . '\' } else { location.href=\'' . $action_reload . '\'; }" /></a></div></div>';

                    if ($stringcount > $checkpount) {

                        $ul = '<ul>';
                        $html .= $ul . "\n";

                        $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>';
                    }

                    if ($stringcount == $checkpount) {
                        $html .= '</li>' . "\n";
                        $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>' . '</li>' . "\n";
                    }

                    if ($stringcount < $checkpount) {

                        $ul = '</ul>';
                        for ($x = $checkpount; $x > $stringcount; $x--) {
                            $html .= $ul . "\n";
                        }

                        $html .= '</li>' . "\n";
                        $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>' . "\n";
                    }
                }
            }

            $checkpount = $stringcount;
            $i++;
        }
        $html .= '</li>' . "\n";
        $html .= '</ul>' . "\n";

        //var_dump($this->Category);
        //exit;
        $data_dd_select = $this->Category->generateTreeList(null, null, null, '___');

        $this->set('data_dd_select', $data_dd_select);
        $this->set('cathtml', $html);
    }

    public function add_new() {
        //$this->layout = "index";
        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($this->data['Categories'])) && (!empty($this->data['Categories']))) {

            $flag = 0;
            //var_dump($this->data);
            //exit;
            extract($this->data['Categories']);
            $category_name = $this->data['Categories']['category_name'];
            $categoris_list = $this->data['Categories']['categoris_list'];

            if (!$category_name) {
                $flag = 1;
                //$this->set('title_error', 'Category Name is required!');
                $this->Session->setFlash(__('Category Name is required!', true));
                $this->redirect(array('controller' => 'categories', 'action' => '/'));
            }
            //var_dump($this->Categories);
            //exit;
            if ($flag == 0) {
                $thecategory['Category']['parent_id'] = $categoris_list;
                $thecategory['Category']['name'] = $category_name;

                //$this->Category->create();
                if ($this->Category->save($thecategory)) {
                    $this->Session->setFlash(__('The Category has been added successfully!', true));
                } else {
                    $this->Session->setFlash(__('Add New Category faild!', true));
                }

                $this->redirect(array('controller' => 'categories', 'action' => '/'));
            }
        } else {
            $this->redirect(array('controller' => 'categories', 'action' => '/'));
        }
    }

    public function delete($id = null) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Categories', 'action' => 'index'));

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ((is_numeric($id)) && ($id != 0))) {

            $childrens = $this->Category->children($id);
            //var_dump($childrens);
            //echo "UPDATE products SET category_id = 1 WHERE category_id = ".$id;
            //exit;
            foreach ($childrens as $child) {
                $this->Product->query("UPDATE products SET category_id = 1 WHERE category_id = " . $child['Category']['id'] . ";");
            }
            $this->Product->query("UPDATE products SET category_id = 1 WHERE category_id = " . $id . ";");


            $this->Category->id = $id;
            if ($this->Category->delete()) {
                $this->Session->setFlash(__('The Category has been delete successfully!', true));
            }
        } else {
            $this->Session->setFlash(__('Please select directory node to be deleted.', true));
        }

        $this->redirect(array('controller' => 'categories', 'action' => '/'));
    }

    public function edit($id = null) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Categories', 'action' => 'index'));

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ((is_numeric($id)) && ($id != 0))) {


            $cats = $this->Category->generateTreeList(null, null, null, '|');

            $html = '<ul id="browser" class="filetree">' . "\n";

            $i = 0;
            $checkpount = 0;
            $ul = '';
            $li = '';
            foreach ($cats as $key => $cat) {

                if ($i == 0) {
                    $html .= '<li>' . '<span class="folder">' . $cat . '</span>' . "\n";
                    $i++;
                    continue;
                }

                if ($i > 0) {

                    $stringcount = 0;
                    if (preg_match_all('/\|/', $cat, $arrayfound)) {
                        $stringcount = count($arrayfound[0]);
                    }

                    if ($stringcount) {
                        $cat = preg_replace('/\|/', '', $cat);

                        $baseurlhtml = Router::url('/') . 'img/';
                        $action_reload = Router::url(array('controller' => "categories"));
                        $action_edit_url = Router::url(array('controller' => "categories", 'action' => "edit/" . $key));
                        $action_delete_url = Router::url(array('controller' => "categories", 'action' => "delete/" . $key));

                        $icon_actions = '&nbsp;';

                        if ($stringcount > $checkpount) {

                            $ul = '<ul>';
                            $html .= $ul . "\n";

                            $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>';
                        }

                        if ($stringcount == $checkpount) {
                            $html .= '</li>' . "\n";
                            $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>' . '</li>' . "\n";
                        }

                        if ($stringcount < $checkpount) {

                            $ul = '</ul>';
                            for ($x = $checkpount; $x > $stringcount; $x--) {
                                $html .= $ul . "\n";
                            }

                            $html .= '</li>' . "\n";
                            $html .= '<li>' . '<span class="folder">' . $icon_actions . $cat . '</span>' . "\n";
                        }
                    }
                }

                $checkpount = $stringcount;
                $i++;
            }
            $html .= '</li>' . "\n";
            $html .= '</ul>' . "\n";
            $this->set('cathtml', $html);

            $thecategory = $this->Category->query("SELECT * FROM categories AS Category WHERE id = " . $id . ";");

            $data_dd_select = $this->Category->generateTreeList(null, null, null, '___');
            $this->set('data_dd_select', $data_dd_select);
            $this->set('thecategory', $thecategory);
        } else {
            $this->Session->setFlash(__('Please select directory node to be edited.', true));
            $this->redirect(array('controller' => 'categories', 'action' => '/'));
        }
    }

    public function update() {
        //Configure::write('debug', 2);
        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($this->data['Categories'])) && (!empty($this->data['Categories']))) {

            $flag = 0;
            //var_dump($this->data['Categories']);
            //exit;
            //extract($this->data['Categories']);
            $category_id = $this->data['Categories']['category_id'];
            $category_name = $this->data['Categories']['category_name'];
            $categoris_list = $this->data['Categories']['categoris_list'];
            //var_dump($categoris_list);
            //exit;
            if (!$category_name) {
                $flag = 1;
                //$this->set('title_error', 'Category Name is required!');
                $this->Session->setFlash(__('Category Name is required!', true));
                $this->redirect(array('controller' => 'categories', 'action' => '/'));
            }

            if ($flag == 0) {

                $this->Category->id = $category_id;
                //$this->Category->id = $category_id;
                if (($this->Category->save(array('parent_id' => $categoris_list))) &&
                        ($this->Category->save(array('name' => $category_name)))
                ) {

                    // Do not uncomment unless you know what you are doing!!!
                    //$this->Category->recover();

                    $this->Session->setFlash(__('The Category has been edited successfully!', true));
                    $this->redirect(array('controller' => 'categories', 'action' => '/'));
                } else {
                    $this->Session->setFlash(__('Edit directory Failed. Please try again latter!', true));
                    $this->redirect(array('controller' => 'categories', 'action' => '/'));
                }
            } else {
                $this->Session->setFlash(__('Please select directory node to be edited.', true));
                $this->redirect(array('controller' => 'categories', 'action' => '/'));
            }
        } else {
            $this->Session->setFlash(__('Please select directory node to be edited.', true));
        }

        $this->redirect(array('controller' => 'categories', 'action' => 'categories'));
    }

    public function category_reorder() {
        $this->Category->recover();
        die('done');
    }

}

?>