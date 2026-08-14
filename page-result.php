
<?php get_header() ?>


<?php
    /** 結果ページSetting */

    $pageId = get_the_ID();
		// 定数の定義
    const FIRST_TIME_BORROWER = "初めて";
    const GSS_VARIANTS = ['gss', 'gss2', 'gss3'];
    const YSS_VARIANTS = ['yss', 'yss2', 'yss3'];
    
    function cleanAdValue($adValue) {
        if (strpos($adValue, '2') !== false || strpos($adValue, '3') !== false) {
            return preg_replace('/[0-9]/', '', $adValue);
        }
        return $adValue;
    }

    function determineRankingField() {
        // 初めての借入者の場合
        if (isFirstTimeBorrower()) {
            return 'ranking-obj-result_first';
        }
        
        // 広告パラメータがある場合
        if (isset($_GET['ad'])) {
            return handleAdParameter($_GET['ad']);
        }
        
        // 銀行パラメータがある場合
        if (isset($_GET['bank'])) {
            return 'ranking-obj-result_bank';
        }
        
        return 'ranking-obj-result';
    }

    function isFirstTimeBorrower() {
        $isFirstTime = isset($_GET['search-sp-situation']) && $_GET['search-sp-situation'] === FIRST_TIME_BORROWER;
        $hasValidAd = isset($_GET['ad']) && in_array($_GET['ad'], ['gss', 'yss', 'ms']);
        
        return ($hasValidAd || !isset($_GET['ad'])) && $isFirstTime;
    }

    function handleAdParameter($adValue) {
        $cleanedAdValue = cleanAdValue($adValue);
        $specialVariants = array_merge(GSS_VARIANTS, YSS_VARIANTS);
        
        if (!in_array($adValue, $specialVariants)) {
            return 'ranking-obj-result_' . $cleanedAdValue;
        }
        
        return 'ranking-obj-result';
    }
    
    $ranking_field = determineRankingField();
		$result_posts = get_field($ranking_field, 3981);

		// ad パラメータ専用のランキングが未設定の場合はデフォルトランキングへフォールバック
		if (empty($result_posts) || !is_array($result_posts)) {
			$result_posts = get_field('ranking-obj-result', 3981);
		}
		if (!is_array($result_posts)) {
			$result_posts = [];
		}

		// ACFのフィールド定義が消えて投稿ID配列のまま残っている ad 用ランキングを投稿オブジェクトへ揃える
		$result_posts = array_values(array_filter(array_map(function ($item) {
			return is_object($item) ? $item : get_post($item);
		}, $result_posts)));

		$metaquerysp = [];
    function includePopup($post, $targetId, $filename) {
        // 投稿データが存在し、IDが一致する場合のみインクルード
        if ($post && isset($post->ID) && $post->ID === $targetId) {
            include "inc/parts/" . $filename;
        }
    }

    $popupFiles = [
        4134 => 'popup-star.php',  // 東京スター銀行
        472  => 'popup-d.php',     // プロミス
        122  => 'popup-lake.php'   // レイク
    ];

    if (!empty($result_posts) && is_array($result_posts)) {
        foreach ($result_posts as $post) {
            foreach ($popupFiles as $id => $file) {
                includePopup($post, $id, $file);
            }
        }
    }



		$s = isset($_GET['s']) ? $_GET['s'] : ''; 
		// あなたの職業は
		$searchJob = isset($_GET['search-sp-job']) ? $_GET['search-sp-job'] : ''; 
		// 現在の借り入れ状況は
		$searchSituation = isset($_GET['search-sp-situation']) ? $_GET['search-sp-situation'] : ''; 
		// いくら借りたい
		$searchHowmuch = isset($_GET['search-sp-howmuch']) ? $_GET['search-sp-howmuch'] : ''; 
		// いつまでに借りたい
		$searchWhen = isset($_GET['search-sp-when']) ? $_GET['search-sp-when'] : ''; 
		// どうやって借りたい
		$searchHow= isset($_GET['search-sp-how']) ? $_GET['search-sp-how'] : ''; 
		// さらに条件にこだわる
		$searchConditions = isset($_GET['search-sp-conditions']) ? $_GET['search-sp-conditions'] : ''; 


		if(is_array($searchJob)) {
			foreach( $searchJob as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-job',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-job',
				'value' => $searchJob,
				'compare' => 'LIKE'
			];
		}

		if(is_array($searchSituation)) {
			foreach( $searchSituation as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-situation',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-situation',
				'value' => $searchSituation,
				'compare' => 'LIKE'
			];
		}

		if(is_array($searchHowmuch)) {
			foreach( $searchHowmuch as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-howmuch',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-howmuch',
				'value' => $searchHowmuch,
				'compare' => 'LIKE'
			];
		}

		if(is_array($searchWhen)) {
			foreach( $searchWhen as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-when',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-when',
				'value' => $searchWhen,
				'compare' => 'LIKE'
			];
		}
		
		if(is_array($searchHow)) {
			foreach( $searchHow as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-how',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-how',
				'value' => $searchHow,
				'compare' => 'LIKE'
			];
		}


		if(is_array($searchConditions)) {
			foreach( $searchConditions as $val) {
				$metaquerysp[] = [
					'key' => 'search-sp-conditions',
					'value' => $val,
					'compare' => 'LIKE'
				];
			}
		} else {
			$metaquerysp[] = [
				'key' => 'search-sp-conditions',
				'value' => $searchConditions,
				'compare' => 'LIKE'
			];
		}

		$metaquerysp['relation'] = 'AND';

		$tagName = "";
    if(isset($_GET['view']) && $_GET['view'] == 1) {
      $tagName = "preview";
    }elseif(isset($_GET['bank']) && $_GET['bank'] == 1) { 
      $tagName = "search";

    }else {
      $tagName = "search";
    }

    $args = array(
      's' => $s,
      'posts_per_page' => -1,
      'post_type' => 'company',
      'order' => 'asc',
      'meta_query' => array($metaquerysp),
      'post_status' => (isset($_GET['test']) ) ? array('publish', 'private', 'draft') : 'publish',
      'tag' => $tagName
    );


    $the_query = new WP_Query( $args );

		$itemCount = 0;
		if (!empty($result_posts) && is_array($result_posts)) {
			foreach ($result_posts as $result_item) {
				if ($result_item && isset($result_item->post_status) && $result_item->post_status === 'publish') {
					$itemCount++;
				}
			}
		}

		$get_num = $itemCount;




?>


	<section class="p-result-renew" id="result-renew">


		<div class="p-result-renew__number">
			<p>絞り込み結果<span>(<?= $get_num; ?>件該当)</span></p>
		</div>

		<div class="p-result-renew__sort">

			<div class="p-result-renew__sort__list">
				<ul>
					<li><button class="sort" data-sort="osusume">おすすめ順</button></li>
					<li><button class="sort" data-sort="shinsa">審査時間順</button></li>
					<li><button class="sort" data-sort="yuushi">融資時間順</button></li>
					<li><button class="sort" data-sort="nenritsu">実質年率順</button></li>
					<li><button class="sort" data-sort="gendo">限度額順</button></li>
				</ul>
			</div>

		</div>


		<ul class="p-result-renew__main p-ranking__main list">
			
			<?php 
				if (!empty($result_posts) && is_array($result_posts)) {
					$itemCount = 0;
					foreach ($result_posts as $key=> $result_item) {
						$itemCount++;
						if ($the_query->have_posts()) {
							foreach ($the_query->posts as $post) {
								setup_postdata($post);
								if (is_object($post) && is_object($result_item) && 
									$post->ID === $result_item->ID) {
									include "parts/fields.php";
									include "parts/loop-result.php";
									break; 
								}
							}
							wp_reset_postdata();
						}
					}
				}
			?>
			
		</ul>

		
	</section>




  <?php include ('parts/pickup.php'); ?>





<?php get_footer() ?>