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

        // Autocomplete
        $('.autocomplete-region').css('position', 'absolute').css('z-index', 2).css('background', 'transparent');
        $('.autocomplete-department').css('position', 'absolute').css('z-index', 2).css('background', 'transparent');
        $('.autocomplete-borough').css('position', 'absolute').css('z-index', 2).css('background', 'transparent');

        // Datepicker
        $('.datepicker').datepicker();
        $('.analysis-datepicker').datepicker();
    }
});
