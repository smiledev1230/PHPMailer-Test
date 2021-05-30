<?php

/**
 * @author Rosen
 * @copyright 2012
 */

class Product extends AppModel {
	
	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'product_id',
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