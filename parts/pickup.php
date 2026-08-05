
    <?php 
			if(is_page('bank-cardloan') || isset($_GET['bank'])) { 
        $pageClass = "pickup bank-cardloan";
      } else {
        $pageClass = "pickup pickup-event";
      }

			if(is_page('v2') || (isset($_GET['ad']) && strpos($_GET['ad'], '2'))) {
				$partsClass = '-v2';
			} elseif(is_page('v3')) {
				$partsClass = '-v3';
			} elseif(is_page('result') || is_page('result-renew') || is_page('bank-cardloan')) {
        if(isset($_GET['bank'])) {
          $partsClass = '-result -bank';
        } else {
          $partsClass = '-result';
        }
			}  else {
				$partsClass = '';
			}



    ?>

    <section id="section-sp-toprank" class="p-pickup <?= $pageClass; ?> <?= $partsClass ?>">

      <hgroup class="p-pickup__head <?= $partsClass ?>">


				<div class="main <?= $partsClass ?>">

					<?php if(is_page('top') || is_page('view') || is_front_page()) : ?>

						
						<?php if(!isset($_GET['ad']) || !strpos($_GET['ad'], '2')) : ?>
							<p class="sub"><?= isset($_GET['v']) && $_GET['v'] == 2 ? '当サイトでみんなが選ぶ' : 'すべての条件を満たした' ?></p>
						<?php endif; ?>


						<?php if(isset($_GET['ad']) && strpos($_GET['ad'], '2')) : ?>
				

							<p class="main-title__sub <?= $partsClass ?>">
								<span class="ylw2">最短30分</span>でバレずに借りられる
							</p>
							<p class="main-title__main <?= $partsClass ?>">
								<span class="bk">当サイト一押し</span><br>カードローン！
							</p>


						<?php else : ?>
						
							<p class="main-title__main -default">
								<span class="bk">本当におすすめの</span><br>カードローン1選！
							</p>

						<?php endif; ?>


					<?php elseif(is_page('v2')) : ?>

						<?php 
							$fieldObj = get_field_object("rank-table_loan-speed_2024");
							$loanSpeedChoices = $fieldObj['choices'] ?? [];
							$loanSpeedKey = get_field("rank-table_loan-speed_2024");
							$loanSpeedText = get_field("rank-table_loan-speed_text");
						?>

						<span class="main-title__sub <?= $partsClass ?>">
							<span class="ylw2"><?= $loanSpeedText ?: ($loanSpeedChoices[$loanSpeedKey] ?? '') ?></span>でバレずに借りられる
						</span>

						<span class="main-title__main <?= $partsClass ?>">
							<span class="bk">当サイト一押し</span><br>カードローン！
						</span>


					<?php elseif(is_page('v3')) : ?>
						
						<p class="sub <?= $partsClass ?>">当サイト一押し！</p>

						<p class="main-title__main -default <?= $partsClass ?>">

							<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/pickup-title_v3-<?= $price; ?>.svg" alt="" width="100" height="100" loading="lazy">

						</p>


					<?php elseif(is_page('result') || is_page('result-renew')) : ?>


						<?php if(isset($_GET['bank'])) : ?>

							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/bank-cardloan/pickup-title_bank-cardloan.svg" alt="" width="100" height="100" loading="lazy">

						<?php else : ?>

							<p class="sub <?= $partsClass ?>">迷った方へ！</span>
              <p class="main-title__main -default <?= $partsClass ?>"><span class="ylw2">本当におすすめの</span><br>カードローン1選！</p>

						<?php endif; ?>


					<?php elseif(is_page('speed')) : ?>


							<p class="sub">当サイトイチオシ！</p>
            
              <span class="main-title__main <?= '-'.$slug?>"><span class="ylw2">今すぐ</span>お金を借りたい方へ！</span>


					<?php elseif(is_page('bank-cardloan') ) : ?>


							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/bank-cardloan/pickup-title_bank-cardloan.svg" alt="" width="100" height="100" loading="lazy">


					<?php endif; ?>

				</div>

      </hgroup>


      <ul class="p-pickup__main p-ranking__main <?= $partsClass ?>">

        <?php
				// 変数の初期化

          if(is_page('result') || is_page('result-renew')) :
            if (isset($_GET['search-sp-situation']) && $_GET['search-sp-situation'] === "初めて") {
              $pickup_objects = get_field('ranking-obj-result', 3981);
            } else {
              $pickup_objects = $result_posts;
            }
          else :
            $pickup_objects = get_field('pickup-company', $pageId );
          endif;

        
          if($pickup_objects == null) :
            $pickup_objects = $rank_objects;
          endif;


          $displayed = 0;
          foreach ($pickup_objects as $key => $post) :
            if (
              (isset($_GET['test']) && (get_post_status($post->ID) == 'publish' || get_post_status($post->ID) == 'private')) 
              || (!isset($_GET['test']) && get_post_status($post->ID) == 'publish')
            ) : 
            setup_postdata($post);

            include "fields.php";
        ?>

        
        <li class="p-ranking-item rank-item -pickup <?= $partsClass ?>">

          <div class="item-head">

            <?php 
              if(!empty($groupTag)) : ?>
              <div class="item-head__company -pattern2 -pickup">
                <p><?= $groupTag; ?></p>
              </div>
            <?php endif; ?>


            <div class="item-head__name">

              <div class="item-head__name__title <?= $post->post_title == '東京スター銀行　おまとめローン' ? 'w100' : '' ?>">

                <div class="title">
                  <?= get_popup_link() ?>
                  <?= get_the_title() ?></a>
                </div>

              </div>


              <?php if($post->ID !== 4134) : ?>
              <div class="item-head__name__hyouka bold -pattern3">
                <?= hyouka($rank); ?>
                <?= get_star_img($rank); ?>
              </div>
              <?php endif; ?>


            </div>



            <div class="item-head__catch">
              <p class="u-device-pc"><?= $catch; ?></p>
              <p class="u-device-sp"><?= !empty($catchSp) ? $catchSp : $catch; ?></p>
            </div>


          </div>

				
					<div class="item-infor">

						<div class="item-infor__thumb">
							<?= get_popup_link() ?>
							<picture>
								<source srcset="<?= get_the_post_thumbnail_url($post->ID, 'medium'); ?>" media="(max-width: 767px)">
								<img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="" width="100" height="100" loading="lazy">
							</picture>
							</a>
						</div>

						<div class="item-infor__points -pickup">

							<?php if(!empty($points)) : ?>
							<div class="title">
								<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/point-icon.svg" alt="" width="20" height="20" loading="lazy">おすすめポイント！
							</div>

							<ul class="list">
								<?php foreach($points as $p) : ?>
									<?php if(!empty($p)) : ?>
									<li><?= $p; ?></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>

							<?php endif; ?>

						</div>

					</div>


				
					<div class="item-spec">
						
						<table class="c-table table-ranking -pickup">

							<tr class="tb-row1">

								<th>実質年率</th>

								<td style="background-image:url(<?php bloginfo('template_url'); ?>/images/icons/maru-0<?= $interestRow <= 3 || $post->post_title == 'プロミス' ? '1' : '2'; ?>.svg);">
									<?php 
										$firstFont = ''; 
										if($post->post_title =='りそなプレミアムカードローン') { $firstFont = '年'; } 

										/** 実質年率分岐 */
										if(!empty(($interestRow && $interestHigh))) {
											echo $firstFont."{$interestRow}%~{$interestHigh}%";
										} else {
											if(empty($interestHigh)) {
												echo $firstFont."{$interestRow}%";
											} elseif(empty($interestRow)) {
												echo "{$interestHigh}%";
											}
										} 

										echo $interestSup ? $interestSup : '';
									?>
								</td>

								<th><?= 
                $ufj = $post->ID == 133;
                $post->ID == 2605 ? 'ご利用限度額' : '借入限度額' ?></th>

								<td style="background-image:url(<?php bloginfo('template_url'); ?>/images/icons/maru-0<?= $limit <= 3 ? '1' : '2'; ?>.svg);">
									<?php 
                    if($limitText) {
                      echo $limitText;
                    } else {
                      limit($limit, $ufj ? '最高' : '最大'); 
                    }
										echo $limitSup ? '<small class="small">'.$limitSup.'</small>' : '';
									?>
								</td>

							</tr>




								<?php
									$withoutInlineSpeedNote = static function ($speedText): string {
										if (!is_string($speedText)) {
											return '';
										}

										return preg_replace('~<small\\b[^>]*\\bclass=(["\\\'])[^"\\\']*\\bspeed-note\\b[^"\\\']*\\1[^>]*>.*?</small>~is', '', $speedText) ?? $speedText;
									};
								?>

								<tr class="tb-row2">
								<th>
									<?=$post->post_title == '東京スター銀行　おまとめローン' ? '仮審査期間' : '審査時間'?>
								</th>

								<?php
									$fieldObj = get_field_object ("rank-table_exam-speed_2024");
									$examSpeedChoices = $fieldObj['choices'] ?? [];
									$examSpeedKey = get_field("rank-table_exam-speed_2024");
									$examSpeedText = get_field("rank-table_exam-speed_text");
									$examSpeedDisplay = $examSpeedText ? $withoutInlineSpeedNote($examSpeedText) : ($examSpeedChoices[$examSpeedKey] ?? '');
									$promise = $post->ID == 119;
								?>

								<td <?php tableMaru($examSpeedKey) ?>>
                  <?= $promise ? '<span class="red">' : '' ?> 
											<?= $post->post_title == '東京スター銀行　おまとめローン' ? '最短2日<small class="small">※3</small>' : $examSpeedDisplay ?>
                  <?= $promise ? '</span>' : '' ?> 
									<?php echo $examSpeedSup ? '<small class="small">'.$examSpeedSup.'</small>' : ''; ?>
								</td>

								

								<th>融資時間</th>
								<?php
									$fieldObj = get_field_object("rank-table_loan-speed_2024");
									$loanSpeedChoices = $fieldObj['choices'] ?? [];
									$loanSpeedKey = get_field("rank-table_loan-speed_2024");
									$loanSpeedText = get_field("rank-table_loan-speed_text");
									$loanSpeedDisplay = $loanSpeedText ? $withoutInlineSpeedNote($loanSpeedText) : ($loanSpeedChoices[$loanSpeedKey] ?? '');
								?>

								<td <?php tableMaru($loanSpeedKey) ?>>
								
									<?= $promise ? '<span class="red">' : '' ?> 
											<?= $loanSpeedDisplay ?>
									<?= $promise ? '</span>' : '' ?> 
									<?php echo $loanSpeedSup ? '<small class="small">'.$loanSpeedSup.'</small>' : ''; ?>

								</td>

							</tr>



							<tr class="tb-row3">

								<th>利用可能<br>コンビニ</th>
								<td>
									<?php 
										if($conv) {
											foreach($conv as $c) { 
												echo get_con_img($c);
											} 
										} else {
											echo "-";
										}
									?>
									<?= $post->ID == 127 ? '<small class="small">※</small>' : '' ?>
								</td>

								<th>収入証明書</th>
								
								<td style="background-image:url(<?php bloginfo('template_url'); ?>/images/icons/maru-0<?= $syoumeisyo == '不要' ? '1' : ($syoumeisyo == '必要' ? '3' : '2'); ?>.svg);">
								<?= $syoumeisyo; 
                echo $syoumeisyoSup ? '<small class="small">'.$syoumeisyoSup.'</small>' : '';
                ?>

								</td>

							</tr>

						</table>

					</div>



				<!-- item-tag start -->
				<?php if($tag) : ?>
				<div class="item-tag">
					<ul class="tags -pickup">
					<?php
						$tagsToRender = array_map(
							function($t) use ($tag) {
								return [$t, in_array($t, $tag)];
							}, 
							$tagArray
						);

						foreach ($tagsToRender as $tagData) {
							echo renderTag($tagData[0], $tagData[1], $post->ID);
						}
					?>
					</ul>
				</div>
				<?php endif; ?>
				<!-- item-tag end -->




				<!-- item-timer start -->
				<?php if(!has_tag('no-timer')) : ?>

					<div class="item-timer <?= isset($_GET['ad']) && $_GET['ad'] === "video" ? '-video' : '' ?>">

						<div class="timer">
							
							<span class="timer-title bold">
								<?= !isset($_GET['ad']) || $_GET['ad'] !== "video" ? "本日借り入れるなら" : "本日現金を引き出すなら" ?>
							</span>
							<!-- <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/timer-arrow.svg" alt="" width="10" height="10"> -->

							<div class="timer-js">
								<span>あと</span>
								<span class="countdown"></span>
							</div>

						</div>

					</div>

				<?php endif; ?>
				<!-- item-timer end -->


				<!-- item-btn start -->
				<div class="item-btn c-button -ranking <?= (is_page('v2') || (isset($_GET['ad']) && strpos($_GET['ad'], '2')))  ? ' v2-rank-btn-group'  : (is_page('v3')  ? ' v3-rank-btn-group' : '') 
				?>">

					<?= get_popup_link() ?>

						<?php if(!has_tag('ボタン文言なし')) : ?>
							<p class="small btn-text">
								<span><span class="red bold">最短5分</span>で申込完了！</span>
							</p>
						<?php endif; ?>

						<span class="u-device-sp">スマホで申し込む</span>
						<span class="u-device-pc">公式サイトで申し込む</span>

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/btn-sp-arrow.svg" alt=">>" class="btn-arrow" width="10" height="10" loading="lazy">

					</a>

				</div>
				<!-- item-btn end -->


				<!-- item-sup start -->
				<?php if(!has_tag('注釈折畳')) : ?>

					<div class="item-sup rank-small-text">
						<small class="small">
							<?= get_field('sup-button') ?>
						</small>
					</div>

				<?php else : ?>

					<div class="rank-small-accordion item-accordion">
						<button class="acc-btn" id="js-acc-btn" @click="clickedAccBtn(<?= $key ?>)">
							<span><?=$post->post_title == "レイク" ? "注意点と貸付条件について" : "注釈を見る" ?></span>
							<span class="arrow" :class="{'open': isSupAcc[<?= $key ?>]}"></span>
						</button>
						<small class="small acc-ctt" id="js-acc-ctt" :class="{'open': isSupAcc[<?= $key ?>]}">
							<?= get_field('sup-acc') ?>
						</small>
					</div>

				<?php endif; ?>


				
				</li>

        
        <?php $displayed++; if($displayed >= 1) { break; }  endif; wp_reset_postdata(); endforeach; ?>


			</ul>

    </section>
    <!-- sp:ランキング紹介枠 -->
