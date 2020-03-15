<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>すぐる画伯のほのぼのマンガ</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/css/suguru-top.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><!--font-awesomeのスタイルシートの呼び出し-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/css/slick.min.js"></script>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<?php wp_head();
global $template;?>
<?php 
$selected_all = '';
$selected_1 = '';
$selected_2 = '';
$selected_3 = '';
$selected_4 = '';
if(basename($template) === 'index.php' || basename($template) === 'page-top_new.php'){
    $selected_all = 'selected';
}elseif(basename($template) === 'single-1koma.php' || basename($template) === 'page-1koma_list.php' || basename($template) === 'page-1koma_list_new.php'){
    $selected_1 = 'selected';
}elseif(basename($template) === 'single-2koma.php' || basename($template) === 'page-2koma_list.php' || basename($template) === 'page-2koma_list_new.php'){
    $selected_2 = 'selected';
}elseif(basename($template) === 'single-3koma.php' || basename($template) === 'page-3koma_list.php' || basename($template) === 'page-3koma_list_new.php'){
    $selected_3 = 'selected';
}elseif(basename($template) === 'single-4koma.php' || basename($template) === 'page-4koma_list.php' || basename($template) === 'page-4koma_list_new.php'){
    $selected_4 = 'selected';
}
?>
<script type='text/javascript' src="<?php echo get_stylesheet_directory_uri(); ?>/resources/js/suguru-top.js"></script>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="header-fixed">
        <div class="header-inner">
            <div class="top-icon">
                <a href="<?php echo home_url()?>">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/icon.jpg" class="top-circle">
                </a>
            </div>
            <h1 class="site-title"><a href="<?php echo home_url()?>">すぐる画伯のほのぼのマンガ</a></h1>
        </div><!--end header-inner-->
        <ul class="header-menu">
            <li class="menu-all <?php echo $selected_all?>"><a href="<?php echo esc_url(home_url()) ?>">すべて</a></li>
            <li class="menu-1koma <?php echo $selected_1?>"><a href="<?php echo esc_url(home_url('1koma-list')) ?>">1コマ</a></li>
            <li class="menu-2koma <?php echo $selected_2?>"><a href="<?php echo esc_url(home_url('2koma-list')) ?>">2コマ</a></li>
            <li class="menu-3koma <?php echo $selected_3?>"><a href="<?php echo esc_url(home_url('3koma-list')) ?>">3コマ</a></li>
            <li class="menu-4koma <?php echo $selected_4?>"><a href="<?php echo esc_url(home_url('4koma-list')) ?>">4コマ</a></li>
        </ul>
    </div>
</header>


