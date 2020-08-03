$(function () {
    if(document.getElementById('formAep')) {
        let typeAep = $('.type').data('typeAep');
        let sourceAep = $('.source').data('sourceAep');

        $('fieldset.type ~ fieldset').hide();
        $('fieldset.type ~ div').hide();
    }
});
