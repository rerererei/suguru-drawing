<?php
/*
Template Name: 4コマリスト
*/
global $wpdb;

    get_header();
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
meta2.meta_value = 'single-4koma.php'
order by cast(meta1.meta_value as signed) DESC 
limit 10
SQL;
$the_pop_query = $wpdb->get_results($query);
?>
<div class="container">
  <div class="contents">
    <div class="menu-sub">
      <div class="menu-sub-list">
          <a href="/4koma-list" class="selected">人気順</a>
          <a href="/4koma-list-new">新着順</a>
      </div>
    </div>
    <div class="advertisement-area">
      Advertisement
    </div>
    <?php if(!empty($the_pop_query)){?>
      <?php foreach( $the_pop_query as $pop_post ){?>
        <div class="painting-area pop-images">
          <a class="link-area" href="<?php echo get_permalink($pop_post->ID)?>">
            <div class="image"><img class="neta-img" src="<?php echo get_field('4koma_img_title', $pop_post->ID)['sizes']['medium'];?>" alt=""></div>
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
    <?php if(count($the_pop_query) === 10):?>
      <div class="more-btn-top more-button">
        ▽　　もっとみる　　▽
      </div>
    <?php endif;?>
    <div class="advertisement-area-under">
      Advertisement
    </div>
    <?php require_once locate_template('/inst-parts.php', true);?>
  </div><!--end contents-->
</div><!--end container-->
<?php get_footer(); ?>
