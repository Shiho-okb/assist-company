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
  <?php get_template_part('template-parts/cta-recruit'); ?>
</main>

<?php get_footer(); ?>
