

  <?php
    $isTestD = isset($_GET['test']) && $_GET['test'] == 'd';
    $class = isset($class) ? $class : '';
    $getLinkParam = function ($postId) {
      return function_exists('get_link_param_new')
        ? get_link_param_new(['post_id' => $postId])
        : get_permalink($postId);
    };
  ?>

  <!-- Dカード -->
  <div class="js-popup-ctt -d">


    <ul class="js-popup-ctt__inner">



      <span class="js-popup-ctt__close -d"></span>


      <li data-content="1" class="active">
        <h2><span>Q.</span>ドコモユーザーですか？</h2>
        <div class="flex">
          <button id="yes-1" class="next-btn next-btn__yes" data-target="2">はい</button>
          <button id="no-1" class="next-btn next-btn__no" data-target="5">いいえ</button>
        </div>
      </li>



      <li data-content="2">


        <h2><span>Q.</span><?= !$isTestD ? 'ドコモを利用して1年以上ですか？' : 'あなたは30歳以上ですか？' ?></h2>
        <div class="flex">
          <button id="yes-2" class="next-btn next-btn__yes" data-target="3">はい</button>
          <button id="no-2" class="next-btn next-btn__no" data-target="5">いいえ</button>
        </div>

      </li>



      <li data-content="3">
        <h2><span>Q.</span>現在他社で借入していますか？</h2>
        <div class="flex">
          <button id="yes-3" class="next-btn next-btn__yes" data-target="5">はい</button>
          <a id="no-3" class="next-btn next-btn__no" data-target="4" href="<?= $getLinkParam(472); ?>" target="_blank" rel="noopener">いいえ</a>
        </div>
      </li>



      <li data-content="4">

        <?php $mainpost = get_post(472); if ($mainpost) : 
          $linkMain = $getLinkParam($mainpost->ID);
        ?>

        <h2 class="title">
          <?php if(!$isTestD) : ?>
          <span class="bg-y" style="color: inherit">ドコモユーザーで借入が初めて</span>のあなたには
          <?php else : ?>
          30歳以上の<br class="u-device-sp"><span class="bg-y" style="color: inherit">ドコモユーザーのあなた</span>には
          <?php endif; ?>
          <br><span class="red"><?=get_the_title($mainpost->ID) ?></span>がおすすめ！
        </h2>

        <div class="img">
          <a href="<?= $linkMain ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><img src="<?=get_the_post_thumbnail_url($mainpost->ID)?>" alt="<?=get_the_title($mainpost->ID) ?>"></a>
        </div>

        <div class="button c-button -ranking">
          <a href="<?= $linkMain ?>" class="" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><?=get_the_title($mainpost->ID) ?> 公式サイト</a>
        </div>


        <p class="pagination">
          <span class="before" data-target="1">戻る</span>
        </p>
        <?php endif; ?>

      </li>



      <li data-content="5">


        <?php 
          $subpost = !$isTestD ? get_post(125) : get_post(472); if ($subpost) : 
          $linkSub = $getLinkParam($subpost->ID);
        ?>

        <?php if(!$isTestD) : ?>
        <h2 class="title"><span class="red bg-y">審査が不安な方でも申込可能</span>な<br><?=get_the_title($subpost->ID) ?>がおすすめ！</h2>
        <?php else : ?>
        <h2 class="title">20歳以上29歳以下の方には<br><span class="bg-y"><?=get_the_title($subpost->ID) ?>がおすすめ！</span></h2>
        <?php endif; ?>
        
        <div class="img">
          <a href="<?= $linkSub ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ"><img src="<?=get_the_post_thumbnail_url($subpost->ID)?>" alt="<?=get_the_title($subpost->ID) ?>"></a>
        </div>
        <div class="button c-button -ranking">
          <a href="<?= $linkSub ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ"><?= get_the_title($subpost->ID) ?> 公式サイト</a>
        </div>
        <p class="pagination">
          <span class="before" data-target="1">戻る</span>
        </p>

        <?php endif; ?>

      </li>


    </ul>

    
  </div>