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
});
