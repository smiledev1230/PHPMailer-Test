<?php

/**
 * @author Rosen
 * @copyright 2012
 */
class Appointment extends AppModel {

    //public $belongsTo = 'User';	
    //public $name = 'Appointment';
    //public function beforeSave() {
    /*
      var_dump($this->data);
      exit;
      $this->data['Appointment']['Appointments']['date_appointment'] = date('Y-m-d', strtotime($this->data['Appointment']['Appointments']['date_appointment']));
     */
    /*
      if((isset($this->data['Appointment']['Appointments']['products'])) && (!empty($this->data['Appointment']['Appointments']['products']))) {
      $this->data['Appointment']['Appointments']['products'] = serialize($this->data['Appointment']['Appointments']['products']);
      }
     */
    /*
      if((isset($this->data['Appointment']['products'])) && (!empty($this->data['Appointment']['products']))) {
      $this->data['Appointment']['products'] = serialize($this->data['Appointment']['products']);
      }
     */
    //var_dump($this->data);
    //exit;
    //}

    public $validate = array(
        'subject' => array(
            'rule' => 'notEmpty',
            'message' => 'Enter a valid "Subject".'
        ),
        /*
          'email' => array(
          'rule' => 'email',
          'message' => 'Enter a valid E-mail address.'
          ),
         */
        'date_appointment' => array(
            'rule' => 'date',
            'message' => 'Enter a valid date.'
        ),
        'service' => array(
            'rule' => array('inList', array('Install', 'Service Call', 'Follow Up')),
            'message' => 'Select one of the "Type of Service".'
        ),
            /*
              'time_in' => array(
              'rule' => 'time',
              'message' => 'Enter a valid time in "Time In".'
              ),
              'time_out' => array(
              'rule' => 'time',
              'message' => 'Enter a valid time in "Time Out".'
              )
             * 
             */
    );

}

?>