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
    //converty password Field to Text Field On Hover
    var passField = $('.password')
    $('.show-pass').hover(function(){
        passField.attr('type', 'text');
    }, function () {
        passField.attr('type', 'password');
    })
});