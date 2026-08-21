
  <?php get_header() ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$pageId = get_the_ID();
		$slug = $post->post_name;
		$items = 0;

		[$rank_objects, $rank_objects2] = get_rank_obj(); 

		$rank_objects = is_array($rank_objects) ? $rank_objects : $rank_objects = get_field('ranking', $post->ID);


		if($rank_objects): 
			foreach($rank_objects as $post) {
				$post_status = is_page('view') ? 'any' : 'publish';
				if(get_post_status($post->ID) !== 'private') {
					$items++;
				}
			}
		endif; 


		function includePopup($objects, $targetId, $filename) {
			if ($objects && is_array($objects) && !empty($objects)) {
				$ids = array_column((array)$objects, 'ID');
				if (in_array($targetId, $ids)) {
					include "inc/parts/" . $filename;
				}
			}
		}
		
		$popupFiles = [
		  2605 => 'popup-au.php',    // auじぶん銀行カードローン
		  4134 => 'popup-star.php',  // 東京スター銀行
		  472  => 'popup-d.php',     // dスマホローン
		  122  => 'popup-lake.php'   // レイク
		];
		
		// $rank_objectsに含まれる投稿のポップアップのみ表示
		if ($rank_objects && is_array($rank_objects)) {
      foreach ($popupFiles as $postId => $filename) {
        includePopup($rank_objects, $postId, $filename);
      }
		}

			include "parts/hero.php";
      include "parts/pr.php";  
      // include "parts/pickup.php";
      include "parts/searchform.php"; 
			include "parts/ranking.php"; 
			include "parts/hikaku.php"; 
			include "parts/choice.php";
			include "parts/pickup.php";
		?>


  <?php endwhile; endif; ?>

  
<?php get_footer(); ?>        