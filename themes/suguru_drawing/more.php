<?php
    require_once("../../../wp-config.php");
    $now_post_num = $_POST['now_post_num'];
    $get_post_num = $_POST['get_post_num'];
    $pathname = $_POST['pathname'];
    $next_now_post_num = $now_post_num + $get_post_num;
    $next_get_post_num = $get_post_num + $get_post_num;

    switch ($pathname){
        case '/1koma-list' :
            $meta_value = '1koma';
            break;
        case '/1koma-list-new' :
            $meta_value = '1koma';
            break;
        case '/2koma-list' :
            $meta_value = '2koma';
            break;
        case '/2koma-list-new' :
            $meta_value = '2koma';
            break;
        case '/3koma-list' :
            $meta_value = '3koma';
            break;
        case '/3koma-list-new' :
            $meta_value = '3koma';
            break;
        case '/4koma-list' :
            $meta_value = '4koma';
            break;
        case '/4koma-list-new' :
            $meta_value = '4koma';
            break;
    }

    if ($pathname === '/' || $pathname === '/1koma-list'
    || $pathname == '/2koma-list' || $pathname === '/3koma-list' || $pathname === '/4koma-list') {
        if($pathname === '/'){
            $sql_now = "SELECT
                    $wpdb->posts.ID,
                    $wpdb->posts.post_title,
                    $wpdb->posts.post_content
                FROM 
                    $wpdb->posts 
                left join
                    $wpdb->postmeta
                on
                    $wpdb->posts.ID = $wpdb->postmeta.post_id 
                WHERE 
                    $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
                and
                    $wpdb->postmeta.meta_key = 'post_views_count'
                ORDER BY 
                    cast($wpdb->postmeta.meta_value as signed) DESC 
                LIMIT %d, %d";
                // LIMIT $now_post_num, $get_post_num";
        }else{
            $sql_now = "SELECT post.ID, post.post_title 
                FROM $wpdb->posts as post
                left join 
                $wpdb->postmeta  as meta1
                on
                post.id = meta1.post_id
                left join
                $wpdb->postmeta  as meta2
                on
                post.id = meta2.post_id 
                where
                post.post_status = 'publish'
                and
                post.post_type = 'post'
                and
                meta1.meta_key = 'post_views_count'
                and
                meta2.meta_value = 'single-$meta_value.php'
                order by meta1.meta_value desc
                limit %d, %d";
        }
        $pre = $wpdb->prepare($sql_now,$now_post_num,$get_post_num); // 追記
        $results = $wpdb->get_results($pre);
        // $results = $wpdb->get_results($spl);
        
        $sql_next = "SELECT
                $wpdb->posts.ID, 
                $wpdb->posts.post_title, 
                $wpdb->posts.post_content 
            FROM 
                $wpdb->posts  
            left join
                $wpdb->postmeta
            on
                $wpdb->posts.ID = $wpdb->postmeta.post_id 
            WHERE 
                $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
            and
                $wpdb->postmeta.meta_key = 'post_views_count'
            ORDER BY 
                cast($wpdb->postmeta.meta_value as signed) DESC 
            LIMIT %d, %d";
            // LIMIT $next_now_post_num, $next_get_post_num";

        $next_pre = $wpdb->prepare($sql_next,$next_now_post_num,$next_get_post_num); // 追記
        $next_results = $wpdb->get_results($next_pre);
        // $next_results = $wpdb->get_results($spl);
        
        $noDataFlg = 0;
        if ( count($results) < $get_post_num || !count($next_results) ) {
            $noDataFlg = 1;
        }

        $html = "";
        
        foreach ($results as $result) {
            // テンプレートの判定
            $image_url = '';
            $temp_name = get_post_meta($result->ID, '_wp_page_template', true);
            if ($temp_name === 'single-1koma.php'){
            $image_url = get_field('1koma_img', $result->ID)['url'];
            }elseif($temp_name === 'single-2koma.php'){
            $image_url = get_field('2koma_img_title', $result->ID)['url'];
            }elseif($temp_name === 'single-3koma.php'){
            $image_url = get_field('3koma_img_title', $result->ID)['url'];
            }elseif($temp_name === 'single-4koma.php'){
            $image_url = get_field('4koma_img_title', $result->ID)['url'];
            }
            
            $html .= '<div class="painting-area">';
            $html .= '<a class="link-area" href="'. get_permalink($result->ID) .'">';
            $html .= '<div class="image"><img class="neta-img" src="'.  $image_url .'" alt="' . get_the_title($result->ID). '"></div>';
            $html .= '<div class="painting-title">'. get_the_title($result->ID). '</div>';
            $html .= '</a>';
            $html .= '<div class="like-area">';
            $html .= '<div class="view-cnt">';
            $html .= '<p><i class="fas fa-eye"></i>' .getPostViews($result->ID). ' views';
            $html .= '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $returnObj = array();
        $returnObj = array(
            'noDataFlg' => $noDataFlg,
            'html' => $html
        );
        $returnObj = json_encode($returnObj);

    }elseif($pathname === '/top-new' || $pathname === '/1koma-list-new' ||$pathname === '/2koma-list-new' 
            ||$pathname === '/4koma-list-new' || $pathname === '/3koma-list-new'){

        if($pathname === '/top-new'){
            $sql_now = "SELECT
                    $wpdb->posts.ID,
                    $wpdb->posts.post_title,
                    $wpdb->posts.post_content
                FROM 
                    $wpdb->posts 
                WHERE 
                    $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
                ORDER BY 
                    $wpdb->posts.post_date DESC 
                LIMIT %d, %d";
        }else{
            $sql_now = "SELECT post.ID, post.post_title 
                FROM $wpdb->posts as post
                left join 
                $wpdb->postmeta as meta1
                on
                post.id = meta1.post_id
                where
                post.post_status = 'publish'
                and
                post.post_type = 'post'
                and
                meta1.meta_value = 'single-$meta_value.php'
                order by post.post_date desc
                LIMIT %d, %d";
            }
        // LIMIT $now_post_num, $get_post_num";
        $pre = $wpdb->prepare($sql_now,$now_post_num,$get_post_num); // 追記
        $results = $wpdb->get_results($pre);
        // $results = $wpdb->get_results($spl);
        if($pathname === '/top-new'){
            $sql_next = "SELECT
                $wpdb->posts.ID,
                $wpdb->posts.post_title,
                $wpdb->posts.post_content
            FROM 
                $wpdb->posts 
            WHERE 
                $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
            ORDER BY 
                $wpdb->posts.post_date DESC 
            LIMIT %d, %d";
            // LIMIT $next_now_post_num, $next_get_post_num";
        }else{
            $sql_now = "SELECT post.ID, post.post_title 
                FROM $wpdb->posts as post
                left join 
                $wpdb->postmeta as meta1
                on
                post.id = meta1.post_id
                where
                post.post_status = 'publish'
                and
                post.post_type = 'post'
                and
                meta1.meta_value = 'single-$meta_value.php'
                order by post.post_date desc
                LIMIT %d, %d";
        }
        $next_pre = $wpdb->prepare($sql_next,$next_now_post_num,$next_get_post_num); // 追記
        $next_results = $wpdb->get_results($next_pre);
        // $next_results = $wpdb->get_results($spl);
        
        $noDataFlg = 0;
        if ( count($results) < $get_post_num || !count($next_results) ) {
            $noDataFlg = 1;
        }

        $html = "";
        
        foreach ($results as $result) {
            // テンプレートの判定
            $image_url = '';
            $temp_name = get_post_meta($result->ID, '_wp_page_template', true);
            if ($temp_name === 'single-1koma.php'){
            $image_url = get_field('1koma_img', $result->ID)['url'];
            }elseif($temp_name === 'single-2koma.php'){
            $image_url = get_field('2koma_img_title', $result->ID)['url'];
            }elseif($temp_name === 'single-3koma.php'){
            $image_url = get_field('3koma_img_title', $result->ID)['url'];
            }elseif($temp_name === 'single-4koma.php'){
            $image_url = get_field('4koma_img_title', $result->ID)['url'];
            }
            
            $html .= '<div class="painting-area">';
            $html .= '<a class="link-area" href="'. get_permalink($result->ID) .'">';
            $html .= '<div class="image"><img class="neta-img" src="'.  $image_url .'" alt="' . get_the_title($result->ID). '"></div>';
            $html .= '<div class="painting-title">'. get_the_title($result->ID). '</div>';
            $html .= '</a>';
            $html .= '<div class="like-area">';
            $html .= '<div class="view-cnt">';
            $html .= '<p><i class="fas fa-eye"></i>' .getPostViews($result->ID). ' views';
            $html .= '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $returnObj = array();
        $returnObj = array(
            'noDataFlg' => $noDataFlg,
            'html' => $html
        );
        $returnObj = json_encode($returnObj);

    }

    echo $returnObj;
?>
