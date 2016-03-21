$(function(){
    //checks if some input is empty
    $('#dataInputForm').submit(function(e){

        var inputs = $(this).find('input');

        $.each(inputs,function(index,value){
            var input = $(value);
            var formGroup = input.parents('.form-group');

            if(input.val().length === 0){
                e.preventDefault();
                formGroup.addClass('has-error');
                input.tooltip({
                    trigger: 'manual',
                    placement: 'right',
                    title: 'You must fill the field'
                }).tooltip('show');
            }
            else
            {
                formGroup.addClass('has-success');
            }
        });
    });

    $('form').on('keydown', 'input', function(e){
        $(this).tooltip('destroy').parent('.form-group').removeClass('has-error').addClass('has-success');
    });

});