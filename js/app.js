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

                if (errors) {
                    button.prop('disabled', true);
                } else button.prop('disabled', false);
            }
        });
    });

    $('form').submit(function(){
        ajaxSend($(this).serialize());
        return false;
    });

    $('table select').on('change', function(){
        ajaxSend($('form').serialize());
    });
});

function ajaxSend(data){
    $.ajax({
        method: 'POST',
        url: '/table/search',
        dataType: 'json',
        data: data,
        success: function(response){
            if (response) {
                $('tr.detach').detach();
                $.each(response, function(key, value){
                    $('tbody').append('<tr><th scope="row">' + value.id + '</th><td>' + value.email + '</td><td>' + value.name + '</td><td>' + value.apartment + '</td><td>' + value.comment + '</td>');
                });
            }
        }
    });
}