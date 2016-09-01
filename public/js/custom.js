/**
 * Created by Saf on 01/09/2016.
 */
$(window).on('resize', function() {
    var width = $(window).width(),
        height = $(window).height();
    if ((width <= 768)) {
        $('.navbar-default, nav').css('cssText', 'background-color: #f8f8f8 !important');
        $('#imgbrand').css('height', '30px');
        $('.vr').css('display', 'none');
        $('.leftSide').css('margin-left', '100px');
        $('.leftSide').css('margin-bottom', '50px');
        $('.hr').css('display', 'block');
    } else {
        $('.navbar-default').css('background-color', 'rgba(255, 255, 255, 0.0)');
        $('#imgbrand').css('height', 'auto');
        $('.vr').css('display', 'block');
        $('.leftSide').css('margin-left', '40px');
        $('.leftSide').css('margin-bottom', '0px');
        $('.hr').css('display', 'none');
    }
})