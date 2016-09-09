jQuery(document).ready(function(){
    height();
    var toggle = document.getElementById('btn_nav');
    toggleHandler(toggle);
});
jQuery(window).resize(function(e) {
    height();
});

function height() {
    if(jQuery('#content_wrapper').height() < jQuery(window).height()) {jQuery('#content_wrapper').height(jQuery(window).height()-40);}
}

function toggleHandler(toggle) {
    toggle.addEventListener( 'click', function(e) {
        e.preventDefault();
        if(this.classList.contains('is-active') === true) {
            this.classList.remove('is-active')
            jQuery('#nav').fadeOut();
            jQuery('#next_tour ul').css('z-index',300);
        }
        else {
            this.classList.add('is-active');
            jQuery('#nav').fadeIn();
            jQuery('#next_tour ul').css('z-index',10);
        }
    });
}
