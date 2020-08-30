$(document).ready(function(){
    $('.link').click( function(){
        let url = $(this).attr('href');
        $.post('../shorten.php', {'uri': url});
        setTimeout(function () {
            location.reload();
        }, 100)
    });
});