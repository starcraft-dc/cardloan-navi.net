    <!-- Parts : Hero FV -->

    <section class="p-hero <?= '-'.$slug ?>">

      <figure class="p-hero__main">


        <?php if(is_front_page() || is_page('popup')) : //TOP ?>

          <?php
            $is_fv_v2 = cardloan_navi_is_versioned_top();
            $fv_v2_items = max( 2, min( 10, (int) $items ) );
            $fv_v2_asset_dir = get_template_directory() . '/assets/dist/front/';
            $fv_v2_asset_url = get_template_directory_uri() . '/assets/dist/front/';
            $fv_v2_pc_file = 'fv-v2-' . $fv_v2_items . '.webp';
            $fv_v2_sp_file = 'fv-v2-' . $fv_v2_items . '-sp.webp';
            $fv_v2_pc_url = add_query_arg( 'ver', filemtime( $fv_v2_asset_dir . $fv_v2_pc_file ), $fv_v2_asset_url . $fv_v2_pc_file );
            $fv_v2_sp_url = add_query_arg( 'ver', filemtime( $fv_v2_asset_dir . $fv_v2_sp_file ), $fv_v2_asset_url . $fv_v2_sp_file );
          ?>
          <picture>
            <?php if($is_fv_v2) : ?>
              <source srcset="<?= esc_url( $fv_v2_sp_url ); ?>" media="(max-width: 767px)">
              <img src="<?= esc_url( $fv_v2_pc_url ); ?>" alt="本当におすすめの銀行系＆消費者金融カードローン<?= esc_attr( $fv_v2_items ); ?>選" width="1279" height="597" fetchpriority="high">
            <?php else : ?>
              <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-sp-rs_2.webp" media="(max-width: 767px)">
			        <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-pc-rs_2.webp" alt="" width="978" height="457" fetchpriority="high">
            <?php endif; ?>
          </picture>
          <?php if($is_fv_v2) : ?>
            <link rel="stylesheet" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/css/fv-v2.css?ver=<?= esc_attr( filemtime( get_template_directory() . '/assets/css/fv-v2.css' ) ); ?>">
            <span class="p-hero__v2-year"><?= esc_html( wp_date( 'Y' ) ); ?>年</span>
          <?php endif; ?>



        <?php elseif(is_page('speed')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

        <?php elseif(is_page('hidden')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-sp-<?= $items2; ?>.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-pc-<?= $items2; ?>.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>


        <?php elseif(is_page('bank-cardloan')) : ?>
          
          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-sp.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-pc.webp" alt=""  width="100" height="100" fetchpriority="high"> 
          </picture>

          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-sp<?= $items; ?>.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-pc<?= $items; ?>.webp" alt="" width="100" height="100" fetchpriority="high" class="img-bank-text">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><small><?=wp_date('Y').'年</small><br>最新版' ?></span>

          
        <?php elseif(is_page('bank')) : ?>

          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-sp_v2.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-pc_v2.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><?=wp_date('Y').'年' ?></span>
          
        <?php else: ?>


					<?php if(is_page('examination') || is_page('license') || is_page('first') || is_page('interest') || is_page('summary') || is_page('woman') || is_page('housewife')) : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp.webp" media="(max-width: 767px)">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php else : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp-<?= empty($items2) ? $items : $items2 ?>.webp" media="(max-width: 767px)">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc-<?= empty($items2) ? $items : $items2 ?>.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php endif; ?>

        <?php endif; ?>


        <?php 
          if(is_front_page()) {
            if(!cardloan_navi_is_versioned_top()) { include "timer-top.php"; }
            

          } elseif(is_page('speed')) {
            include "timer-speed.php";
          }
				?>
				
      </figure>

      <?php if(is_front_page()) : ?>
        <div class="sup-box fv-sup"><sup>dスマホローンの最短即日審査は17時までの申込が必要です。※2</sup></div>
      <?php endif; ?>

    </section>
