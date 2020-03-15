<?php
/*
Template Name: 2コマ
Template Post Type: post
*/
?>

<?php get_header(); ?>
<?php global $post;?>
<?php
// 記事のビュー数を更新(ログイン中・ロボットによる閲覧時は除く)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>
<div class="container">
  <div class="contents">
    <div class="advertisement-area">
      広告
    </div>
    <div class="painting-area">
      <div class="image"><img class="neta-img" src="<?php echo get_field('2koma_img_title', $post->ID)['url'];?>" alt=""></div>
      <div class="image"><img class="neta-img" src="<?php echo get_field('2koma_img_1st', $post->ID)['url'];?>" alt=""></div>
      <div class="image"><img class="neta-img" src="<?php echo get_field('2koma_img_2nd', $post->ID)['url'];?>" alt=""></div>
      <div class="painting-title"><?php echo $post->post_title;?></div>
      <div class="like-area">
        <div class="view-cnt">
          <p><i class="fas fa-eye"></i> <?php echo getPostViews($post->ID);?> view</div>
          </p>
      </div>
    </div>
    <?php
      $prevpost = get_adjacent_post(true, '', true); //前の記事
      $nextpost = get_adjacent_post(true, '', false); //次の記事
    ?>    

<?php if($nextpost){?>
    <a href="<?php echo get_permalink($nextpost->ID)?>">
        <div class="next-post">
        <div class="previous-img">◀︎</div>
        <div class="next-text"><?php echo get_the_title($nextpost->ID);?></div>
        <div class="next-detail">
        <?php if(get_post_meta( $nextpost->ID , '_wp_page_template', true ) === 'single-1koma.php' ){
                    $next_slug = '1koma_img';
                  }elseif(get_post_meta( $nextpost->ID , '_wp_page_template', true ) === 'single-2koma.php' ){
                    $next_slug = '2koma_img_title';
                  }elseif(get_post_meta( $nextpost->ID , '_wp_page_template', true ) === 'single-3koma.php' ){
                    $next_slug = '3koma_img_title';
                  }elseif(get_post_meta( $nextpost->ID , '_wp_page_template', true ) === 'single-4koma.php' ){
                    $next_slug = '4koma_img_title';
                  }
            ?>
            <img src="<?php echo get_field($next_slug, $nextpost->ID)['url'];?>" alt="">
        </div>
        </div>
    </a>
  <?php }?>

  <?php if($prevpost){?>
    <a href="<?php echo get_permalink($prevpost->ID)?>">
        <div class="previous-post">
        <div class="previous-detail">
        <?php if(get_post_meta( $prevpost->ID , '_wp_page_template', true ) === 'single-1koma.php' ){
                    $prev_slug = '1koma_img';
                  }elseif(get_post_meta( $prevpost->ID , '_wp_page_template', true ) === 'single-2koma.php' ){
                    $prev_slug = '2koma_img_title';
                  }elseif(get_post_meta( $prevpost->ID , '_wp_page_template', true ) === 'single-3koma.php' ){
                    $prev_slug = '3koma_img_title';
                  }elseif(get_post_meta( $prevpost->ID , '_wp_page_template', true ) === 'single-4koma.php' ){
                    $prev_slug = '4koma_img_title';
                  }

            ?>
            <img src="<?php echo get_field($prev_slug, $prevpost->ID)['url'];?>" alt="">
        </div>
        <div class="previous-text"><?php echo get_the_title($prevpost->ID);?></div>
        <div class="next-img">▶︎</div>
        </div>
    </a>
  <?php }?>
     <h2>
      まだ見ていく？
    </h2>
    <?php
      $query = <<<SQL
SELECT post.ID, post.post_title 
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
meta1.meta_value = 'single-2koma.php'
order by post.post_date desc
limit 10
SQL;
      $recommend_post = $wpdb->get_results($query);
    ?>
    <ul class="recommend-posts">
    <?php 
      foreach( $recommend_post as $post ){
        ?>
        <a class="recommend-post" href="<?php echo get_permalink($post->ID);?>">
          <li>
            <div class="recommend-image"><img src="<?php echo get_field('2koma_img_title', $post->ID)['sizes']['medium'];?>" alt="<?php echo $post->post_title ?>"></div>
            <div class="recommend-title"><?php echo $post->post_title ?></div>
          </li>
      </a>
      <?php
        }
      ?>
    </ul>
    <?php require_once locate_template('/recommend_image.php', true);?>
    <div class="advertisement-area">
      Advertisement
    </div>
  </div><!--end contents-->
</div><!--end container-->
<?php get_footer(); ?>
