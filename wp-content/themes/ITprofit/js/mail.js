
//Phone validation
$(".phone_input").mask("999(99) 999-9999");

let tempFiles = [],
    fileUploadList;

$('.file_input').change(function (e) {
    if ($(this).val() !== '') {
        tempFiles = this.files;

        $('.file__name').html('Выбран файл ' + tempFiles[0].name)
        $('.file__about').css("max-width", "280px");
        $('.take__files').css('align-items', 'end');
        uploadFiles(tempFiles);
    }
})

function uploadFiles(files){
    let formData = new FormData();
    let count = 0;
    $.each( files, function( key, value ){
        formData.append( key, value );
        count++;
    });
    formData.append( 'file_upload', true );
    formData.append( 'action', 'ajaxsavefile' );

    if( count > 0 ){

        $.ajax({
            url: ajax_object.ajaxurl,
            cache: false,
            processData: false,
            contentType: false,
            type: 'post',
            data: formData,
            success: function( data, status, jqXHR ){
                if (data !== 0){
                    fileUploadList = data.split(';');
                } else {
                    alert('Возможны атаки при загрузке файла! Обратитесь в тех.поддержку!');
                }
            },
            error: function( jqXHR, status, errorThrown ){
                alert( 'Ошибка AJAX запроса: ' + status );
            }
        });
    }
}

$('#send_mail').on('submit', function (e) {
    e.preventDefault();

    let dataArr = {
        action : 'ajaxsendmail',
        NAME : $('input[name="name"]').val(),
        TEL : $('input[name="phone"]').val(),
        EMAIL : $('input[name="email"]').val(),
        PROJECT : $('input[name="project_name"]').val(),
        REQUEST : $('input[name="request"]').val(),
        EMAIL_TO : "info@seobility.by",
        FILE_URL : fileUploadList[0],
        FILE_TYPE : fileUploadList[1],
    };

    $.ajax({
        url: ajax_object.ajaxurl,
        data: dataArr,
        type: 'POST',
        success: function( data ){
            if(data == 0){
                alert('Ошибка отправки письма, свяжитесь с тех. поддержкой!');
            } else {
                let successMessage = "Письмо успешно отправлено! " + dataArr.NAME + " с вами свяжуться!"
                alert(successMessage);
            }
        },
        error: function( jqXHR, textStatus, errorThrown ){
            alert('Ошибка AJAX запроса: ' + textStatus );
        }
    });
})


