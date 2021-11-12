
         $('#mobileMenuOpenBtn').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();

    $('#main-nav').toggleClass('is-open');

    $(document).one('click', function closeMenu (e){
        if($('#main-nav').has(e.target).length === 0){
            $('#main-nav').removeClass('is-open');
        } else {
            $(document).one('click', closeMenu);
        }
    });
});  