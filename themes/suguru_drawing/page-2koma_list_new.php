<?php
/*
Template Name: 2コマリスト（新着）
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
meta1.meta_value = 'single-2koma.php'
order by post.post_date desc
limit 10
SQL;
$the_new_query = $wpdb->get_results($query);

$new_count=0;
?>
<div class="container">
  <div class="contents">
    <div class="menu-sub">
      <div class="menu-sub-list">
          <a href="/2koma-list">人気順</a>
          <a href="/2koma-list-new" class="selected">新着順</a>
      </div>
    </div>
    <div class="advertisement-area">
      Advertisement
    </div>
    <?php if(!empty($the_new_query)){?>
      <?php foreach($the_new_query as $post){?>
        <div class="painting-area new-images">
          <a class="link-area" href="<?php echo get_permalink($post->ID)?>">
            <div class="image"><img class="neta-img" src="<?php echo get_field('2koma_img_title', $post->ID)['url'];?>" alt=""></div>
            <div class="painting-title"><?php echo $post->post_title;?></div>
          </a>
          <div class="like-area">
            <div class="view-cnt">
              <p><i class="fas fa-eye"></i> <?php echo getPostViews($post->ID);?> views</div>
              </p>
          </div>
        </div>
      <?php }?>
    <?php }?>
    <?php if (count($the_new_query) === 10 ):?>
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
