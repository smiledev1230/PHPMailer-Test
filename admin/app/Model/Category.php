<?php

/**
 * @author Rosen
 * @copyright 2012
 */

class Category extends AppModel {
	
	public $name = 'Category';
    public $actsAs = array('Tree');
	
	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
}

?>