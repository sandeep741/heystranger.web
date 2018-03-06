jQuery(document).ready(function () {

    //////////////////////////////parter from validation start////////////////////////

    $('#frm_accommodation').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            name: {required: true},
            state: {required: true},
            country: {required: true},
            city: {required: true},
            contact_no: {pattern: "(\\(.*\\))(\\s+)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\d)"},
            alternate_no: {pattern: "(\\(.*\\))(\\s+)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\d)"},
            maxfile: true,
        },
        submitHandler: function (form) {

            form.submit();
        }
    });

    $('#frm_room').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            accommo_desc: {required: true},
            "room_desc[]": "required",
            "room_name[]": "required",
            "room_type[]": "required",
            "guest[]": "required",
            "room_qty[]": {required: true, number: true},
            "room_price[]": {required: true, number: true},

            venue_desc: {required: true},
            "venue_short_descr[]": "required",
            "venue_name[]": "required",
            "venue_qty[]": {required: true, number: true},
            "venue_price[]": {required: true, number: true},
            "venue_price_per_seat[]": {required: true, number: true},

            confer_desc: {required: true},
            "confer_short_descr[]": "required",
            "confer_name[]": "required",
            "confer_qty[]": {required: true, number: true},
            "confer_price[]": {required: true, number: true},
            "confer_price_per_seat[]": {required: true, number: true},

            "health_desc": "required",
            "health_short_desc[]": "required",
            "health_name[]": "required",
            "treatment[]": "required",
            "service_price[]": {required: true, number: true},

            "is_room_promo[]": {required: true},
            "room_promo_price[]": {required: true, number: true},
            "room_from_date[]": {required: true},
            "room_to_date[]": {required: true},
            "room_promo_desc[]": {required: true},

            "is_venue_promo[]": {required: true},
            "venue_promo_price[]": {required: true, number: true},
            "venue_from_date[]": {required: true},
            "venue_to_date[]": {required: true},
            "venue_promo_desc[]": {required: true},

            "is_confer_promo[]": {required: true},
            "confer_promo_price[]": {required: true, number: true},
            "confer_from_date[]": {required: true},
            "confer_to_date[]": {required: true},
            "confer_promo_desc[]": {required: true},

            "is_health_promo[]": {required: true},
            "health_promo_price[]": {required: true, number: true},
            "health_from_date[]": {required: true},
            "health_to_date[]": {required: true},
            "health_promo_desc[]": {required: true},

        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#frm_activity').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            amenity_desc: {required: true},
            "amenity_property[]": "required",
            activity_desc: {required: true},
            "activity_property[]": "required",
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#frm_policy').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            deposite: {required: true},
            cancel: {required: true},
            timein: {required: true},
            timeout: {required: true},
            "payment_type[]": "required",
            acco_duration: {required: true},
            corpo_deals: {required: true},
            contract_deal: {required: true},
            policy_terms: {required: true}
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#frm_meta').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            title: {required: true},
            keyword: {required: true},
            meta_desc: {required: true}
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#frm_video').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            video_cond: {required: true},
            video_link: {required: true, url: true},
            lat: {required: true, latCoord: true},
            long: {required: true, longCoord: true},
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    
    $('#partner_register').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            name: {required: true},
            email_id: {required: true, email: true},
            country_id: {required: true},
            state_id: {required: true},
            city_id: {required: true},
            contact_no: {pattern: "(\\(.*\\))(\\s+)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\d)"},
            user_name: {required: true},
            password: {required: true, minlength: 6},
            password_confirmation: {required: true, minlength: 6, equalTo: "#passwords"},
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    
    $('#partner_register1').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            prop_no: {required: true},
            term_condition: {required: true},
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    
    //////////////////////////////end here parter from////////////////////////

    $('#frm_package').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            commision: {required: true, number: true, min: 1, max: 100},
            vat: {number: true, min: 1, max: 100},
            price: {required: true, number: true}
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    ///////////////for laravel login form validation//////////////

    $('#loginforms').validate({// initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            email: {required: true},
            password: {required: true}
        },
        submitHandler: function (form) {

            form.submit();
        }
    });

    /*$('#frm_member_signup').validate({// initialize the plugin
     debug: true,
     errorClass: 'text-danger',
     errorElement: 'span',
     rules: {
     title: {required: true},
     fname: {required: true},
     lname: {required: true},
     gender: {required: true},
     mobile: {required: true, number: true},
     email: {required: true},
     password: {required: true, minlength: 6},
     confirm_password: {required: true, minlength: 6, equalTo: "#passwords"},
     terms_conditions: {required: true}
     },
     submitHandler: function (form) {
     form.submit();
     }
     });*/

    $('#frm_member_forgot').validate({// initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            emails: {required: true}
        },
        submitHandler: function (form) {

            $.setForgotPassword();
        }
    });

///////////////for laravel forgot password form validation//////////////
    $('#forgotpassword').validate({// initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            email: {required: true}
        },
        submitHandler: function (form) {

            form.submit();
        }
    });

    ///////////////for laravel reset password form validation//////////////
    $('#reset_password').validate({// initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            email: {required: true},
            password: {required: true, minlength: 6},
            password_confirmation: {required: true, minlength: 6, equalTo: "#passwords"},
        },
        submitHandler: function (form) {

            form.submit();
        }
    });


    $.setForgotPassword = function (e) {

        $.ajax({
            type: 'POST',
            url: '/ajax/forgot-password',
            headers: {'X-CSRF-TOKEN': csrf_token},
            beforeSend: function () {
                $.loader("on");
            },

            data: {email: $("#emails").val()},

            success: function (res) {

                var obj = JSON.parse(res);

                if (obj.response == "success") {

                    $("#success").css("display", "block");
                    $("#success").html("Password reset link has been sent successfully to your registered email id.");
                    $("#success").delay(2000).fadeOut();
                    //window.location.reload();
                } else {

                    $("#error").css("display", "block");
                    $("#error").html("Please enter a registered e-mail id.");
                    $("#error").delay(2000).fadeOut();

                }

            },
            complete: function () {
                $.loader("off");
            }
        });
    };


    $.forgotPassword = function (e) {
        $("#myModalLabel").html("Forgot Password");
        $(".forgot-password").show();
        $(".member-login-box").hide();
    };

    $.loginPopUp = function (e) {
        $("#myModalLabel").html("Login");
        $(".forgot-password").hide();
        $(".member-login-box").show();
    };

    /////////////reset modal form after close////////////////

    $(".modal").on("hidden.bs.modal", function () {
        window.location.reload();
        $("#frm_member_login").trigger('reset');
        $("#frm_member_login").find('.text-danger').removeClass('text-danger');
        $("#frm_member_forgot").find('.text-danger').removeClass('text-danger');
        $('#email-error').text('');
        $('#password-error').text('');

        $("#emails").val('');
        $('#emails-error').text('');
        $(".forgot-password").hide();
        $(".member-login-box").show();

    });

});


$.validator.addMethod('maxfile', function (value, element) {
    return $.getFileLimit();
}, '');

$.getFileLimit = function () {
    //get the input and the file list
    var input = document.getElementById('acco_image');
    if (input.files.length > 5) {
        $('.validation').css('display', 'block');
        $(".validation").text('Upload Max 5 Files allowed');
        return false;
    } else {
        $('.validation').css('display', 'none');
        $(".validation").text('');
        return true;
    }
}

/*$.validator.addMethod('filesize', function (value, element) {
 return $.getExtension(element);
 },'');
 
 $.getExtension = function (element) {
 if (element.files && element.files.length) {
 file = element.files[0];            
 alert(file.size);
 if( file.size && file.size >= 2048 ){
 $('.validation').css('display','block');
 $(".validation").text('Upload Max 2 MB allowed');
 return false;
 }
 }
 }*/

$.validator.addMethod('latCoord', function (value, element) {
    console.log(this.optional(element))
    return this.optional(element) ||
            value.length >= 4 && /^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
}, 'Your Latitude format has error.')

$.validator.addMethod('longCoord', function (value, element) {
    console.log(this.optional(element))
    return this.optional(element) ||
            value.length >= 4 && /^(?=.)-?((0?[8-9][0-9])|180|([0-1]?[0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
}, 'Your Longitude format has error.')

$.validator.methods.phoneSA = function (value, element) {
    return this.optional(element) || /^(\\(.*\\))(\\s+)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\s+)(\\d)(\\d)(\\d)(\\d)$/.test(value);
}
