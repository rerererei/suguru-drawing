<?php get_header(); ?>
<?php
    $args = array(
      'post_type' => 'post',
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'order'=>'DESC',
      'posts_per_page' => 10,
    );

    $the_pop_query = new WP_Query( $args );

    $args = array(
      'posts_per_page' => -1,
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
        <a href="/" class="selected">人気順</a>
        <a href="/top-new">新着順</a>
    </div>
    <div class="advertisement-area">
      Advertisement
    </div>
    <section id="content" class="main">
      <?php while($the_pop_query->have_posts()): $the_pop_query->the_post();?>
        <?php // テンプレートの判定
          $image_url = '';
          $temp_name = get_post_meta($post->ID, '_wp_page_template', true);
          if ($temp_name === 'single-1koma.php'){
            $image_url = get_field('1koma_img', $post->ID)['url'];
          }elseif($temp_name === 'single-2koma.php'){
            $image_url = get_field('2koma_img_title', $post->ID)['url'];
          }elseif($temp_name === 'single-3koma.php'){
            $image_url = get_field('3koma_img_title', $post->ID)['url'];
          }elseif($temp_name === 'single-4koma.php'){
            $image_url = get_field('4koma_img_title', $post->ID)['url'];
          }
          ?>
          <div class="painting-area">
            <a class="link-area" href="<?php echo get_permalink($post->ID);?>">
              <div class="image"><img class="neta-img" src="<?php echo $image_url;?>" alt="<?php echo get_the_title($post->ID);?>"></div>
              <div class="painting-title"><?php echo get_the_title($post->ID);?></div>
            </a>
            <div class="like-area">
              <div class="view-cnt">
                <p><i class="fas fa-eye"></i> <?php echo getPostViews();?> views
                </p>
              </div>
            </div>
          </div>
      <?php endwhile; ?>
      <?php if(count($the_pop_query->posts) === 10):?>
      <div class="more-btn-top more-button">
        ▽　　もっとみる　　▽
      </div>
      <?php endif;?>
      <?php wp_reset_query(); ?>
</section>



    <div class="advertisement-area-under">
      Advertisement
    </div>
    <?php require_once locate_template('/inst-parts.php', true);?>
  </div><!--end contents-->
</div><!--end container-->
<?php get_footer(); ?>
