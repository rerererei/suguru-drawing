// 新着と人気の切り替えを行います
$(function() {
    $('.menu-sub-list ul li.pops').click(function(){
        $(this).addClass('selected');
        $(this).parent().find('.news').removeClass('selected');
        $('.new-images').css('display', 'none');
        $('.pop-images').css('display', '');
        $('.pop-images').hide().fadeIn('slow');
    });
});

$(function() {
    $('.menu-sub-list ul li.news').click(function(){
        $(this).addClass('selected');
        $(this).parent().find('.pops').removeClass('selected');
        $('.pop-images').css('display', 'none');
        $('.new-images').css('display', '');
        $('.new-images').hide().fadeIn('slow');
    });
});

// もっとみるボタンの制御
$(function() {
    $('.more-btn-top').click(function(){
        $('.painting-area').removeClass('display-none');
        $(this).addClass('display-none');
    });
});