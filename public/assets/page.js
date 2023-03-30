$(function () {
    $("a[rel='tab']").click(function (e) {
        let pageurl = $(this).attr('href');
        $.ajax({
            url: pageurl + '?rel=tab', success: function (data) {
                $('#content').html(data);
            }
        });
        if (pageurl != window.location) {
            window.history.pushState({ path: pageurl }, '', pageurl);
        }
        document.title = $(this).attr("ttl") + " " + $("#siteDivider").val() + " " + $("#siteName").val(); $('html, body')
            .animate({ scrollTop: 0 }, 'fast');
        return false;
    });
});

$(window).bind('popstate', function () {
    $.ajax({
        url: location.pathname + '?rel=tab', success: function (data) {
            $('#content').html(data);
        }
    });
});