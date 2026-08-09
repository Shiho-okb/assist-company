<?php get_header(); ?>

  <main>
    <!-- メインビジュアル -->
    <section class="p-mainvisual l-mainvisual">
      <div class="swiper p-mainvisual__swiper">
        <div class="swiper-wrapper">
          <!-- スライド１ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_01.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド２ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_02.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド３ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_03.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド４ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_04.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド５ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_05.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド６ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_06.jpg'); ?>" alt="" width="904" height="500">
          </div>
          <!-- スライド７ -->
          <div class="p-mainvisual__slide swiper-slide">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mv/mv_07.jpg'); ?>" alt="" width="904" height="500">
          </div>
        </div>
      </div>
    </section>

    <!-- お知らせ -->
    <section class="p-top-news l-top-news">
      <div class="p-top-news__inner l-inner">
        <div class="p-top-news__wrapper">
          <div class="p-top-news__content">
            <h2 class="p-top-news__title c-title">
              <span class="c-title__en">News</span>
              <span class="c-title__ja">お知らせ</span>
            </h2>
            <ol class="p-top-news__cards">
              <li class="p-top-news__card c-news-card">
                <a href="#" class="c-news-card__item">
                  <span class="c-news-card__category c-news-card__category--blog">
                    ブログ
                  </span>
                  <time class="c-news-card__date" datetime="2026-01-01">
                    2026.01.01
                  </time>
                  <p class="c-news-card__title">
                    あけましておめでとうございます
                  </p>
                </a>
              </li>
              <li class="p-top-news__card c-news-card">
                <a href="#" class="c-news-card__item">
                  <span class="c-news-card__category c-news-card__category--recruit">
                    採用
                  </span>
                  <time class="c-news-card__date" datetime="2025-12-18">
                    2025.12.18
                  </time>
                  <p class="c-news-card__title">
                    2027年度採用エントリーについて
                  </p>
                </a>
              </li>
              <li class="p-top-news__card c-news-card">
                <a href="#" class="c-news-card__item">
                  <span class="c-news-card__category c-news-card__category--news">
                    News
                  </span>
                  <time class="c-news-card__date" datetime="2025-12-14">
                    2025.12.14
                  </time>
                  <p class="c-news-card__title">
                    TVCMが放映されます
                  </p>
                </a>
              </li>
            </ol>
          </div>
          <div class="p-top-news__btn">
            <a href="./news.html" class="c-btn">
              MORE
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- 施工事例 -->
    <section class="p-top-works l-top-works">
      <div class="p-top-works__inner l-inner">
        <div class="p-top-works__wrapper">
          <h2 class="p-top-works__title c-title">
            <span class="c-title__en">Works</span>
            <span class="c-title__ja">施工事例</span>
          </h2>
          <ol class="p-top-works__cards">
            <!-- card -->
            <li class="p-top-works__card c-works-card">
              <a href="#" class="c-works-card__item">
                <div class="c-works-card__image">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/works/works_01.webp'); ?>" alt="スカイタワー新橋" width="317" height="195" loading="lazy" decoding="async">
                </div>
                <div class="c-works-card__body">
                  <h3 class="c-works-card__title">
                    スカイタワー新橋
                  </h3>
                  <p class="c-works-card__text">
                    近年急速に都市機能の更新が進むビジネスエリア「新橋」で企画・設計・施工を手掛けた自社開発物件で、駅から徒歩9分の好立地に位置する高規格な賃貸
                  </p>
                  <div class="c-works-card__tags">
                    <span class="c-works-card__tag c-works-card__tag--black c-works-card__tag--office">
                      オフィスビル
                    </span>
                    <span class="c-works-card__tag c-works-card__tag--white">
                      2025年
                    </span>
                  </div>
                </div>
              </a>
            </li>
            <!-- card -->
            <li class="p-top-works__card c-works-card">
              <a href="#" class="c-works-card__item">
                <div class="c-works-card__image">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/works/works_02.webp'); ?>" alt="梅田ビルスクエア" width="317" height="195" loading="lazy" decoding="async">
                </div>
                <div class="c-works-card__body">
                  <h3 class="c-works-card__title">
                    梅田ビルスクエア
                  </h3>
                  <p class="c-works-card__text">
                    メインストリートに面して立地する、1階が店舗、2～13階が事務所となる賃貸床面積約3,230坪の賃貸オフィスビルであり、事業企画・設計・施工による自社
                  </p>
                  <div class="c-works-card__tags">
                    <span class="c-works-card__tag c-works-card__tag--black c-works-card__tag--office">
                      オフィスビル
                    </span>
                    <span class="c-works-card__tag c-works-card__tag--white">
                      2025年
                    </span>
                  </div>
                </div>
              </a>
            </li>
            <!-- card -->
            <li class="p-top-works__card c-works-card">
              <a href="#" class="c-works-card__item">
                <div class="c-works-card__image">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/works/works_03.webp'); ?>" alt="栄市立院 本館北タワー" width="317" height="195" loading="lazy" decoding="async">
                </div>
                <div class="c-works-card__body">
                  <h3 class="c-works-card__title">
                    栄市立院 本館北タワー
                  </h3>
                  <p class="c-works-card__text">
                    地域の精神科医療の中核を担う大規模病院（総461床）における増築建物である。対象である児童思春期病棟・外来棟は、中学生までの患者が対象であることから、
                  </p>
                  <div class="c-works-card__tags">
                    <span class="c-works-card__tag c-works-card__tag--black">
                      福祉施設
                    </span>
                    <span class="c-works-card__tag c-works-card__tag--white">
                      2024年
                    </span>
                  </div>
                </div>
              </a>
            </li>
          </ol>
          <div class="p-top-works__btn">
            <a href="./works.html" class="c-btn">
              MORE
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- 我々について -->
    <section class="p-company p-company--top">
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
          <div class="p-company__btn">
            <a href="./company.html" class="c-btn c-btn--white">
              MORE
              <span></span>
            </a>
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

    <!-- お問い合わせ -->
    <section class="p-contact-cta">
      <div class="p-contact-cta__inner l-inner">
        <div class="p-contact-cta__wrapper">
          <h2 class="p-contact-cta__title c-title">
            <span class="c-title__en">Contact</span>
            <span class="c-title__ja">お問い合わせ</span>
          </h2>
          <div class="p-contact-cta__btn">
            <a href="./contact.html" class="c-btn">
              MORE
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
