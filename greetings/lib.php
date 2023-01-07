<?php
// /** 
//  * @package      local_message
//  * @author       admin
//  * @lisinse      http://www.gnu.org
// **/
// function local_message_befor_footer(){
//     \core\notification::add('a test message',\core\output\notification::NOTIFY_WARNING);
// }
defined('MOODLE_INTERNAL') || die();

function local_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'local_greetings');
    }
    $country = $user->country;

    switch ($country) {
        case 'ES':
            $langstr = 'greetinguseres';
            break;
        case 'FJ':
            $langstr = 'greetinguserfj';
            break;
        case 'NZ':
            $langstr = 'greetingusernz';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}
