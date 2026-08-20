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
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- お問い合わせフォーム -->
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
        <div class="p-contact__form">
          <?php echo do_shortcode('[contact-form-7 id="39289eb" title="お問い合わせ"]'); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- 採用情報 -->
  <?php get_template_part('template-parts/cta-recruit'); ?>
</main>

<?php get_footer(); ?>
