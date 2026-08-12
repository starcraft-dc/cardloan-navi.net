
    <section id="section-choice" class="p-choice <?= isset($_GET['ad']) && $_GET['ad'] == 'gss3' ? 'gss3-padding' : '' ?>">

      <hgroup class="p-choice__head">
        <figure>
          <?php if(cardloan_navi_is_versioned_top()) : ?>
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/top-choice-title_v2.svg" alt="" width="100" height="100" loading="lazy">
          <?php else : ?>
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/top-choice-title.svg" alt="" width="100" height="100" loading="lazy">
          <?php endif; ?>
        </figure>
      </hgroup>



      <ul class="p-choice__main choice-group">

          <?php 
            $choiceArray = [
            1 => [
              'title' => '今すぐ借りられる',
              'description' => '<span class="bold bg-y">最短30分即日融資が可能</span>なカードローンを選びましょう。',
              'icon' => 'choice-icon-1'
            ],
            2 => [
              'title' => 'バレずに借りられる',
              'description' => '<span class="bold bg-y">WEB完結・郵送物なし（カード発行なし）が選べて、在籍確認の電話なしも相談できる</span>会社ならバレる心配はありません。',
              'icon' => 'choice-icon-2'
            ],
            3 => [
              'title' => '本人確認書類のみでOK',
              'description' => '<span class="bold bg-y">申込に必要な書類が免許証などの本人確認書類のみでOK</span>な会社を選びましょう。ただし、50万円以上の借り入れ希望の場合は収入証明書の提出が必要です。',
              'icon' => 'choice-icon-3'
            ],
            4 => [
              'title' => 'とにかく便利で使いやすい',
              'description' => '口座振込や提携ATMでかんたんに借入・返済ができれば便利です。特に、はじめての方には<span class="bold bg-y">無利息で借りられる期間があるカードローン</span>がおすすめです。',
              'icon' => 'choice-icon-4'
            ]
            ];

            $choiceArrayV2 = [
              1 => [
                'title' => '融資のタイミング',
                'description' => '<span class="bold bg-y">申込完了後、最短当日融資が可能</span>なカードローンを選びましょう。',
                'icon' => 'choice-icon-1_v2'
              ],
              2 => [
                'title' => '本人確認書類のみでOK',
                'description' => '<span class="bold bg-y">申込に必要な書類が免許証などの本人確認書類のみでOK</span>な会社を選びましょう。ただし、50万円以上の借り入れ希望の場合は収入証明書の提出が必要です。',
                'icon' => 'choice-icon-3'
              ],
              3 => [
                'title' => 'とにかく便利で使いやすい',
                'description' => '口座振込や提携ATMで借入・返済ができれば便利です。特に、はじめての方には<span class="bold bg-y">サポートが充実しているカードローン</span>がおすすめです。',
                'icon' => 'choice-icon-4'
              ]
            ];

            $choiceArray = cardloan_navi_is_versioned_top() ? $choiceArrayV2 : $choiceArray;
        ?>



        <?php foreach($choiceArray as $key => $choice) : ?>

        <li class="choice-box choice<?= $key ?>">

          <div class="<?=isset($_GET['ad']) && $_GET['ad'] === 'gss3' ? 'choice-title-wrap' : 'choice-box__num' ?>">

            <?php if(isset($_GET['ad']) && $_GET['ad'] === 'gss3') : ?>
              <div class="choice-box__num">
            <?php endif; ?>

              <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/top-point-img<?= $key ?>.svg" alt="" class="choice-num-icon" width="100" height="100" loading="lazy">
            
          </div>
          
          <h3 class="choice-box__title"><?= $choice['title'] ?></h3>

          <?php if(isset($_GET['ad']) && $_GET['ad'] === 'gss3') : ?>
          </div>
          <?php endif; ?>
          

          <div class="choice-box__icon">

            <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/<?= $choice['icon'] ?>.svg" alt="" class="choice-icon" width="100" height="100" loading="lazy">

          </div>

          <div class="choice-box__text">
            <p><?= $choice['description'] ?></p>
          </div>

        </li>

        <?php endforeach; ?>

        

      </ul>
    </section>
