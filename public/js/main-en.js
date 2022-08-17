var favicon = new Favico({
    bgColor: '#dc0000',
    textColor: '#fff',
    animation: 'slide',
    fontStyle: 'bold',
    fontFamily: 'sans',
    type: 'circle'
});
$("#validate-form").validate({ignore: [],})
document.addEventListener("DOMContentLoaded", function(event) {
   $.extend( $.validator.messages, {
        required: "Please fill in this field",
        remote: "Please correct this field to continue",
        email: "Please enter a valid email address",
        url: "Please enter a valid website address",
        date: "Please enter a valid date",
        dateISO: "Please enter a valid date (ISO)",
        number: "Please enter a number correctly",
        digits: "Please enter numbers only",
        creditcard: "Please enter a valid credit card number",
        equalTo: "Please enter the same value",
        extension: "Please enter a file with an approved extension",
        maxlength: $.validator.format( "The maximum number of characters is {0}" ),
        minlength: $.validator.format( "The minimum number of characters is {0}" ),
        rangelength: $.validator.format( "The number of characters must be between {0} and {1}" ),
        range: $.validator.format( "Please enter a number whose value is between {0} and {1}" ),
        max: $.validator.format( "Please enter a number less than or equal to {0}" ),
        min: $.validator.format( "Please enter a number greater than or equal to {0}" )
    });
});
Fancybox.bind("[data-fancybox]", {});
Fancybox.bind("img.data-fancybox", {});
Fancybox.bind(".data-fancybox img", {});
$('.asideToggle').on('click', function() {
    $('.aside').toggleClass('active');
    $('.aside').toggleClass('in-active');
    $('.main-content').toggleClass('active');
    $('.main-content').toggleClass('in-active');
});
$("a[href='" + window.location.href + "'] >div").addClass('active');
$('.alert-click-hide').on('click', function() {
    $(this).fadeOut();
});
toastr.options = {progressBar:true,preventDuplicates:true,newestOnTop:true,positionClass:'toast-top-left',timeOut:10000}
let smart_alert = toastr;

/* 1. Proloder */
$(window).on('load', function () {
    $('#preloader-active').delay(450).fadeOut('slow');
    $('body').delay(450).css({
      'overflow': 'visible'
    });
  });
