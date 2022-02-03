$(function (){

    $('#regForm').submit(function (e) {
        e.preventDefault(); // отмена обновления страницы
        var $formData = $(this);
        $.post(`myFormHandler.php`, $formData.serialize(), verify, "json");
    });

    function verify(data){
        if (data.result === 'error'){
            $('#msg').html('<div class="alert alert-warning fade show">' +
                'Ошибка: '+ data.error+ '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                '    <span aria-hidden="true">&times;</span>' +
                '  </button> </div>')
        }
        else{
            $('#regForm').addClass('d-none');
            $('#successMsg').html('<div class="alert alert-success">' +
                'Успешная регистрация</div>')
        }
    }

})


