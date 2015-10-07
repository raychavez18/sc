//------------- preferences.js -------------//
$(document).on('ready',function () {

    //Notifications
    function eventAdd() {
        $.gritter.add({
            text: 'Your changes have been saved.'
        });
    }

    //Toggle emails
    $(".edit-link").click(function(){
        $("#emailList").toggle();

    });

    //Show Button once values change
    $('select').change(function(e){
        if ($('#defaultItems').val() && $('#dateFormat').val() && $('#timeZone').val()) {
            $('#submitBtn').show();
            $('#cancelBtn').show();
        }
    });

    $('input').change(function(e){
        if ($('#fileUpload').val()) {
            $('#submitBtn').show();
            $('#cancelBtn').show();
        }
    });

    $('input').change(function(e){
        if ($('#fileUploadLink').val()) {
            $('#submitBtn').show();
            $('#cancelBtn').show();
        }
    });


    $('input').keypress(function(e){
        if ($('#editPhoneNumber').val()) {
            $('#submitBtn').show();
            $('#cancelBtn').show();
        }
    });

    //
    $('#cancelBtn').click(function() {
        $('input.form-control.title').prop('disabled', true);
        $('select.form-control.title').prop('disabled', true);
        $('#emailList').hide();
        $('#submitBtn').hide();
        $('#cancelBtn').hide();
    });

    //Edit Phone Number Enable Editing
    $('.edit-link').click(function () {
        $('input.form-control.title').prop("disabled",

            function (i, val) {
                return !val;
        });
    });

    //Edit Preferences dropdown  Enable Editing
    $('.edit-link-pref').click(function () {
        $('select.form-control.title').prop("disabled",
            function (i, val) {
                return !val;
            });
    });

    //Show Button to keep button from appearing/reappearing when page loads.
    $('#fileUploadBtn').show();

    //Hiding File Input
    $("#fileUploadLink").filestyle('destroy');
    $("#fileUploadLink").hide();

    //Submit Handler
    $("#userPrefForm").submit(function(e) {
        //$('#userPrefForm').submit();
        $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled")//Any POST values that are empty will not appear
        $('#submitBtn').hide();
        eventAdd();
        //return true;
    });
});
