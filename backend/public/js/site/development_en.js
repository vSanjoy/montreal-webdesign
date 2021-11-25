$.validator.addMethod("valid_email", function(value, element) {
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, "Please enter a valid email");

//Phone number eg. (+91)9876543210
$.validator.addMethod("valid_number", function(value, element) {    
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        return true;
    } else {
        return false;
    }

}, "Please enter a valid phone number");

//Phone number eg. +919876543210
$.validator.addMethod("valid_site_number", function(value, element) {
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        
        if($("#phone_no").val().charAt(0) == '0') {
            return false;
        }
        if($("#phone_no").val().substring(0, 3) == '966') {
            return false;
        }
        return true;
    } else {
        return false;
    }
}, "Please enter a valid phone number");

//minimum 8 digit,small+capital letter,number,specialcharacter
$.validator.addMethod("valid_password", function(value, element) {
    if (/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value)) {
        return true;
    } else {
        return false;
    }
});

//Alphabet or number
$.validator.addMethod("valid_coupon_code", function(value, element) {
    if (/^[a-zA-Z0-9]+$/.test(value)) {
        return true;
    } else {
        return false;
    }
});

//Integer and decimal
$.validator.addMethod("valid_amount", function(value, element) {
    if (/^[1-9]\d*(\.\d+)?$/.test(value)) {
        return true;
    } else {
        return false;
    }
});

//Pack value 
$.validator.addMethod("pack_value", function(value, element) {
    //if (/^(?=.*[0-9])[- +()0-9]+$/.test(value)) {
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, 'Please enter valid pack value');

//Pack value create bid 
$.validator.addMethod("pack_value_create_bid", function(value, element) {
    
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        return true;
    } else {
        $("#error_bids").html('');
        return false;
    }
}, 'Please enter valid pack value');

// quantity value check for create bid
$.validator.addMethod("quantity_create_bid", function(value, element) {
    
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        return true;
    } else {
        $("#error_bids").html('');
        return false;
    }
}, 'Please enter valid quantity');

// check value of minimum amount for create bid
$.validator.addMethod("minimum_amount_create_bid", function(value, element) {
    
    if (/^(?:[+]9)?[0-9]+$/.test(value)) {
        return true;
    } else {
        $("#error_bids").html('');
        return false;
    }
}, 'Please enter valid minimum amount');


//mrp
$.validator.addMethod("mrp", function(value, element) {
   
    if (/^[1-9]\d*(\.\d+)?$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, 'Please enter valid amount');

//selling_price
$.validator.addMethod("selling_price", function(value, element) {
    //if (/^(?=.*[0-9])[- +()0-9]+$/.test(value)) {
    if (/^[1-9]\d*(\.\d+)?$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, 'Please enter valid amount');

//End date should be greater than Start date
$.validator.addMethod("greaterThan", function(value, element, params) {
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }
    return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val()));
}, 'Must be greater than start date');

//End date should be greater than Start date for create bid
$.validator.addMethod("greaterThanED_create_bid", function(value, element, params) {
    $("#error_bids").html('');
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }
    return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val()));
}, 'Must be greater than start date');

var overallErrorMessage         = '';
var pleaseFillOneField          = 'You missed 1 field. It has been highlighted.';
var pleaseFillMoreFieldFirst    = 'You have missed ';
var pleaseFillMoreFieldLast     = ' fields. Please fill before submitted.';
var successMessage              = 'Success';
var errorMessage                = 'Error';
var warningMessage              = 'Warning';
var infoMessage                 = 'Info';
var btnSubmitting               = 'Submitting...';
var btnUpdating                 = 'Updating...';
var thankYouMessage             = 'Thank You';
var formSuccessMessage          = 'Form has been submitted successfully. We will get back to you soon.';
var somethingWrongMessage       = 'Something went wrong, please try again later.';


$(document).ready(function() {
    var websiteLink = $('#website_link').val();
    var siteLang = $('#website_lang').val();
    var ajax_check = false;

    $('.website_language').on('click', function() {
        var langValue = $(this).data('lang');
        var websiteUrl = window.location.href;
        var splitAll = websiteUrl.split('/');
        var keyVal = '';
        splitAll.forEach(function(item, index){
            if(item == 'en' || item == 'ar') {
                keyVal = index;
            }
        });
        splitAll[keyVal]= langValue;
        var setLangUrl  =  splitAll.join('/');
        window.location = setLangUrl;
    });

    // Contact form validate
    $("#contactForm").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                valid_email: true,
            },
            subject: {
                required: true,
            },
            message: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter name",
            },
            email: {
                required: "Please enter email",
                valid_email: "Please enter valid email",
            },
            subject: {
                required: "Please enter subject",
            },
            message: {
                required: "Please enter message",
            }
        },
        errorClass: 'error',
        errorElement: 'div',
        // highlight: function (element, errorClass, validClass) {
        //     $(element).addClass('is-invalid');
        // },
        // unhighlight: function (element, errorClass, validClass) {
        //     $(element).removeClass('is-invalid');
        // },
        // invalidHandler: function(form, validator) {
        //     var numberOfInvalids = validator.numberOfInvalids();
        //     if (numberOfInvalids) {
        //         overallErrorMessage = numberOfInvalids == 1 ? pleaseFillOneField : pleaseFillMoreFieldFirst + numberOfInvalids + pleaseFillMoreFieldLast;
        //     } else {
        //         overallErrorMessage = '';
        //     }
        //     toastr.error(overallErrorMessage, errorMessage+'!');
        // },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            $('.preloader').show();
            if (ajax_check) {
                return;
            }
            ajax_check = true;
            var contactSubmitUrl = websiteLink + '/' + siteLang + '/ajax-contact-submit';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: contactSubmitUrl,
                method: 'POST',
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    subject: $('#subject').val(),
                    message: $('#message').val(),
                },
                dataType: 'json',
                success: function (response) {
                    $('.preloader').hide();
                    ajax_check = false;
                    if (response.type == 'success') {
                        $('#contactForm')[0].reset();
                        toastr.success(formSuccessMessage, thankYouMessage+'!');
                    } else {
                        toastr.error(somethingWrongMessage, errorMessage+'!');
                    }
                }
            });
        }
    });

    // Career form validate
    $("#careerForm").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                valid_email: true,
            },
            phone: {
                required: true,
            },
            subject: {
                required: true,
            },
            year_of_experience: {
                required: true,
            },
            dob: {
                required: true,
            },
            why_you_want_to_work_with_us: {
                required: true,
            },
            captcha: {
                required: true,
            }
        },
        messages: {
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            email: {
                required: "Please enter email",
                valid_email: "Please enter valid email",
            },
            phone: {
                required: "Please enter mobile number",
            },
            subject: {
                required: "Please enter jape title",
            },
            year_of_experience: {
                required: "Please enter years of experience",
            },
            dob: {
                required: "Please select date of birth",
            },
            why_you_want_to_work_with_us: {
                required: "Please enter why you want to work with us",
            },
            captcha: {
                required: "Please enter captcha",
            },
        },
        errorClass: 'error',
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if ($(element).attr('id') == 'captcha') {
                error.insertAfter($(element).parents('div.input-group'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            $('.preloader').show();
            form.submit();
        }
    });

});

function sweetalertMessageRender(target, message, type, confirm = false) {
    let options = {
        title: '',
        text: message,
        icon: type,
        type: type,
        confirmButtonColor: '#144B8B',
        cancelButtonColor: '#02C402',
    };
    if (confirm) {
        options['showCancelButton'] = true;
        options['cancelButtonText'] = 'Cancel';
        options['confirmButtonText'] = 'Yes';
    }
    return Swal.fire(options).then((result) => {
        if (confirm == true && result.value) {
            window.location.href = target.getAttribute('data-href'); 
        } else {
            return (false);
        }
    });
}
