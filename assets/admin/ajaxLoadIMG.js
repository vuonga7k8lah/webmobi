$(document).ready(function(){

    $('#imagesHotel').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesHotel').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images[]", document.getElementById('imagesHotel').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/webmobi/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMG').append('<input name="images[]" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });

    $('#images_update_Product').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('images_update_Product').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images[]", document.getElementById('images_update_Product').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/webmobi/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#preview_product_update').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMG_product_update').append('<input name="images[]" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });

    $('#imagesAvatar').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesAvatar').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images", document.getElementById('imagesAvatar').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/webmobi/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#previewAvatar').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMGAvatar').append('<input name="images" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });

    $('#imagesAvatarUpdate').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesAvatarUpdate').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images", document.getElementById('imagesAvatarUpdate').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/webmobi/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#previewAvatarUpdate').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMGAvatarUpdate').append('<input name="images" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });
});
