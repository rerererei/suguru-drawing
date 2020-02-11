<?php
/*
Template Name: 3コマリスト
*/
global $wpdb;

    get_header();
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
meta1.meta_value = 'single-3koma.php'
order by post.post_date desc
SQL;
$the_new_query = $wpdb->get_results($query);

$pop_count=0;
$new_count=0;

    $query = <<<SQL
SELECT post.ID, post.post_title 
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
meta2.meta_value = 'single-3koma.php'
order by meta1.meta_value desc
SQL;
$the_pop_query = $wpdb->get_results($query);
?>
<div class="container">
  <div class="contents">
    <div class="menu-sub">
      <div class="menu-sub-list">
        <ul>
          <li class="pops selected">人気順</li>
          <li class="news">新着順</li>
        </ul>
      </div>
    </div>
    <div class="advertisement-area">
      Advertisement
    </div>
    <?php if(!empty($the_pop_query)){?>
      <?php foreach( $the_pop_query as $pop_post ){?>
        <?php if($pop_count < 5){ ?>
          <div class="painting-area pop-images">
        <?php }else{?>
          <div class="painting-area pop-images display-none">
        <?php } ?>
          <a class="link-area" href="<?php echo get_permalink($pop_post->ID)?>">
            <div class="image"><img class="neta-img" src="<?php echo get_field('3koma_img_title', $pop_post->ID)['sizes']['medium'];?>" alt=""></div>
            <div class="painting-title"><?php echo $pop_post->post_title;?></div>
          </a>
          <div class="like-area">
            <div class="view-cnt">
              <p><i class="fas fa-eye"></i> <?php echo getPostViews($pop_post->ID);?> views</div>
              </p>
          </div>
        </div>
      <?php
          $pop_count++; 
        } ?>
    <?php } ?>
    <?php if(!empty($the_new_query)){?>
      <?php foreach($the_new_query as $post){?>
        <?php if($new_count < 5){ ?>
          <div class="painting-area new-images">
        <?php }else{?>
          <div class="painting-area new-images display-none">
        <?php } ?>
          <a class="link-area" href="<?php echo get_permalink($post->ID)?>">
            <div class="image"><img class="neta-img" src="<?php echo get_field('1koma_img', $post->ID)['url'];?>" alt=""></div>
            <div class="painting-title"><?php echo $post->post_title;?></div>
          </a>
          <div class="like-area">
            <div class="view-cnt">
              <p><i class="fas fa-eye"></i> <?php echo getPostViews($post->ID);?> views</div>
              </p>
          </div>
        </div>
      <?php 
            $new_count++;
            }?>
    <?php }?>
    <div class="more-btn-top">
      ▽　　もっとみる　　▽
    </div>
    <div class="advertisement-area-under">
      Advertisement
    </div>
    <div class="suguru-inst">
      <div class="pic">
        <img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/icon.jpg " >
      </div>
      <p class="text">芸人の紹介</p>
    </div>
  </div><!--end contents-->
</div><!--end container-->
<?php get_footer(); ?>
