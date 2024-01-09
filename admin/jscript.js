// JavaScript Document
$(document).ready(function(){

  $('.form-field').each( function () {
    $(this).val($(this).attr('defaultVal'));
    $(this).css({color:'#999'});
      });

  $('.form-field').focus(function(){
    if ( $(this).val() == $(this).attr('defaultVal') ){
      $(this).val('');
      $(this).css({color:'#000'});
    }
    });
  $('.form-field').blur(function(){
    if ($(this).val() == '' ){
      $(this).val($(this).attr('defaultVal'));
      $(this).css({color:'#999'});
    }
    });

});