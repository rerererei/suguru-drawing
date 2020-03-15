<?php
    $recommend_query = <<<SQL
SELECT post.ID, post.post_title 
FROM $wpdb->posts as post
left join 
$wpdb->postmeta  as meta1
on
post.id = meta1.post_id
where
post.post_status = 'publish'
and
post.post_type = 'post'
and
meta1.meta_key = 'pv_count_monthly'
order by cast(meta1.meta_value as signed) DESC , post.post_date DESC
limit 10
SQL;
$the_recommend_query = $wpdb->get_results($recommend_query);
?>

<h2>
人気急上昇のやつ
</h2>
<ul class="popular-posts">
<?php foreach($the_recommend_query as $reco_post):?>
    <?php
    $image_url = '';
    $temp_name = get_post_meta($reco_post->ID, '_wp_page_template', true);
    if ($temp_name === 'single-1koma.php'){
    $image_url = get_field('1koma_img', $reco_post->ID)['url'];
    }elseif($temp_name === 'single-2koma.php'){
    $image_url = get_field('2koma_img_title', $reco_post->ID)['url'];
    }elseif($temp_name === 'single-3koma.php'){
    $image_url = get_field('3koma_img_title', $reco_post->ID)['url'];
    }elseif($temp_name === 'single-4koma.php'){
    $image_url = get_field('4koma_img_title', $reco_post->ID)['url'];
    }
    ?>
    <a href="<?php echo get_permalink($reco_post->ID)?>">
        <li class="popular-post">
            <div class="popular-image"><img src="<?php echo $image_url?>" alt="<?php echo $reco_post->post_title?>"></div>
            <div class="popular-text">
                <div class="popular-title"><?php echo $reco_post->post_title?></div>
                <div class="popular-like"><i class="fas fa-eye"></i> <?php echo getPostViews($reco_post->ID);?> Views</div>
            </div>
        </li>
    </a>
<?php endforeach;?>
</ul>