  <section class="p-searchform <?= $searchformNumber === 1 ? '-top' : '-bottom' ?>">
  
    <div class="form-group p-searchform__content">

      <hgroup class="p-searchform__head title">
        <span>あなたに<span class="ylw2">ピッタリ</span></span>のカードローンを探す<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/topsearch/search-sp-icon.svg" alt="" width="30" height="30">
      </hgroup>

      <div class="p-searchform__main content">

        <form role="search" action="<?= home_url('/result'); ?>" method="get">

          <?php if(is_page('view')) : ?>
            <input type="hidden" name="view" value="1">
          <?php elseif (is_page('bank-cardloan') || is_page('bank')) : ?>
            <input type="hidden" name="bank" value="1">
          <?php endif; ?>
          
          <?php if (isset($_GET['t'])) : ?>
            <input type="hidden" name="t" value="<?php echo $_GET['t']; ?>">
          <?php endif; ?>
          <?php if (isset($_GET['ad'])) : ?>
            <input type="hidden" name="ad" value="<?php echo $_GET['ad']; ?>">
          <?php endif; ?>
          <?php if (isset($_GET['ad'], $_GET['num']) && !is_array($_GET['ad']) && sanitize_key(wp_unslash($_GET['ad'])) === 'gkw') : ?>
            <?php $gkw_num = get_gkw_campaign_num(null, is_page('bank-cardloan') || is_page('bank') || isset($_GET['bank'])); ?>
            <?php if ($gkw_num !== '') : ?>
              <input type="hidden" name="num" value="<?= esc_attr($gkw_num) ?>">
            <?php endif; ?>
          <?php endif; ?>


          
          <?php
          // セレクトボックスの選択肢を配列で定義
          $selectOptions = [
              'job' => [
                  'label' => 'あなたの職業は?',
                  'name' => 'search-sp-job',
                  'options' => [
                      '会社員',
                      'パート・アルバイト',
                      '個人事業主',
                      'その他'
                  ]
              ],
              'situation' => [
                  'label' => '現在の借り入れ状況は?',
                  'name' => 'search-sp-situation',
                  'options' => [
                      '初めて',
                      '借り入れ経験あり(完済済み)',
                      '借り入れ経験あり(現在も借り入れ中)'
                  ]
              ],
              'amount' => [
                  'label' => 'いくら借りたい?',
                  'name' => 'search-sp-howmuch',
                  'options' => [
                      '5万円未満',
                      '5万円~49万円',
                      '50万~99万円',
                      '100万円以上'
                  ]
              ],
              'when' => [
                  'label' => 'いつまでに借りたい?',
                  'name' => 'search-sp-when',
                  'options' => [
                      '1時間以内に借りたい',
                      '今日中に借りたい',
                      '1週間以内に借りたい'
                  ]
              ],
              'how' => [
                  'label' => 'どうやって借りたい?',
                  'name' => 'search-sp-how',
                  'options' => [
                      '口座振込',
                      'コンビニATM',
                      '自動契約機'
                  ]
              ]
          ];

          // セレクトボックスを生成
          foreach ($selectOptions as $key => $select) : ?>
            <label for="select-<?= $key ?>" class="search-from-sp-select" v-on:change="changeClass" :class="{ 'active' : selectClass == false }">
                <select name="<?= $select['name'] ?>" id="select-<?= $key ?>" aria-label="select-<?= $key ?>">
                    <option value=""><?= $select['label'] ?></option>
                    <?php foreach ($select['options'] as $option) : ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php endforeach; ?>
                </select>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/topsearch/select-sp-arrow.svg" alt="">
            </label>
          <?php endforeach; ?>

          
          <div id="kodawari-content" class="area-kodawari">

            <div class="kodawari-button area-kodawari__button" v-on:click="isFormSelect">
              <p>さらに条件にこだわる</p>
              <span :class="{ reverse : isOpen == true }"></span>
            </div>

            <div class="kodawari-group area-kodawari__item" :class="{ active : isOpen == true }">

              <label for="check-1" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-1" value="即日融資可能">
                <span class="koda-shape"></span>
                <span class="koda-text">即日融資可能</span>
              </label>

              <label for="check-2" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-2" value="収入証明書不要">
                <span class="koda-shape"></span>
                <span class="koda-text">収入証明書不要</span>
              </label>

              <label for="check-3" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-3" value="WEB完結">
                <span class="koda-shape"></span>
                <span class="koda-text">WEB完結</span>
              </label>

              <label for="check-4" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-4" value="カード発行なし">
                <span class="koda-shape"></span>
                <span class="koda-text">カード発行なし</span>
              </label>

              <label for="check-5" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-5" value="郵送物なし">
                <span class="koda-shape"></span>
                <span class="koda-text">郵送物なし</span>
              </label>

              <label for="check-6" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-6" value="土日祝も対応">
                <span class="koda-shape"></span>
                <span class="koda-text">土日祝も対応</span>
              </label>

              <label for="check-7" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-7" value="電話連絡なしも相談可能">
                <span class="koda-shape"></span>
                <span class="koda-text">電話連絡なしも相談可能</span>
              </label>

              <label for="check-8" class="">
                <input type="checkbox" name="search-sp-conditions" id="check-8" value="無利息期間あり">
                <span class="koda-shape"></span>
                <span class="koda-text">無利息期間あり</span>
              </label>

            </div>

          </div>

						
					<button type="submit" class="bold">この条件で検索<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/topsearch/tab-menu-icon-1-wh.svg" alt="" class="button-icon"></button>
          
        </form>
      </div>
    </div>

  </section>
