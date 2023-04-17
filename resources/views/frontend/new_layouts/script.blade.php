<script src="{{ asset('js/frontend.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<!-- APP SCRIPT -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QEPCW2T2F4"></script>
<script>
    const PATH_NAME = window.location.pathname;
    jQuery(document).ready(function () {
    var offset = 750;
    var duration = 500;
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
        jQuery('#return-to-top').css('display', 'flex');
        } else {
        jQuery('#return-to-top').fadeOut(duration);
        }
    });

    jQuery('#return-to-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    })
    });
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-QEPCW2T2F4');
</script>
<script>
    $(document).ready(function () {
        $("meta[property='og:title']").attr("content", `${$("title").text()}`);
    })
</script>
<script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/21853224.js"></script>
