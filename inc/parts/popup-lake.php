

  <div class="lake-popup-ctt" :class="{'is-active': isLakePopup}">

    <div class="lake-popup-ctt__inner">

      <span class="lake-popup-ctt__close" @click="clickedLakePopup"></span>

      <h2 class="title -first">現在、他社で借入はありますか？</h2>


      <?php $mainpost = get_post(122); if ($mainpost) : ?>

      <dl class="popup-item">

        <dd>

          <p>
            <span class="bold bg-y">他社で借入がない方、カードローンがはじめての方</span>は<span class="red bold">安心して借りられる</span><?=get_the_title($mainpost->ID) ?>がおすすめ！
          </p>

          <div class="img">
            <img src="<?=get_field('logo', $mainpost->ID)?>" alt="<?=get_the_title($mainpost->ID) ?>">
          </div>

          <div class="popup-button -lake c-button -lake -ranking -salmon">
            <a href="<?= get_link_param(['post_id' => $mainpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><?= get_the_title($mainpost->ID) ?> 申し込み<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/icons/btn-sp-arrow.svg" alt="" class="btn-arrow"></a>
          </div>

        </dd>

      </dl>

      <?php endif; ?>




      
      <?php $subpost = get_post(125); if ($subpost) : ?>

      <dl class="popup-item">
        
        <dd>
          
          <p>
            <span class="bold">他社で借入がある方</span>は<span class="bold red bg-y">審査が不安な方でも申込可能</span>なSMBCモビットがおすすめ！
          </p>

          <div class="img -mobit">
            <img src="<?=get_field('logo', $subpost->ID)?>" alt="<?=get_the_title($subpost->ID) ?>">
          </div>

          <div class="popup-button -mobit c-button -lake -ranking -mint">
            <a href="<?= get_link_param(['post_id' => $subpost->ID]) ?>" class="<?= isset($class) ? $class : ""; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ">
              <?= get_the_title($subpost->ID) ?> 詳細はこちら<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/icons/btn-sp-arrow.svg" alt="" class="btn-arrow">
            </a>
          </div>

        </dd>

      </dl>

      <?php endif; ?>

    </div>

  </div>


