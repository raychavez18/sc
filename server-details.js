$(document).ready(function() {

    // Showing text from links
    $(document).on("click","a[name='serverNames']", function (e) {
        var content = ($(this).text());
        $('.server-details-headline-port').html(content);

    });

    $('li.serverDetails').each(function() {
        var height = $(this).height();
        $("li.serverDetails:before").css('height', height);
    });

});
