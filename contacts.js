//------------- contact.js -------------//

$(document).ready(function () {
    ///Notifications
    function eventAdd() {
        $.gritter.add({
            text: 'Your changes have been saved.'
        });
    }

    //Hide from Submit Button
    $('#submitBtn').hide();
    $('#cancelBtn').hide();
    $('.add_field_button').hide();
    $('.add_field_button_email').hide();

    //Remove disabled from fields when Edit Contact Details is clicked
    $('#editContactDetails').click(function(){
        $('input.form-control.title').removeAttr('disabled');
    });
    $('#editContactDetails').click(function(){
        $('textarea.form-control.title').removeAttr('disabled');
    });

    //On key press for Edit Contact Details the submit button will show
    $('#editContactDetails').click(function(){
        $('#cancelBtn').show();
        $('#submitBtn').show();
        $('.add_field_button').show();
        $('.add_field_button_email').show();
        $('#editContactDetails').hide();
    });




    //On key press cancel button the Edit Contact Details link will show
    $('#cancelBtn').click(function(){
        $('#editContactDetails').show();
        $('input.form-control.title').prop('disabled', true);
        $('#internNotes').prop('disabled', true);
        $('#contactNotes').prop('disabled', true);
        //$('textarea.form-control.title').prop('disabled', true);
        $('.add_field_button').hide();
        $('.add_field_button_email').hide();
        $('#cancelBtn').hide();
        $('#submitBtn').hide();



    });

    //Add Phone number
        var max_fields      = 6; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input class="form-control small title" name="altPhoneNumber" placeholder="Optional" id="altPhoneNumber" type="text" name="mytext[]"/><a href="#" class="remove_field pl5">x</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        });

    //Add Email
        var max_fields      = 6; //maximum input boxes allowed
        var wrapper_email         = $(".input_fields_wrap_email"); //Fields wrapper
        var add_button_email      = $(".add_field_button_email"); //Add button ID

        var y = 1; //initlal text box count
        $(add_button_email).click(function(e){ //on add input button click
            e.preventDefault();
            if(y < max_fields){ //max input box allowed
                y++; //text box increment
                $(wrapper_email).append('<div><input class="form-control small title" name="altEmail" id="altEmail" placeholder="Optional" type="text" name="mytextemail[]"/><a href="#" class="remove_field_email pl5">x</a></div>'); //add input box
            }
        });

        $(wrapper_email).on("click",".remove_field_email", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        });

    //------------- Form validation -------------//
    $("#contactForm").validate({
        ignore: null,
        ignore: 'input[type="hidden"]',
        errorPlacement: function( error, element ) {
            var place = element.closest('.input-group');
            if (!place.get(0)) {
                place = element;
            }
            if (place.get(0).type === 'checkbox') {
                place = element.parent();
            }
            if (error.text() !== '') {
                place.after(error);
            }
        },
        errorClass: 'help-block',
        rules: {
            email: {
                required: true,
                email: true
            },
            select2: "required",
            password: {
                required: true,
                minlength: 5
            },
            textarea: {
                required: true,
                minlength: 10
            },
            maxLenght: {
                required: true,
                maxlength: 10
            },
            rangelenght: {
                required: true,
                rangelength: [10, 20]
            },
            url: {
                required: true,
                url: true
            },
            range: {
                required: true,
                range: [5, 10]
            },
            minval: {
                required: true,
                min: 13
            },
            maxval: {
                required: true,
                max: 13
            },
            date: {
                required: true,
                date: true
            },
            number: {
                required: true,
                number: true
            },
            digits: {
                required: true,
                digits: true
            },
            ccard: {
                required: true,
                creditcard: true
            },
            agree: "required"
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            agree: "Please accept our policy",
            textarea: "Write some info for you",
            select2: "Please select something"
        },
        highlight: function( label ) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function( label ) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        }
    });

    //If input fields are empty don't show
    if($('input#altPhoneNumber').val() == '' ){$('input#altPhoneNumber').hide();}

    $('input#altPhoneNumber').on('change' , function() {

        if( this.value != ''){

            $('.add_field_button').show();
        }
        else{
            $('.add_field_button').hide();
        }
    });

   if($('input#altEmail').val() == '' ){$('input#altEmail').hide();}

    $('input#altEmail').on('change' , function() {

        if( this.value != ''){

            $('.input_fields_wrap_email').show();
        }
        else{
            $('.input_fields_wrap_email').hide();
        }
    });


        //Submit Handler
    $("#contactForm").submit(function(e) {
        if ($('#contactForm').valid()) {
            $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled")//Any POST values that are empty will not appear
        }
        eventAdd();
        $(this).form.submit();
    });
});
