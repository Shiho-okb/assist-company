<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-contact-header l-contact-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <h1 class="c-page-header__title c-title ">
          <span class="c-title__en">Contact</span>
          <span class="c-title__ja">お問い合わせ</span>
        </h1>
      </div>
    </div>
  </div>

  <!-- パンくずリスト -->
  <div class="p-contact-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <ol class="c-breadcrumb__list">
        <li class="c-breadcrumb__item">
          <a href="./index.html">
            TOP
          </a>
        </li>
        <li class="c-breadcrumb__item">
          お問い合わせ
        </li>
      </ol>
    </div>
  </div>

  <!-- お問い合わせ -->
  <div class="p-contact">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__wrapper">
        <div class="p-contact__lead">
          <p class="p-contact__lead-text">
            下記項目にご記入いただき、お間違いがないかご確認の上、「送信」ボタンを押してください。
          </p>
          <p class="p-contact__required">
            <span>必須</span>
            は記入必須項目です。
          </p>
        </div>
        <form class="p-contact__form">
          <!-- お名前 -->
          <div class="p-contact__row">
            <label class="p-contact__label" for="contact-name">
              お名前
              <span>必須</span>
            </label>
            <input id="contact-name" class="p-contact__input" type="text">
          </div>
          <!-- ふりがな -->
          <div class="p-contact__row">
            <label class="p-contact__label" for="contact-furigana">
              ふりがな
              <span>必須</span>
            </label>
            <input id="contact-furigana" class="p-contact__input" type="text">
          </div>
          <!-- 郵便番号 -->
          <div class="p-contact__row">
            <label class="p-contact__label">
              郵便番号
            </label>
            <div class="p-contact__zip">
              <span class="p-contact__zip-mark">〒</span>
              <input id="contact-zip1" class="p-contact__input p-contact__input--left" type="text" aria-label="郵便番号前半">
              <span class="p-contact__zip-line">ー</span>
              <input id="contact-zip2" class="p-contact__input p-contact__input--right" type="text" aria-label="郵便番号後半">
            </div>
          </div>
          <!-- 住所 -->
          <div class="p-contact__row">
            <label class="p-contact__label" for="contact-address">
              住所
            </label>
            <input id="contact-address" class="p-contact__input" type="text">
          </div>
          <!-- 電話番号 -->
          <div class="p-contact__row">
            <label class="p-contact__label" for="contact-tel">
              電話番号
            </label>
            <input id="contact-tel" class="p-contact__input" type="tel">
          </div>
          <!-- メールアドレス -->
          <div class="p-contact__row">
            <label class="p-contact__label" for="contact-email">
              メールアドレス
              <span>必須</span>
            </label>
            <input id="contact-email" class="p-contact__input" type="email">
          </div>
          <!-- お問い合わせ -->
          <div class="p-contact__row p-contact__row--top">
            <label class="p-contact__label" for="contact-message">
              お問い合わせ
              <span>必須</span>
            </label>
            <textarea id="contact-message" class="p-contact__textarea"></textarea>
          </div>
          <label class="p-contact__privacy">
            <input id="contact-privacy" type="checkbox">
            <span>
              <a href="./privacy-policy.html">プライバシーポリシー</a>に同意する
            </span>
          </label>
          <div class="p-contact__btn">
            <a href="./thanks.html" class="c-btn">
              送　信
              <span></span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- 採用情報 -->
  <section class="p-recruit-cta">
    <div class="p-recruit-cta__inner l-inner">
      <div class="p-recruit-cta__wrapper">
        <div class="p-recruit-cta__head">
          <h2 class="p-recruit-cta__title c-title c-title--white">
            <span class="c-title__en">Recruit</span>
            <span class="c-title__ja">採用情報</span>
          </h2>
        </div>
        <div class="p-recruit-cta__content">
          <p class="p-recruit-cta__catch">
            私たちと未来を創造しませんか？
          </p>
          <div class="p-recruit-cta__btn">
            <a href="./recruit.html" class="c-btn">
              MORE
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
