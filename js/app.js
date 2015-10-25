$(document).ready(function () {
    var button = $('button[type=submit]');
    button.prop('disabled', true);
    errors = true;

    $('input[datatype=check]').on('blur', function () {
        var self = $(this);
        var formGroup = self.parent('.form-group');
        $.ajax({
            method: 'POST',
            url: '/ajax/checker',
            dataType: 'json',
            data: $('form').serialize(),
            success: function(response){
                if (response[self.attr('name')] == true) {
                    formGroup.addClass('has-success');
                    if (formGroup.hasClass('has-error')) formGroup.removeClass('has-error');
                } else formGroup.addClass('has-error');

                errors = false;
                $.each(response, function(key, value){
                    if (value == false) {
                        errors = true;
                    }
                });

                console.log(errors);
                if (errors) {
                    button.prop('disabled', true);
                } else button.prop('disabled', false);
            }
        });
    });

    $('table select').on('change', function(){
        $('form').submit();
    });
});
