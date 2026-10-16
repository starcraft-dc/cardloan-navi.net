
<?php function Hyouka($data) { if($data == 1) : ?>
  <span>4.9</span>
<?php elseif($data == 2) : ?>
  <span>4.7</span>
<?php elseif($data == 3)  : ?>
  <span>4.5</span>
<?php elseif($data == 4) : ?>
  <span>4.4</span>
<?php elseif($data == 5) : ?>
  <span>4.3</span>
<?php elseif($data == 6) : ?>
  <span>4.1</span>
<?php elseif($data == 7) : ?>
  <span>3.9</span>
<?php elseif($data == 8) : ?>
  <span>3.8</span>
<?php elseif($data == 9) : ?>
  <span>3.5</span>
<?php elseif($data == 10) : ?>
  <span>3.4</span>
<?php else : ?>
  <span>3.3</span>
<?php endif; } ?>


<?php function starImg($data) { if($data == 1) : ?>
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/hoshi-01.svg" alt="">
<?php elseif($data >= 2 && $data <= 4) : ?>
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/hoshi-02.svg" alt="">
<?php elseif($data >= 5 && $data <= 7)  : ?>
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/hoshi-03.svg" alt="">
<?php else : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/hoshi-04.svg" alt="">
<?php endif; } ?>

<!-- 2024 04 09 追加 -->
<?php function tableMaru($data) {
  if($data === '' || $data === null || (int)$data === 21) {
    echo '';
  } elseif((int)$data <= 9) {
    echo 'style="background-image:url('.esc_url( get_template_directory_uri()).'/images/icons/maru-01.svg)" data-icon="maru"';
  }elseif((int)$data <= 13) {
    echo 'style="background-image:url('.esc_url( get_template_directory_uri()).'/images/icons/maru-02.svg)" data-icon="maru"';
  }else {
    echo 'style="background-image:url('.esc_url( get_template_directory_uri()).'/images/icons/maru-03.svg)" data-icon="maru"';
  }
}
?>

<?php

function cardloan_rank_table_speed_text($field_name, $hide_migrated_note = false) {
  $rank_table = get_field('rank-table');
  $text = is_array($rank_table) ? ($rank_table[$field_name] ?? '') : '';
  return $hide_migrated_note
    ? preg_replace('/<small class="small speed-note">.*?<\\/small>/', '', $text)
    : $text;
}

function limit($data, $prefix = '最大') {
  if($data == 1) {
    echo $prefix . "1,000万円";
  } elseif($data == 2) {
    echo $prefix . "900万円";
  } elseif($data == 3) {
    echo $prefix . "800万円";
  } elseif($data == 4) {
    echo $prefix . "500万円";
  } elseif($data == 5) {
    echo $prefix . "300万円";
  } elseif($data == 6) {
    echo $prefix . "200万円";
  } else {
    echo $prefix . "100万円";
  }
}

function sTime($data) {
  if($data == 10) {
    echo "-";
  } elseif($data == 25) {
    echo "最短25分";
  } elseif($data == 30) {
    echo "最短30分";
  } elseif($data == 60) {
    echo "最短1時間";
  } else {
    echo $data;
  }
}

function sTimeN($data) {
  if($data == 0) {
    echo "最短20分";
  } elseif($data == 1) {
    echo "最短25分";
  } elseif($data == 2) {
    echo "最短30分";
  } elseif($data == 3) {
    echo "最短60分";
  } elseif($data == 4) {
    echo "最短即日";
  } elseif($data == 5) {
    echo "最短当日";
  } elseif($data == 6) {
    echo "最短翌営業日";
  } elseif($data == 7) {
    echo "最短翌営業日以降";
  } elseif($data == 8) {
    echo "翌日以降";
  } elseif($data == 9) {
    echo "最短翌日以降";
  } elseif($data == 10) {
    echo "最短2~3営業日";
  } elseif($data == 11) {
    echo "最短1週間";
  } elseif($data == 12) {
    echo "1週間程度";
  } 
}
?>

<?php function risoku($data) {
  if($data == 1) {
    echo "-";
  } elseif($data == 2) {
    echo "初めてなら最大30日間無利息";
  } elseif($data == 3) {
    echo "60日間利息0円or5万までなら180日間利息0円";
  } elseif($data == 4) {
    echo "はじめての方なら最大30日間利息0円";
  } elseif($data == 5) {
    echo "はじめての方なら最大30日間金利0円";
  } elseif($data == 6) {
    echo "最大2ヵ月分のお利息 実質0円";
  } 
}
?>

<?php 
  function newRisoku($data) {
    if($data == 2 || $data == 4) {
      echo "30日間";
    } elseif($data == 3) {
      echo "60日間";
    }else {
      echo "-";
    }
  }
?>

<?php function con($data) { if($data == 'セブンイレブン') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-seven.svg" alt="">
<?php elseif($data == 'ローソン') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-lawson.svg" alt="">
<?php elseif($data == 'ファミマ') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-family.svg" alt="">
<?php elseif($data == 'ミニストップ') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-mini.svg" alt="">
<?php elseif($data == 'サークルＫ') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-k.svg" alt="">
<?php elseif($data == 'サンクス') : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/rank/con-sunkus.svg" alt="">

<?php endif; } ?>

<?php function maru($data) {  if($data == true ) : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/maru-2.svg" alt="">
<?php else : ?>
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/maru-4.svg" alt="">
<?php endif; } ?>
