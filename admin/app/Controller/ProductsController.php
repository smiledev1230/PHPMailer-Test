<?php

/**
 * @author RosenCS
 * @copyright 2012
 */
class ProductsController extends AppController {

    var $name = 'Products';
    var $helpers = array('Html', 'Form', 'Thumbnail');
    var $uses = array('Product', 'Category', 'Image');

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

    public function index($sort = 'id', $direction = 'asc', $page = 1) {

        // checkpoint if team is logged in
        $this->checkteam();

        $cond = '';
        if ((isset($this->data['Products']['search_submit'])) && ($this->data['Products']['search_submit'] == '1')) {
            $search_submit = $this->data['Products']['search_submit'];

            if ((isset($this->data['Products']['keywords'])) && ($this->data['Products']['keywords'] != '')) {
                $keywords = $this->data['Products']['keywords'];

                $cond .= "Product.name LIKE '%" . $keywords . "%' OR Product.description LIKE '%" . $keywords . "%'";
            }
        }

        $this->paginate = array(
            'limit' => 10,
            'order' => array(
                'Product.id' => 'DESC'
            ),
            'contain' => '',
            'conditions' => array(
                //($cond != '' ? $cond.' AND ' : '') . " Image.position = 'main'"
                $cond
            ),
            //'fields' => array('Product.*', 'Category.*', 'Image.*'),
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

        $products = $this->paginate('Product');
        $allproducts = $products;
        $i = 0;
        foreach ($allproducts as $product) {
            $product_id = $product['Product']['id'];

            $picture_main = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'main')));
            $picture_subs = $this->Image->find('first', array('conditions' => array('Image.product_id' => $product_id, 'Image.position' => 'subs')));

            if (!empty($picture_main)) {
                $products[$i]['Image'] = array('name' => $picture_main['Image']['name']);
            } else if (!empty($picture_subs)) {
                $products[$i]['Image'] = array('name' => $picture_subs['Image']['name']);
            } else {
                $products[$i]['Image'] = array('name' => 'no_image.gif');
            }
            $i++;
        }

        //$this->set('users', $users);
        $this->set(compact('products'));

        $sort = strtolower($sort);

        switch ($sort) {
            case 'id' :
                $order = array("Product.id" => $direction);
                break;
            case 'name':
                $order = array("Product.name" => $direction);
                break;
            case 'category':
                $order = array("Category.name" => $direction);
                break;
            case 'description':
                $order = array("Product.description" => $direction);
                break;
            default:
                $order = array("Product.id" => $direction);
                break;
        }
        /*
          if ($sort == 'appointment_id')
          $order = array("User_interest.$sort" => $direction);
          else if ($sort == 'firstname')
          $order = array("User.$sort" => $direction);
          else if ($sort == 'email')
          $order = array("User.$sort" => $direction);
          else
          $order = array("Product.name" => $direction);
         * 
         */

        $products = $this->Product->find('all', array(
            'limit' => 10, //int
            'page' => $page, //int
            'order' => $order,
            'conditions' => array(
                //($cond != '' ? $cond.' AND ' : '') . " Image.position = 'main'"
                $cond
            ),
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
            'fields' => array('Product.*', 'Category.*'),
                ));

        $totalProducts = $this->Product->find('count');

        $this->set('sort', strtolower($sort));
        $this->set('direction', strtolower($direction));
        $this->set('page', $page);
        $this->set('totalPage', ceil($totalProducts / 10));
        $this->set('products', $products);
    }

    public function add_new() {

        // checkpoint if team is logged in
        $this->checkteam();

        if (!empty($this->data)) {

            $flag = 0;



            if ($this->data['Product']['productname'] == '') {
                $flag = 1;
                $this->set('fullname_error', 'Product Name cannot be empty!');
            }

            if (!$flag) {

                extract($this->data['Product']);

                $this->Product->create();
                $newproduct['Product']['name'] = $productname;
                $newproduct['Product']['description'] = $description;
                $newproduct['Product']['category_id'] = $categoris_list;
                $newproduct['Product']['auto_select'] = $auto_select;

                if ($this->Product->save($newproduct)) {
                    $newproductid = $this->Product->getInsertID();

                    if ((!empty($productimage)) && ($productimage["size"] / 1024 > 2048)) {
                        $flag = 1;
                        $this->set('filename_error', 'Product picture cannot exceed 2Mb!');
                    } else {

                        if ((!empty($productimage["name"])) && (!empty($productimage["tmp_name"]))) {

                            $ext = $this->file_extension($productimage["name"]);
                            $file_path = WWW_ROOT . "img" . DS . "products" . DS;
                            $thumb_path = WWW_ROOT . "img" . DS . "product_thumbs" . DS;
                            $file_name = substr(rand(), 1, 4) . str_replace(" ", "_", $productimage["name"]);
                            move_uploaded_file($productimage["tmp_name"], $file_path . $file_name);
                            $this->gd_thumbnail($file_path . $file_name, $thumb_path . $file_name, $ext, false);

                            $newimage['Image']['product_id'] = $newproductid;
                            $newimage['Image']['name'] = $file_name;
                            $newimage['Image']['position'] = 'main';

                            $this->Image->create();
                            $this->Image->save($newimage);
                        }
                    }

                    $this->Session->setFlash(__('The Product has been added successfully!', true));
                    $this->redirect(array('controller' => 'products', 'action' => '/'));
                } else {
                    $this->Session->setFlash(__('Add New Product faild!', true));
                }
            }
        }
        $data_dd_select = $this->Category->generateTreeList(null, null, null, '___');
        $this->set('data_dd_select', $data_dd_select);
    }

    public function delete($id = 0) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Products', 'action' => 'index'));

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ($id != 0)) {
            if ($this->Product->deleteall(array('id' => $id))) {
                if ($this->Image->deleteall(array('product_id' => $id))) {
                    $this->Session->setFlash(__('The Product has been deleted successfully!', true));
                    $this->redirect(array('controller' => 'products', 'action' => '/'));
                }
            }
        } else {
            $this->Session->setFlash(__('Invalid Product ID!', true));
        }
    }

    public function edit($id = 0) {
        if ($this->Session->read('user_type') != 1)
            $this->redirect(array('controller' => 'Products', 'action' => 'index'));

        // checkpoint if team is logged in
        $this->checkteam();

        if ((isset($id)) && ($id != 0)) {

            $cond = "Product.id = " . $id . "";

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
            //var_dump($theproduct);
            //exit;
            $i = 0;

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
            $i++;

            $data_dd_select = $this->Category->generateTreeList(null, null, null, '___');
            $this->set('data_dd_select', $data_dd_select);

            $this->set(compact('theproduct'));
        } else if ((isset($this->data['Product'])) && (!empty($this->data['Product'])) && ($this->data['Product']['edit_product'] == '1')) {

            $flag = 0;
            //var_dump($this->data);
            //exit;
            extract($this->data['Product']);

            if ($productname == '') {
                $flag = 1;
                $this->set('fullname_error', 'Product Name cannot be empty!');
            }

            //$this->Product->create();
            $newproduct['Product']['id'] = $product_id;
            $newproduct['Product']['category_id'] = $categoris_list;
            $newproduct['Product']['name'] = $productname;
            $newproduct['Product']['description'] = $description;

            if ($this->Product->save($newproduct)) {

                if ((!empty($productimage)) && ($productimage["size"] / 1024 > 2048)) {
                    $flag = 1;
                    $this->set('filename_error', 'Product picture cannot exceed 2Mb!');
                } else {

                    if ((!empty($productimage["name"])) && (!empty($productimage["tmp_name"]))) {

                        $ext = $this->file_extension($productimage["name"]);
                        $file_path = WWW_ROOT . "img" . DS . "products" . DS;
                        $thumb_path = WWW_ROOT . "img" . DS . "product_thumbs" . DS;
                        $file_name = substr(rand(), 1, 4) . str_replace(" ", "_", $productimage["name"]);
                        move_uploaded_file($productimage["tmp_name"], $file_path . $file_name);
                        $this->gd_thumbnail($file_path . $file_name, $thumb_path . $file_name, $ext, false);

                        $newimage['Image']['id'] = $image_id;
                        $newimage['Image']['product_id'] = $product_id;
                        $newimage['Image']['name'] = $file_name;
                        $newimage['Image']['position'] = 'main';

                        //$this->Image->create();
                        $this->Image->save($newimage);
                    }
                }

                $this->Session->setFlash(__('The Product has been added successfully!', true));
                $this->redirect(array('controller' => 'products', 'action' => '/'));
            } else {
                $this->Session->setFlash(__('Add New Product faild!', true));
            }
        } else {
            $this->Session->setFlash(__('Invalid Product ID!', true));
            $this->redirect(array('controller' => 'products', 'action' => '/'));
        }
    }

}

?>