<?php
// echo "wael";

require_once(__DIR__."/../../config.php");
require_once($CFG->dirroot."/local/greetings/classes/form/edit.php");

$PAGE->set_url(new moodle_url('/local/greetings/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title("Edit");
// $PAGE->set_title($SITE->fullname);

$mform=new edit();
echo $OUTPUT->header();
echo $CFG->libdir;

$mform->display();
echo \core\output\notification::NOTIFY_WARNING;

echo $OUTPUT->footer();
