$(document).ready(function () {
    $('#send-message').click(function () {
        let userID = $('input[name="userID"]').val();
        let username = $('input[name="username"]').val();
        let content = $('input[name="content"]').val();
        $.ajax({
            type: "post",
            url: "http://127.0.0.1/webmobi/chats",
            data: {
                "userID": userID,
                "username": username,
                "content": content
            },
            success: function (response) {
                location.reload();
            }
        });

    });
});
