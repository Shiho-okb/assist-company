<?php get_header(); ?>

<main>
  <!-- パンくずリスト -->
  <div class="p-thanks-breadcrumb l-thanks-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- お問い合わせ -->
  <section class="p-thanks">
    <div class="p-thanks__inner l-inner">
      <div class="p-thanks__wrapper">
        <div class="p-thanks__main">
          <h1 class="p-thanks__title">
            お問い合わせ<br class="u-sp">ありがとうございます
          </h1>
          <p class="p-thanks__text">
            担当者より5営業日内に折り返しご連絡いたします。<br>
            ご対応まで今しばらくお待ちください。
          </p>
          <div class="p-thanks__btn">
            <a href="./index.html" class="c-btn">
              TOPへ戻る
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

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
