<?php

require_once('../../config.php');
require_once($CFG->dirroot. '/local/greetings/lib.php');
echo get_string('greetingloggedinuser', 'local_greetings', fullname($USER));
echo local_greetings_get_greeting($USER);

echo get_string('sayhello', 'local_greetings');
// function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
//     $frontpage->add(
//         get_string('pluginname', 'local_greetings'),
//         new moodle_url('/local/greetings/index.php')
//     );
// }

// local_greetings_extend_navigation();