<?php get_header(); ?>

<main>
  <!-- パンくずリスト -->
  <div class="p-404-breadcrumb l-404-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- 404 -->
  <section class="p-404">
    <div class="p-404__inner l-inner">
      <div class="p-404__wrapper">
        <div class="p-404__main">
          <h1 class="p-404__title">
            404 NOT FOUND
          </h1>
          <p class="p-404__text">
            お探しのページが見つかりませんでした。<br>
            削除された可能性があります。
          </p>
          <div class="p-404__btn">
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
