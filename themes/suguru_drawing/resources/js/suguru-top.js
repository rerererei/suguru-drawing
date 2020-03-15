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

// スライダー
$(function() {
    // $('.painting-area').slick();
});

var now_post_num = 10; // 現在表示されている数
var get_post_num = 10; // もっと読むボタンを押した時に取得する数
 
$(function() {
    $('.more-button').click(function(){
     
    // jQuery("#more").html('<img class="ajax_loading" src="http://sample_site.com/wp-content/themes/okuda/img/ajax-loader.gif" />');
    console.log('more click!');
    jQuery.ajax({
        type: 'post',
        url: 'https://test1.deaitaiken-st.info/wp-content/themes/suguru_drawing/more.php',
        data: {
            'now_post_num': now_post_num,
            'get_post_num': get_post_num,
            'pathname': location.pathname
        },
        success: function(data) {
            now_post_num = now_post_num + get_post_num;
            data = JSON.parse(data);
            jQuery(".more-button").before(data['html']);
            if (data['noDataFlg']) {
                jQuery(".more-button").remove();
                // jQuery(".main").append('<p class="more-button">もっと表示する</p>');
            }
        }
    });
    return false;
    });
});

