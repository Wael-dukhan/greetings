<?php
echo "wael";
require_once(__DIR__."/../../config.php");
$PAGE->set_url(new moodle_url('/local/greetings/manage.php'));
// $PAGE->set_url(new moodle_url("wael"));
$PAGE->set_context(\context_system::instance());
// $PAGE->set_title("Manage Greetings");
$PAGE->set_title($SITE->fullname);
$PAGE->set_pagelayout("base");
echo $OUTPUT->header();
// echo "<h1> waaaael </h1>";

$templatecontext=(object)[
    'texttodisplay'=>'here is some text',
];

echo $OUTPUT->render_from_template('local_greetings/manage',$templatecontext);

echo html_writer::tag('input', '', [
    'type' => 'text',
    'name' => 'username',
    'placeholder' => get_string('typeyourname', 'local_greetings'),
]); 

if (isloggedin()) {
    echo '<h2>Greetings, ' . fullname($USER) . '</h2>';
}
else{
    echo '<h1>Greetings user </h1>';
}

$now = time();
// echo userdate($now);
echo userdate(time(), get_string('strftimedaydate', 'core_langconfig'));

// $date = new DateTime("tomorrow", core_date::get_user_timezone_object());
// $date->setTime(0, 0, 0);
// echo userdate($date->getTimestamp(), get_string('strftimedatefullshort', 'core_langconfig'));

$grade = 50.00 / 3;
echo "      ".format_float($grade, 2);


echo $OUTPUT->footer();

?>