<?php

App::uses('AppModel', 'Model');

/**
 * @author RosenCS
 * @copyright 2012
 */
class User extends AppModel {

    var $validate = array(
        'FullName' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Full Name required',
            ),
        ),
        'Email' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Email required',
            )
        )
    );

}

?>