<?php
/*
Plugin Name: My SMS Plugin
Description: A plugin to send SMS messages using Textbelt API.
Version: 1.0.0
Author: TBA
*/

// Include the main plugin class
require_once plugin_dir_path(__FILE__) . 'class-my-sms-plugin.php';

// Initialize the plugin
function my_sms_plugin_init() {
    $plugin = new My_Sms_Plugin();
    $plugin->run();
}
my_sms_plugin_init();
