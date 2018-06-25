var loadOldPostsFlag = false;
var loadOldPostsOffset = 0;
$(document).ready(function() {
    $(document).scroll(function() {
        // load old posts
        if ($(document).scrollTop() > $('.grid').height() - window.innerHeight) {
            if (loadOldPostsFlag === false) {
                loadPosts(loadOldPostsOffset, 12);
                loadOldPostsOffset = loadOldPostsOffset + 12;
            }
        }

    });
});


function loadPosts(offset, number) {
    $.ajax({
        url: 'loadgrid/'+offset+'/'+number,
        type: 'GET',
        success: function(data) {
            if (data === '') {
                loadOldPostsFlag = true;
            }
            $('.content').append(data);
        },
        error: function() {
            alert('internet Conexion error');
        }
    });
}
