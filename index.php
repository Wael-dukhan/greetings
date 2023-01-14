<?php

require_once('../../config.php');
require_once($CFG->dirroot. '/local/greetings/lib.php');
require_once($CFG->dirroot. '/local/greetings/message_form.php');
echo get_string('greetingloggedinuser', 'local_greetings', fullname($USER));
echo local_greetings_get_greeting($USER);

echo get_string('sayhello', 'local_greetings');
echo $CFG->libdir;
echo  get_string('email');
$messageform = new local_greetings_message_form();

echo $OUTPUT->header();
$messageform->display();
if ($data = $messageform->get_data()) {
    // var_dump($data);
    $message = required_param('message', PARAM_TEXT);

    echo $OUTPUT->heading($message, 4);
}
echo $OUTPUT->footer();

// function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
//     $frontpage->add(
//         get_string('pluginname', 'local_greetings'),
//         new moodle_url('/local/greetings/index.php')
//     );
// }

// local_greetings_extend_navigation();