$(function (){
    'use strict';

    //Hide Placeholder On Form Focus
    $('[placeholder]').focus(function (){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', ' ');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'));
    })
    // Add Asterisk on Required Field
    $('ínput').each(function () {
        if($(this).attr('required') === 'required'){
            $(this).after('<span class="asterisk">*</span>');
        }
    });
});