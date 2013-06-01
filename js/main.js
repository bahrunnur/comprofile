$(document).ready(function() {
    $('.close-button').click(function(e) {
        e.preventDefault();
        $('.success-message').slideUp();
    });
});