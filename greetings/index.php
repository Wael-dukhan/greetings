<?php

require_once('../../config.php');
require_once($CFG->dirroot. '/local/greetings/lib.php');
echo get_string('greetingloggedinuser', 'local_greetings', fullname($USER));
echo local_greetings_get_greeting($USER);
