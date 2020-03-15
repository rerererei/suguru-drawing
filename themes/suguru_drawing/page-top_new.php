<?php 
/*
Template Name: トップページ新着順
*/
?>
<?php get_header(); ?>
<?php
    $args = array(
      'posts_per_page' => 10,
      'order'          => 'DESC',
      'orderby'        => 'date'
      );
    $the_new_query = get_posts( $args );
    $pop_count=0;
    $new_count=0;

?>
<div class="container">
  <div class="contents">
    <div class="menu-sub-list">
        <a href="/">人気順</a>
        <a href="/top-new" class="selected">新着順</a>
    </div>
    <div class="advertisement-area">
      Advertisement
    </div>
    <section id="content" class="main">
      <?php foreach($the_new_query as $post_info):?>
        <?php // テンプレートの判定
          $image_url = '';
          $temp_name = get_post_meta($post_info->ID, '_wp_page_template', true);
          if ($temp_name === 'single-1koma.php'){
            $image_url = get_field('1koma_img', $post_info->ID)['url'];
          }elseif($temp_name === 'single-2koma.php'){
            $image_url = get_field('2koma_img_title', $post_info->ID)['url'];
          }elseif($temp_name === 'single-3koma.php'){
            $image_url = get_field('3koma_img_title', $post_info->ID)['url'];
          }elseif($temp_name === 'single-4koma.php'){
            $image_url = get_field('4koma_img_title', $post_info->ID)['url'];
          }
          ?>
          <div class="painting-area">
            <a class="link-area" href="<?php echo get_permalink($post_info->ID);?>">
              <div class="image"><img class="neta-img" src="<?php echo $image_url;?>" alt="<?php echo get_the_title($post_info->ID);?>"></div>
              <div class="painting-title"><?php echo get_the_title($post_info->ID);?></div>
            </a>
            <div class="like-area">
              <div class="view-cnt">
                <p><i class="fas fa-eye"></i> <?php echo getPostViews($post_info->ID);?> views
                </p>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    <?php wp_reset_query(); ?>
    <?php if (count($the_new_query) === 10 ):?>
      <div class="more-btn-top more-button">
        ▽　　もっとみる　　▽
      </div>
    <?php endif;?>
  </section>



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
