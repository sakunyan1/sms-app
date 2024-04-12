function create_sms_post_type() {
    register_post_type('sms', array(
        'labels' => array(
            'name' => __('SMS Messages'),
            'singular_name' => __('SMS Message')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor')
    ));
}
add_action('init', 'create_sms_post_type');

function send_sms_rest_api_endpoint() {
    register_rest_route('sms/v1', '/send/', array(
        'methods' => 'POST',
        'callback' => 'send_sms_message'
    ));
}
add_action('rest_api_init', 'send_sms_rest_api_endpoint');

function send_sms_message(WP_REST_Request $request) {
    $phone_number = $request->get_param('phone_number');
    $message = $request->get_param('message');

    // Use the send_message function from your main.py script to send the message
    $response = send_message($phone_number, $message);

    return new WP_REST_Response($response, 200);
}
