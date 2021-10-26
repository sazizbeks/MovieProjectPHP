$('#signInBtn').on('click',function () {
    event.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
        url: 'signin.php',
        type: 'POST',
        data: {
            email: email,
            password: password
        },
        success:function (data) {
            if(data == 'success'){
                location.reload();
            }
            else{
                $('#error').html(data);
            }
        }
    });
});

$('.willWatch').on('click',function () {
    event.preventDefault();
    var form = $('.willWatchForm').has(this);
    $.ajax({
        url: 'willWatch.php',
        type: 'POST',
        data: {
            movie: $('input', form).val()
        },
        success: function(data) {
            if(data == 'added'){
                $('.willWatch', form).removeClass('btn-secondary');
                $('.willWatch', form).addClass('btn-success');
                $('.willWatch', form).html('Already in list');
            }else{
                $('.willWatch', form).removeClass('btn-success');
                $('.willWatch', form).addClass('btn-secondary');
                $('.willWatch', form).html('Will watch');
            }
        }
    });
});
