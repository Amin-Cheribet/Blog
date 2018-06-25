$(document).ready(function() {
    $('#comment-form').submit(function(event) {
        event.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url: '../comment',
            type: 'POST',
            data: data,
            success: function(res) {
                if (res === '1') {
                    $('.comment-error-box').html('');
                    $('.comment-form textarea').val('');
                    alert('Commented successfuly');
                    location.reload();
                } else {
                    displayErrors(res);
                }
            },
            error: function(res) {
                alert('Connexion Error');
            }
        });
    });
});

function displayErrors(res) {
    res = JSON.parse(res);
    var errors = '';
    for(var error of res) {
        errors += '<li>'+error+'</li>';
    }
    $('.comment-error-box').html(errors);
}
