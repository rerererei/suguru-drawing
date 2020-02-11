<?php get_header(); ?>
<?php
    $args = array(
      'post_type' => 'post',
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'order'=>'DESC',
      'posts_per_page' => 20,
    );

    $the_pop_query = new WP_Query( $args );

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
    <?php if($the_pop_query->have_posts()):?>
      <?php while($the_pop_query->have_posts()): $the_pop_query->the_post();?>
      <?php // テンプレートの判定
          $image_url_list = [];
          $temp_name = get_post_meta($post->ID, '_wp_page_template', true);
          if ($temp_name === 'single-1koma.php'){
            $image_url_list[] = get_field('1koma_img', $post->ID)['url'];
          }elseif($temp_name === 'single-2koma.php'){
            $image_url_list[] = get_field('2koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('2koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('2koma_img_2nd', $post->ID)['url'];
          }elseif($temp_name === 'single-3koma.php'){
            $image_url_list[] = get_field('3koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_2nd', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_3rd', $post->ID)['url'];
          }elseif($temp_name === 'single-4koma.php'){
            $image_url_list[] = get_field('4koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_2nd', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_3rd', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_4th', $post->ID)['url'];
          }
          ?>

        <?php if($pop_count < 5){ ?>
          <div class="painting-area pop-images">
        <?php }else{?>
          <div class="painting-area pop-images display-none">
        <?php } ?>
          <a class="link-area" href="<?php echo get_permalink()?>">
            <div class="image"><img class="neta-img" src="<?php echo $image_url_list[0];?>" alt="<?php echo $post->post_title;?>"></div>
            <div class="painting-title"><?php echo $post->post_title;?></div>
          </a>
          <div class="like-area">
            <div class="view-cnt">
              <p><i class="fas fa-eye"></i> <?php echo getPostViews();?> views</div>
              </p>
          </div>
        </div>
      <?php
          $pop_count++; 
          endwhile; ?>
    <?php endif; ?>
    <?php if(!empty($the_new_query)){?>
      <?php foreach($the_new_query as $post){?>
        <?php // テンプレートの判定
          $image_url_list = [];
          $temp_name = get_post_meta($post->ID, '_wp_page_template', true);
          if ($temp_name === 'single-1koma.php'){
            $image_url_list[] = get_field('1koma_img', $post->ID)['url'];
          }elseif($temp_name === 'single-2koma.php'){
            $image_url_list[] = get_field('2koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('2koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('2koma_img_2nd', $post->ID)['url'];
          }elseif($temp_name === 'single-3koma.php'){
            $image_url_list[] = get_field('3koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_2nd', $post->ID)['url'];
            $image_url_list[] = get_field('3koma_img_3rd', $post->ID)['url'];
          }elseif($temp_name === 'single-4koma.php'){
            $image_url_list[] = get_field('4koma_img_title', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_1st', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_2nd', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_3rd', $post->ID)['url'];
            $image_url_list[] = get_field('4koma_img_4th', $post->ID)['url'];
          }
          ?>
        <?php if($new_count < 5){ ?>
          <div class="painting-area new-images">
        <?php }else{?>
          <div class="painting-area new-images display-none">
        <?php } ?>
          <a class="link-area" href="<?php echo get_permalink($post)?>">
            <div class="image"><img class="neta-img" src="<?php echo $image_url_list[0];?>" alt="<?php echo $post->post_title;?>"></div>
            <div class="painting-title"><?php echo $post->post_title;?></div>
          </a>
          <div class="like-area">
            <div class="view-cnt">
              <p><i class="fas fa-eye"></i> <?php echo getPostViews();?> views</div>
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
