<?php

class Subject extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter subject name.'
        ),
    );

}

?>