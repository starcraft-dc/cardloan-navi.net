



document.addEventListener('DOMContentLoaded', () => {
	TimeDisplay.init();
	switchViewport();
	if (document.querySelector('.js-popup-ctt.-d')) dsmartPopup();
	if (document.querySelector('.js-popup-ctt.-au')) auPopup();
	if(document.querySelector('#section-modoru .modoru-group')) modoru();
	accordion();
	countdown();
  toRanking();
	setInterval('countdown()', 1000)
});



const viewport = document.querySelector('meta[name="viewport"]');

function switchViewport() {
	const value =
		window.outerWidth > 375
			? 'width=device-width,initial-scale=1'
			: 'width=375';
	if (viewport.getAttribute('content') !== value) {
		viewport.setAttribute('content', value);
	}
}
addEventListener('resize', switchViewport, false);



const TimeDisplay = {
  config: {
    selector: '.timer-speed .time',
    updateInterval: 60000 // 1分 = 60000ミリ秒
  },

  // 時刻のフォーマット
  formatTimeUnit(unit) {
    return unit.toString().padStart(2, '0');
  },

  // 現在時刻の取得とフォーマット
  getCurrentTime() {
    const now = new Date();
    return {
      hours: this.formatTimeUnit(now.getHours()),
      minutes: this.formatTimeUnit(now.getMinutes())
    };
  },

  updateDisplay() {
    const timeElement = document.querySelector(this.config.selector);
    if (!timeElement) return;

    const { hours, minutes } = this.getCurrentTime();
    timeElement.textContent = `${hours}:${minutes}`;
    timeElement.style.visibility = 'visible';
  },

  init() {
    this.updateDisplay();
    setInterval(() => this.updateDisplay(), this.config.updateInterval);
  }
};


function dsmartPopup() {
  const dButton = document.querySelectorAll('.js-popup');
  const dPopup = document.querySelector('.js-popup-ctt.-d');

  const closeBtn = document.querySelector('.js-popup-ctt__close.-d');
  const buttons = dPopup.querySelectorAll('.next-btn');
  const targets = dPopup.querySelectorAll('.js-popup-ctt__inner li');

  // CTAボタンクリック
  dButton.forEach(button => {
    button.addEventListener('click', function (e) {
      // 初期化
      targets.forEach(target => {
        target.classList.remove('active');
      })
      targets[0].classList.add('active');

      e.preventDefault();

      // ポップアップ表示
      dPopup.classList.add('open');
      if (dPopup.classList.contains('open')) {
        closeBtn.addEventListener('click', function () {
          dPopup.classList.remove('open');
        })
      }
    })
  })

  // YES or NO ボタンクリック
  buttons.forEach(button => {
    button.addEventListener('click', function (e) {
      const clicked = e.currentTarget;
      const nextTarget = clicked.getAttribute('data-target');
      if (!nextTarget) return;
      targets.forEach(target => {
        if (target.getAttribute('data-content') == nextTarget) {
          target.classList.add('active');
        } else {
          target.classList.remove('active');
        }
      });
    });
  });

  // 前へボタンクリック
  const beforeBtn = document.querySelectorAll('.before');
  beforeBtn.forEach(btn => {
    btn.addEventListener('click', function (e) {
      targets.forEach(target => {
        target.classList.remove('active');
      })
      targets[0].classList.add('active');
    });
  });

}

function auPopup() {
  const auPopupCtt = document.querySelector('.js-popup-ctt.-au');
  if (!auPopupCtt) return;

  const auButtons = document.querySelectorAll('.js-popup-au');
  const closeBtn = auPopupCtt.querySelector('.js-popup-ctt__close.-au');
  const closeTexts = auPopupCtt.querySelectorAll('.js-popup-close-au');

  const closeAuPopup = () => auPopupCtt.classList.remove('open');

  // CTAボタンクリック → 即リダイレクトせずポップアップ表示
  auButtons.forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      auPopupCtt.classList.add('open');
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeAuPopup);
  closeTexts.forEach(el => el.addEventListener('click', closeAuPopup));
}

function toRanking() {
  const toRankingBtn = document.querySelectorAll(".js-torank");
  const rankingCtt = document.querySelector("#modoru-target");

  toRankingBtn.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const targetPosition = rankingCtt.getBoundingClientRect().top + window.pageYOffset - 50;
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth"
      });
    })
  })
} 


function accordion() {
  const accBtns = document.querySelectorAll('.accordion-btn');
  const accContents = document.querySelectorAll('.accodion-ctt'); // ←修正

  if (accBtns.length === 0 || accContents.length === 0) return;

  accBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      const arrow = this.querySelector('.arrow');
      if (arrow) arrow.classList.toggle('open');
      const next = this.nextElementSibling;
      if (next) next.classList.toggle('open');
    });
  });
}


function countdown() {
	var startDateTime = new Date();
	var endDateTime = new Date("06/06/2080 21:00:00")
	var left = endDateTime - startDateTime
	var a_day = 24 * 60 * 60 * 1000;

	// var d = Math.floor(left / a_day)
	var h = Math.floor((left % a_day) / (60 * 60 * 1000))
	var m = Math.floor((left % a_day) / (60 * 1000)) % 60
	var s = Math.floor((left % a_day) / 1000) % 60 % 60

	if (h < 10) {
		h = '0' + h;
	}
	if (m < 10) {
		m = '0' + m;
	}
	if (s < 10) {
		s = '0' + s;
	}
	// 要素の存在チェックを追加
	const fvImg = document.querySelector(".timer-top .timer-top__title img");
	const fvVideoImg = document.querySelector(".timer-top.video .timer-top__title img");
	const fvSubImg = document.querySelector(".timer-top .timer-top__title img");


	const rankTimerTitle = document.querySelectorAll(".p-ranking-item .timer .timer-title");
	const rankTimerVideoTitle = document.querySelectorAll(".p-ranking-item .item-timer.-video .timer .timer-title");



	const countdownElement = document.querySelectorAll(".countdown");

	if (h >= 21 && h <= 24) {
		// if(h >= 7) {
		if (fvImg) fvImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-pm.svg';
		if (fvVideoImg) fvVideoImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-video-pm.svg';
		if (fvSubImg) fvSubImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-pm.svg';
		if (rankTimerTitle) rankTimerTitle.forEach(title => title.innerHTML = `翌営業日中に<br>借り入れるなら`);
	} else {
		if (fvImg) fvImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext.svg';
		if (fvVideoImg) fvVideoImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-video.svg';
		if (fvSubImg) fvSubImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext.svg';
		if (rankTimerTitle) rankTimerTitle.forEach(title => title.innerText = `本日借り入れるなら`);
		if (rankTimerVideoTitle) rankTimerVideoTitle.forEach(title => title.innerText = `本日現金を引き出すなら`);
	}

	if (countdownElement) {
		countdownElement.forEach(element => {
			element.style.visibility = 'visible';
			element.innerHTML = h + '<span class="normal">時間</span>' + m + '<span class="normal">分</span>' + s + '<span class="normal">秒</span>';
		});
	}
}


document.addEventListener('DOMContentLoaded', () => {
  const altText = 'カードローン・お金借りる・消費者金融・キャッシング・借り入れ・今すぐお金が必要・他社借入・ローン・借りやすい・即日融資・金融期間・銀行・審査・金利';

  document.querySelectorAll('img').forEach((img) => {
    if (!img.closest('header') && !img.closest('footer')) {
      img.setAttribute('alt', altText);
    }
  });
});