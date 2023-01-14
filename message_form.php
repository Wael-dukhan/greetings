<?php
defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/formslib.php');
class local_greetings_message_form extends moodleform {
 
    /**
     * Define the form.
     */
    public function definition() {
        $mform    = $this->_form; // Don't forget the underscore! 

        $mform->addElement('textarea', 'message', get_string('yourmessage', 'local_greetings'));
        $mform->setType('message', PARAM_TEXT);
        $submitlabel = get_string('submit');
        $mform->addElement('submit', 'submitmessage', $submitlabel);
    }

}