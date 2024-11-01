<?php
/*
Plugin Name: Your Posts on Dashboard
Plugin URI: http://ounziw.com/2012/09/12/your-posts-on-dashboard/
Description: You can view the number of your posts on the dashboard.
Version: 1.0
Author: Fumito MIZUNO
Author URI: http://ounziw.com/
Donate link: http://pledgie.com/campaigns/8706
Tags: dashboard, posts
Requires at least: 3.3
Tested up to: 3.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('right_now_content_table_end', 'yourposts_dashboard');
function yourposts_dashboard() {
    $label = __('Your Posts','yourposts_dashboard');
    $cssclass = 'yourposts';
    global $user_ID;
    $yourpostsnum = count_user_posts($user_ID);
    $label = esc_html($label); 
    $cssclass = esc_attr($cssclass);
    if (current_user_can('edit_posts')) {
        print <<<EOF
<tr>
<td class="first b b-$cssclass"><a href='edit.php'>$yourpostsnum</a></td>
<td class="t $cssclass"><a href='edit.php'>$label</a></td>
</tr>
EOF;
    }
}
