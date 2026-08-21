<?php
  $auPost = get_post(2605);
  if ($auPost) :
    $auLink = function_exists('get_link_param_new')
      ? get_link_param_new(['post_id' => $auPost->ID])
      : get_permalink($auPost->ID);
    $auTitle = get_the_title($auPost->ID);
?>

  <!-- auじぶん銀行カードローン -->
  <div class="js-popup-ctt -au">

    <ul class="js-popup-ctt__inner">

      <span class="js-popup-ctt__close -au"></span>

      <li data-content="1" class="active">

        <h2 class="title">※お申込みの前にご確認ください※</h2>

        <div class="popup-au__body">

        <p class="popup-au__lead">以下の条件に合う方は、<br class="u-device-sp">お申込みに不向きな場合がございます。</p>

        <div class="popup-au__list">

          <dl class="popup-au__item">
            <dt><span class="num">①</span>年齢・収入の条件が合わない方</dt>
            <dd>
              <p class="check">満20歳未満 または 70歳以上の方</p>
              <p class="check">安定した収入がない方</p>
            </dd>
          </dl>

          <dl class="popup-au__item">
            <dt><span class="num">②</span>過去・現在の支払いトラブルや<br class="u-device-sp">審査落ちの経験がある方</dt>
            <dd>
              <p class="check">現在、ローンを延滞中の方</p>
              <p class="check">アコムや銀行カードローンで<br class="u-device-sp">審査に落ちた・延滞した方</p>
            </dd>
          </dl>

          <dl class="popup-au__item">
            <dt><span class="num">③</span>借入額が多い・<br class="u-device-sp">同時申込をしている方</dt>
            <dd>
              <p class="check">すでに年収の1/3以上の借入がある方</p>
              <p class="check">現在、複数社へ同時に申し込んでいる方</p>
            </dd>
          </dl>

        </div>

        </div><!-- /.popup-au__body -->

        <div class="popup-au__nav">
          <button type="button" class="popup-au__back js-popup-close-au">&larr;&nbsp;戻る</button>
          <a class="popup-au__next prrrr" href="<?= esc_url($auLink) ?>" target="_blank" rel="noopener" aria-label="<?= esc_attr($auTitle) ?>公式へ">進む&nbsp;&rarr;</a>
        </div>

      </li>

    </ul>

  </div>

<?php endif; ?>
