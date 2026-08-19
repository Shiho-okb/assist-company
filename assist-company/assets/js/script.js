jQuery(function($) {
  /*-------------------------------------------
  ページトップボタン
  -------------------------------------------*/
  var topBtn = $(".js-pagetop");
  topBtn.hide();

  // ページトップボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ページトップボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing",
    );
    return false;
  });

  /*-------------------------------------------
  スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
  -------------------------------------------*/
  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate(
      {
        scrollTop: targetY,
      },
      time,
      "swing",
    );
    return false;
  });

  /*-------------------------------------------
  ハンバーガーメニュー
  -------------------------------------------*/
  $(".js-hamburger").on("click", function (e) {
    e.stopPropagation();
    $(this).toggleClass("is-active");
    $("body").toggleClass("active");
    $(".js-drawer").fadeToggle();

    checkFadeIn();
  });

  // ハンバーガーメニュー内リンク
  let isSp = window.matchMedia("(max-width: 767px)").matches;

  $(".p-header-nav-item__link[href], .p-header-dropmenu__link").on(
    "click",
    function () {
      // pc時は処理をしせず終了
      if (!isSp) return;

      $(".js-hamburger").toggleClass("is-active");
      $("body").toggleClass("active");
      $(".js-drawer").fadeToggle();

      checkFadeIn();
    },
  );

  // リサイズした際に、isSpを更新する
  window.addEventListener("resize", function () {
    isSp = window.matchMedia("(max-width: 767px)").matches;
  });

  /*-------------------------------------------
  スワイパー（トップページ メインビジュアル用）
  -------------------------------------------*/
  const swiper = new Swiper(".p-mainvisual__swiper", {
    loop: true, // ループ
    speed: 1500, // 少しゆっくり(デフォルトは300)
    slidesPerView: "auto", // 一度に表示する枚数
    spaceBetween: 20, // スライド間の距離
    centeredSlides: true, // アクティブなスライドを中央にする
    autoplay: {
      delay: 1000,
    },

    // レスポンシブ設定
    breakpoints: {
      768: {
        spaceBetween: 48,
      },
    },
  });

  /*-------------------------------------------
  施工事例詳細 スワイパー
  -------------------------------------------*/
  // サムネイル
  const worksThumbSwiper = new Swiper(".p-works-post__thumbs", {
    slidesPerView: 4,
    spaceBetween: 10,
    watchSlidesProgress: true,

    // レスポンシブ設定
    breakpoints: {
      768: {
        spaceBetween: 20,
      },
    },
  });

  // メイン
  const worksMainSwiper = new Swiper(".p-works-post__slider", {
    loop: true,
    effect: "fade", // ふわっと切替

    fadeEffect: {
      crossFade: true,
    },

    speed: 800,

    navigation: {
      nextEl: ".p-works-post__arrow--next",
      prevEl: ".p-works-post__arrow--prev",
    },

    thumbs: {
      swiper: worksThumbSwiper,
    },
  });
});
