$(function () {
    if(document.getElementById('formAep')) {
        let typeAep = $('.type').data('typeAep');
        let sourceAep = $('.source').data('sourceAep');

        $('form ~ fieldset').hide();
        $('form ~ div').hide();
        $('.type ~ fieldset').hide();
        $('.type ~ div').hide();

        (function () {
            $(':input')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .prop('checked', false)
             .prop('selected', false);
        })();

        $('.datepicker').datepicker();
        $('.analysis-datepicker').datepicker();
    }

    if(document.getElementById('formUser')) {

        $('#user_password').attr('type', 'password');

        $('#submit').click(function (e) {

            console.log($('#user_password').val().length);
            
            if($('#user_password').val().length < 5) {
                $('<br><small><span class="bg-danger rounded">Erreur</span>: <i class="text-danger">minimum 5 caractères</i></small>').insertBefore('#user_password');
            }else if($('#user_password').val() !== $('#password_confirm').val()) {
                $('<br><small><span class="bg-danger rounded">Erreur</span>: <i class="text-danger">Les deux mots de passes doivent être identiques</i></small>').insertBefore('#password_confirm');
            }
            
            if ($('#user_password').val().length >= 5 && $('#user_password').val() === $('#password_confirm').val()) {
                $('form').submit();
                $('form').reset();
            }
        });
    }
});
