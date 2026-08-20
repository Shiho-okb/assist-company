<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-company-header l-company-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <h1 class="c-page-header__title c-title ">
          <span class="c-title__en">Company</span>
          <span class="c-title__ja">我々について</span>
        </h1>
      </div>
    </div>
  </div>

  <!-- パンくずリスト -->
  <div class="p-company-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- 我々について -->
  <section class="p-company p-company--low">
    <div class="p-company__inner l-inner">
      <div class="p-company__wrapper">
        <h2 class="p-company__title c-title c-title--white">
          <span class="c-title__en">Company</span>
          <span class="c-title__ja">我々について</span>
        </h2>
        <div class="p-company__content">
          <p class="p-company__heading">
            世界を「アッ！」と驚かせる<br>
            当たり前を
          </p>
          <p class="p-company__text">
            <span>それが、私たちの目指すもの。</span>
            <span>建築・土木という仕事の先にあるものを考える。</span>
            <span>お客様の笑顔を思い浮かべながら、</span>
            <span>ふとした場面で生まれる「アッ！」を大切に、</span>
            <span>記憶に残る空気をつくっていきます。</span>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 会社概要 -->
  <section class="p-overview">
    <div class="p-overview__inner l-inner">
      <div class="p-overview__wrapper">
        <h2 class="p-overview__title c-line-title">
          <span>会</span>社概要
        </h2>
        <dl class="p-overview__table">
          <div class="p-overview__row">
            <dt class="p-overview__term">会社名</dt>
            <dd class="p-overview__description">Assist Company</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">代表取締役</dt>
            <dd class="p-overview__description">幸道　助力</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">事業内容</dt>
            <dd class="p-overview__description">建設事業の請負</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">ホームページURL</dt>
            <dd class="p-overview__description">
              <a href="https://www.codoXXX-assistXXX.com" target="_blank" rel="noopener noreferrer">https://www.codoXXX-assistXXX.com</a>
            </dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">資本金</dt>
            <dd class="p-overview__description">100.3億円</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">所在地</dt>
            <dd class="p-overview__description">東京都品川区XXXX4-1-1</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">電話番号</dt>
            <dd class="p-overview__description p-overview__description--tel">
              <a href="tel:0300000000">
                03-0000-0000
              </a>
            </dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">メール</dt>
            <dd class="p-overview__description">info@codoXXX-assistXXX.jp</dd>
          </div>
          <div class="p-overview__row">
            <dt class="p-overview__term">取引先一覧</dt>
            <dd class="p-overview__description">◯◯◯◯◯株式会社、◯◯◯◯◯株式会社、◯◯◯◯◯株式会社</dd>
          </div>
        </dl>
      </div>
    </div>
  </section>

  <!-- 採用情報 -->
  <?php get_template_part('template-parts/cta-recruit'); ?>

  <!-- お問い合わせ -->
  <?php get_template_part('template-parts/cta-contact'); ?>
</main>

<?php get_footer(); ?>
