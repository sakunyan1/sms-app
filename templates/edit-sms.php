<form id="send-sms-form">
    <input type="text" name="phone_number" placeholder="Phone Number">
    <textarea name="message" placeholder="Message"></textarea>
    <input type="submit" value="Send Message">
</form>

<script>
jQuery('#send-sms-form').on('submit', function(e) {
    e.preventDefault();

    var data = {
        'phone_number': jQuery('input[name="phone_number"]').val(),
        'message': jQuery('textarea[name="message"]').val()
    };

    jQuery.ajax({
        type: 'POST',
        url: '/wp-json/sms/v1/send/',
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function(response) {
            // Update the form with the response data
            console.log(response);
        }
    });
});
</script>
