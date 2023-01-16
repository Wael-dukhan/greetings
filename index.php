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
if ($data = $messageform->get_data()) {
    $message = required_param('message', PARAM_TEXT);

    if (!empty($message)) {
        $record = new stdClass;
        $record->message = $message;
        $record->timecreated = time();
        
        $DB->insert_record('local_greetings_message', $record);
    }
}
echo $OUTPUT->header();
$messageform->display();

// if ($data = $messageform->get_data()) {
//     // var_dump($data);
//     $message = required_param('message', PARAM_TEXT);

//     echo $OUTPUT->heading($message,4);
// }
$messages = $DB->get_records('local_greetings_message');
// foreach ($messages as $m) {
//     echo '<p>' . $m->message . ', ' . $m->timecreated . '</p>';
// }
echo $OUTPUT->box_start('card-columns');

foreach ($messages as $m) {
    echo html_writer::start_tag('div', array('class' => 'card'));
    echo html_writer::start_tag('div', array('class' => 'card-body'));
    echo html_writer::tag('p', $m->message, array('class' => 'card-text'));
    echo html_writer::start_tag('p', array('class' => 'card-text'));
    echo html_writer::tag('small', userdate($m->timecreated), array('class' => 'text-muted'));
    echo html_writer::end_tag('p');
    echo html_writer::end_tag('div');
    echo html_writer::end_tag('div');
}
echo $OUTPUT->box_end();

echo $OUTPUT->footer();

// function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
//     $frontpage->add(
//         get_string('pluginname', 'local_greetings'),
//         new moodle_url('/local/greetings/index.php')
//     );
// }

// local_greetings_extend_navigation();