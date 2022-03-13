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
    $('#da-nhan-hang').click(function () {
        let userID = $('#order-userID').val();
        let maDH = $('#order-MaDH').val();
        $.ajax({
            type: "post",
            url: "http://127.0.0.1/webmobi/updateInfo",
            data: {
                "userID": userID,
                "maDH": maDH,
                "status": "daGiao"
            },
            success: function (response) {
                location.reload();
            }
        });
    })
    $('#da-xac-nhan-hang').click(function () {
        let userID = $('#order-userID').val();
        let maDH = $('#order-MaDH').val();
        $.ajax({
            type: "post",
            url: "http://127.0.0.1/webmobi/updateInfo",
            data: {
                "userID": userID,
                "maDH": maDH,
                "status": "dangGiao"
            },
            success: function (response) {
                location.reload();
            }
        });
    })
});
