	
<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );


//記事のビュー数メタデータを作成・更新する関数
function setPostViews() {
    $post_id = get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);  //現在のビュー数を取得
    $recommend_view_count = get_post_meta($post_id, 'pv_count_monthly', true);  //現在のビュー数を取得
    //すでにメタデータがあるかどうかで処理を分ける
    $recommend_view_count++;
    update_post_meta($post_id, 'pv_count_monthly', $recommend_view_count);
    if ($view_count === '') {
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
    } else {
        $view_count++;
        update_post_meta($post_id, $custom_key, $view_count);
    }
}
//View取得
function getPostViews($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);
    if ($view_count === '') {
        //まだメタデータが存在していなければ
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
        $view_count = 0;
    }
    return $view_count;  //'Views' の部分は好きな表示に変えてください。
}
