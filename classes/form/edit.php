<?php
require_once("$CFG->libdir/formslib.php");

class edit extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 
        // var_dump($mform);
        //                                   get_string('email')
        $mform->addElement('text', 'email', "Message Text"); // Add elements to your form.
        $mform->setType('email', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('email', 'Please enter email');        // Default value.

        $choices=array();
        $choices[0]=\core\output\notification::NOTIFY_WARNING;
        $choices[1]=\core\output\notification::NOTIFY_SUCCESS;
        $choices[2]=\core\output\notification::NOTIFY_ERROR;
        $choices[3]=\core\output\notification::NOTIFY_INFO;
        $mform->addElement('select', 'messagetype', "Message type",$choices); // Add elements to your form.

        $mform->setDefault('messagetype', '3');        // Default value.
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}