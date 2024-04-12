<?php
/**
 * Plugin Name: SMS App Plugin
 * Description: This is a custom plugin that communicates with my Python script to deliver sms to specified phone numbers
 * Version: 1.0
 * Author: tbd
 */


// Add a new menu item under Settings
function my_custom_plugin_menu() {
    add_options_page(
        'My Custom Plugin Options',
        'My Custom Plugin',
        'manage_options',
        'my-custom-plugin',
        'my_custom_plugin_options'
    );
}
add_action('admin_menu', 'my_custom_plugin_menu');

// Display the plugin options page
function my_custom_plugin_options() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    // Save the message if the form was submitted
    if (isset($_POST['message'])) {
        file_put_contents(plugin_dir_path(__FILE__) . 'message.txt', sanitize_text_field($_POST['message']));
        echo '<div class="updated"><p>Message updated!</p></div>';
    }

    // Get the current message
    $message = '';
    if (file_exists(plugin_dir_path(__FILE__) . 'message.txt')) {
        $message = file_get_contents(plugin_dir_path(__FILE__) . 'message.txt');
    }

    // Display the form
    echo '<div class="wrap">';
    echo '<h2>SMS App Plugin</h2>';
    echo '<form method="post" action="">';
    echo '<label for="message">Message:</label><br>';
    echo '<input type="text" id="message" name="message" value="' . esc_attr($message) . '"><br>';
    echo '<input type="submit" value="Update">';
    echo '</form>';
    echo '</div>';
}
?>
