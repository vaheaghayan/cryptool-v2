let addComment = function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url : $('#comment-form').attr('action'),
        dataType: "json",
        data : JSON.stringify({
            data: {
                comment: $('#comment').val(),
                cypher_id: $('#cypher-id').val()
            }
        }),
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            getComments();
        },
        error: function (data) {
            console.log((data.responseText));
        }
    });
}

let appendCommentHtml = function (comment){
    let date = new Date(comment.created_at);
    let createdAt = date.getDate() + '  ' +
        date.toLocaleString('default', { month: 'short' })+ '  ' +
        date.getFullYear() + '  ' +
        date.getUTCHours() + ':' +
        date.getMinutes() + ':' +
        date.getSeconds();

    let commentHtml = '' +
        '<div class="container-fluid col-lg-12 mt-3 comment-item">\n' +
        '                        <div class="row">\n' +
        '                            <div class="col-md-12">\n' +
        '                                <div class="card">\n' +
        '                                    <div class="card-header">\n' +
        '                                        <div class="media flex-wrap align-items-center">\n' +
        '                                            <div class="media-body ml-3"> <h5  data-abc="true">' + comment.user.name + '</h5>\n' +
        '                                                <div class="text-muted small">' + createdAt + '</div>\n' +
        '                                            </div>\n' +
        '                                        </div>\n' +
        '\n' +
        '                                    </div>\n' +
        '                                    <div class="card-body">\n' +
        '                                        <p>' + comment.comment + '</p>\n' +
        '                                    </div>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>'

    $('#comments-list').append(commentHtml);
}

let getComments = function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url : $('#comments-list').data('url'),
        dataType: "json",
        data: {
            cypher_id: $('#cypher-id').val(),
        },
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            data.forEach(function (comment){
                appendCommentHtml(comment)
            })
        },
        error: function (data) {
            console.log((data.responseText));
        }
    });
}

$(document).ready(function (){
    getComments();
    $('#comment-btn').click(function (){
        $('.comment-item').remove();
        addComment();
    });
});
