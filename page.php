<?php get_header(); ?>



  <?php if(is_page('info') || is_page('survey') || is_page('terms-use')) : ?>


    <?php include "parts/page-sub.php"; ?>


  
  <?php else : ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
    <?php 
      [$rank_objects, $rank_objects2] = get_rank_obj(); 
      $pageId = get_the_ID();
      $slug = $post->post_name;
      $items = 0;
      $items2 = 0;
      $loop = 1;

      $rank_objects = is_array($rank_objects) ? $rank_objects : $rank_objects = get_field('ranking', $post->ID);  
      $rank_objects2 = is_array($rank_objects2) ? $rank_objects2 : $rank_objects2 =  $rank_obj2 = get_field("ranking-".$slug.'2', $post->ID);

      if($rank_objects && is_array($rank_objects)):

        foreach($rank_objects as $post) {
          if(get_post_status($post->ID) !== 'private') {
            $items++;
          }
        }
        foreach($rank_objects2 as $post) {
          if(get_post_status($post->ID) !== 'private') {
            $items2++;
          }
        }
        function includePopup($objects, $targetId, $filename) {
          if ($objects && in_array($targetId, array_column($objects, 'ID'))) {
            include "inc/parts/" . $filename;
          }
        }

        $popupFiles = [
          2605 => 'popup-au.php',    // auじぶん銀行カードローン
          4134 => 'popup-star.php',  // 東京スター銀行
          472  => 'popup-d.php',     // プロミス
          122  => 'popup-lake.php'   // レイク
        ];
        

        foreach ([$rank_objects, $rank_objects2] as $objects) {
          foreach ($popupFiles as $id => $file) {
            includePopup($objects, $id, $file);
          }
        }

      endif;
    ?>





    <?php include "parts/hero.php"; ?>




    <?php if(!is_page('bank-cardloan')) : ?>
    <?php include "parts/page-information.php"; ?>
    <?php endif; ?>




      
    <?php if($rank_objects && $items > 0) : ?>
      <?php include "parts/ranking.php"; ?>
    <?php endif; ?>





    <?php if(is_page('bank-cardloan')) : ?>

        <?php include "parts/page-information.php"; ?>

    <?php endif; ?>



		

    <!-- ranking2($items変わる) -->

    <?php $loop = 2; include "parts/ranking.php"; ?>




    <?php 
      if(is_page('bank-cardloan')) { 
        include "parts/pickup.php";
      } 
    ?>

  <?php endwhile; endif; endif; ?>

<?php get_footer(); ?>        