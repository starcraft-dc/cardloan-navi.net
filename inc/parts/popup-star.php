
  <div class="js-star-ctt" :class="{'is-active': isStarPopup}">

    <ul class="js-popup-ctt__inner">

      <span class="js-popup-ctt__close" @click="clickedStarPopup"></span>

      <li :class="{'is-active': isHikakuTab == 1}">

        <h2 class="title"><span>Q.</span><span class="bg-y bold red">過去6ヵ月以内</span>に<br class="u-device-sp">東京スター銀行のローン審査で<br>否決されたことはありますか？</h2>

        <div class="flex">
          <button id="yes" class="next-btn next-btn__yes" @click="isHikakuTab = 2">はい</button>
          <button id="no" class="next-btn next-btn__no" @click="isHikakuTab = 3">いいえ</button>
        </div>
      </li>

      <li :class="{'is-active': isHikakuTab == 2}">

        <h2 class="title">
          東京スター銀行に申込したことがある方は<br><span class="bg-y red bold">SMBCモビット</span>がおすすめ！
        </h2>

        <?php 
          $subpost = get_post(125); if ($subpost) :
        ?>

        <div class="thumb">
          <a href="<?= get_link_param(['post_id' => $subpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ">
          <img src="<?= get_the_post_thumbnail_url($subpost->ID) ?>" 
          alt="<?= esc_attr($subpost->post_title) ?>">
          </a>
        </div>

        <div class="button c-button -ranking -star">
          <a href="<?= get_link_param(['post_id' => $subpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ">
            <?= esc_html($subpost->post_title) ?>の<br class="u-device-sp">詳細はこちら
          </a>
        </div>

        <?php endif; ?>


        <p class="pagination">
          <span class="before" @click="isHikakuTab = 1">戻る</span>
        </p>

      </li>

      <li :class="{'is-active': isHikakuTab == 3}">
        
        <h2 class="title">過去に債務整理や自己破産を<br class="u-device-sp">されたことはありますか？</h2>

        <div class="flex">
          <button id="yes" class="next-btn next-btn__yes" @click="isHikakuTab = 4">はい</button>
          <button id="no" class="next-btn next-btn__no" @click="isHikakuTab = 5">いいえ</button>
        </div>

        <p class="pagination">
          <span class="before" @click="isHikakuTab = 1">戻る</span>
        </p>

      </li>

      <li :class="{'is-active': isHikakuTab == 4}">

        <div class="img -ximg">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/dist/front/icon-notlink.svg" alt="X">
        </div>

        <strong>申し訳ございませんが、<br>審査に通らない可能性が高いため、<br class="u-device-sp">別の方法をご検討ください。</strong>

        <p class="pagination">
          <span class="before" @click="isHikakuTab = 3">戻る</span>
        </p>

      </li>

      <li :class="{'is-active': isHikakuTab == 5}">
        
        <h2 class="title">現在ご利用中のローンを<br class="u-device-sp">延滞されていますか？</h2>

        <div class="flex">
          <button id="yes" class="next-btn next-btn__yes" @click="isHikakuTab = 6">はい</button>
          <button id="no" class="next-btn next-btn__no" @click="isHikakuTab = 7">いいえ</button>
        </div>

        <p class="pagination">
          <span class="before" @click="isHikakuTab = 3">戻る</span>
        </p>

      </li>

      <li :class="{'is-active': isHikakuTab == 6}">
        
        <div class="img -ximg">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/dist/front/icon-notlink.svg" alt="X">
        </div>

        <strong>申し訳ございませんが、<br>審査に通らない可能性が高いため、<br class="u-device-sp">別の方法をご検討ください。</strong>

        <p class="pagination">
          <span class="before" @click="isHikakuTab = 5">戻る</span>
        </p>

      </li>

      <li :class="{'is-active': isHikakuTab == 7}">
        
        <h2 class="title -last"><span class="bg-y red bold big">おまとめローンに最適！</span></h2>
        

        <?php 
          $mainpost = get_post(4134); if ($mainpost) :
        ?>

        <div class="thumb">
          <a href="<?= get_link_param(['post_id' => $mainpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><img src="<?=get_the_post_thumbnail_url($mainpost->ID)?>" alt="<?=get_the_title($mainpost->ID) ?>"></a>
        </div>

        <div class="button c-button -ranking -star">
          <a href="<?= get_link_param(['post_id' => $mainpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ">東京スター銀行の<br class="u-device-sp">詳細はこちら</a>
        </div>

        <?php endif; ?>

        <p class="pagination">
          <span class="before" @click="isHikakuTab = 5">戻る</span>
        </p>

      </li>


    </ul>

  </div>



