<?php
/*
Template Name: 3コマ
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
    <div class="image"><img class="neta-img" src="<?php echo get_field('3koma_img_title', $post->ID)['url'];?>" alt=""></div>
      <div class="image"><img class="neta-img" src="<?php echo get_field('3koma_img_1st', $post->ID)['url'];?>" alt=""></div>
      <div class="image"><img class="neta-img" src="<?php echo get_field('3koma_img_2nd', $post->ID)['url'];?>" alt=""></div>
      <div class="image"><img class="neta-img" src="<?php echo get_field('3koma_img_3rd', $post->ID)['url'];?>" alt=""></div>
      <div class="painting-title"><?php echo $post->post_title;?></div>
      <div class="like-area">
        <div class="view-cnt">
          <p><i class="fas fa-eye"></i><?php echo getPostViews($post->ID);?> view</div>
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
            <img src="<?php echo get_field('1koma_img', $nextpost->ID)['url'];?>" alt="">
        </div>
        </div>
    </a>
  <?php }?>

  <?php if($prevpost){?>
    <a href="<?php echo get_permalink($prevpost->ID)?>">
        <div class="previous-post">
        <div class="previous-detail">
            <img src="<?php echo get_field('1koma_img', $prevpost->ID)['url'];?>" alt="">
        </div>
        <div class="previous-text"><?php echo get_the_title($prevpost->ID);?></div>
        <div class="next-img">▶︎</div>
        </div>
    </a>
  <?php }?>
      <h2>
      まだ見ていく？
    </h2>
    <ul class="recommend-posts">
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>
      <li class="recommend-post">
        <div class="recommend-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="recommend-title">水で増えるタイプ</div>
      </li>

    </ul>
    <h2>
      人気急上昇のやつ
    </h2>
    <ul class="popular-posts">
    <li class="popular-post">
        <div class="popular-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="popular-text">
          <div class="popular-title">水で増えるタイプ</div>
          <div class="popular-like">1,500</div>
        </div>
      </li>
      <li class="popular-post">
        <div class="popular-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="popular-text">
          <div class="popular-title">水で増えるタイプ</div>
          <div class="popular-like">1,500</div>
        </div>
      </li>
      <li class="popular-post">
        <div class="popular-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="popular-text">
          <div class="popular-title">水で増えるタイプ</div>
          <div class="popular-like">1,500</div>
        </div>
      </li>
      <li class="popular-post">
        <div class="popular-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="popular-text">
          <div class="popular-title">水で増えるタイプ</div>
          <div class="popular-like">1,500</div>
        </div>
      </li>
      <li class="popular-post">
        <div class="popular-image"><img src="<?php echo get_stylesheet_directory_uri();?>/resources/images/image1.png" alt=""></div>
        <div class="popular-text">
          <div class="popular-title">水で増えるタイプ</div>
          <div class="popular-like">1,500</div>
        </div>
      </li>
    </ul>
    <div class="advertisement-area">
      Advertisement
    </div>

    <form id="search-form" action="#">
      <input id="sbox5"  id="s" name="s" type="text" placeholder="キーワードを入力" />
      <input id="sbtn5" type="submit" value="検索" />
    </form>
  </div><!--end contents-->
</div><!--end container-->
<?php get_footer(); ?>
