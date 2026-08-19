<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-works-header l-works-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <div class="c-page-header__title c-title ">
          <span class="c-title__en">Works</span>
          <span class="c-title__ja">施工事例</span>
        </div>
      </div>
    </div>
  </div>

  <!-- パンくずリスト -->
  <div class="p-works-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <ol class="c-breadcrumb__list">
        <li class="c-breadcrumb__item">
          <a href="./index.html">
            TOP
          </a>
        </li>
        <li class="c-breadcrumb__item">
          <a href="./news.html">
            施工事例
          </a>
        </li>
        <li class="c-breadcrumb__item">
          スカイタワー新橋
        </li>
      </ol>
    </div>
  </div>

  <!-- 施工事例詳細ポスト -->
  <div class="p-works-post">
    <div class="p-works-post__inner l-inner">
      <div class="p-works-post__wrapper">
        <article class="p-works-post__main">
          <h1 class="p-works-post__title">
            <?php the_title(); ?>
          </h1>
          <div class="p-works-post__tags c-works-card__tags">
            <span class="c-works-card__tag c-works-card__tag--black c-works-card__tag--office">
              <?php
              $terms = get_the_terms(get_the_ID(), 'case');
              if (!empty($terms) && !is_wp_error($terms)) {
                $term = $terms[0];
                echo esc_html($term->name);
              } else {
                echo '施工事例';
              }
              ?>
            </span>
            <!-- 竣工年月 -->
            <?php
            $year = get_field('completion_year');
            if ($year) :
              echo '<span class="c-works-card__tag c-works-card__tag--white">' . esc_html($year) . '年</span>';
            endif;
            ?>
          </div>
          <!-- ギャラリー画像 -->
          <?php
          $images = array();
          for ($i = 1; $i <= 4; $i++) {
            $image = get_field('gallery_' . $i);
            if (!empty($image) && is_array($image) && !empty($image['url'])) {
              $images[] = array(
                'url' => $image['url'],
                'alt' => !empty($image['alt']) ? $image['alt'] : '',
              );
            }
          }

          if (!empty($images)) :
            $gallery_count = count($images);
            $gallery_class = 'gallery-' . $gallery_count;
          ?>
            <section class="p-works-post__gallery <?php echo esc_attr($gallery_class); ?>">
              <?php if ($gallery_count === 1) : ?>
                <div class="p-works-post__image">
                  <img src="<?php echo esc_url($images[0]['url']); ?>" alt="<?php echo esc_attr($images[0]['alt']); ?>" width="1000" height="560">
                </div>
              <?php else : ?>
                <div class="p-works-post__slider swiper">
                  <div class="swiper-wrapper">
                    <?php foreach ($images as $image) : ?>
                      <div class="p-works-post__image swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="1000" height="560">
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <button class="p-works-post__arrow p-works-post__arrow--prev swiper-button-prev" aria-label="前へ"></button>
                  <button class="p-works-post__arrow p-works-post__arrow--next swiper-button-next" aria-label="次へ"></button>
                </div>

                <div class="p-works-post__thumbs swiper">
                  <div class="swiper-wrapper">
                    <?php foreach ($images as $image) : ?>
                      <div class="p-works-post__thumb swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="235" height="132">
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </section>
          <?php endif; ?>

          <!-- 施設詳細 -->
          <dl class="p-works-post__data">
            <?php
            // 施設用途
            $purpose = get_field('purpose');
            if ($purpose):
            ?>
              <div>
                <dt>施設用途</dt>
                <dd><?php echo esc_html($purpose); ?></dd>
              </div>
            <?php endif; ?>

            <?php
            // エリア
            $area = get_field('area');
            if ($area):
            ?>
              <div>
                <dt>エリア</dt>
                <dd><?php echo esc_html($area); ?></dd>
              </div>
            <?php endif; ?>

            <?php
            // 発注
            $supplier = get_field('supplier');
            if ($supplier):
            ?>
              <div>
                <dt>発注</dt>
                <dd><?php echo esc_html($supplier); ?></dd>
              </div>
            <?php endif; ?>

            <?php
            // 竣工年月
            $completion_year = get_field('completion_year');
            $completion_month = get_field('completion_month');
            if ($completion_year || $completion_month):
            ?>
              <div>
                <dt>竣工年月</dt>
                <dd><?php echo esc_html($completion_year); ?>年<?php echo esc_html($completion_month); ?>月</dd>
              </div>
            <?php endif; ?>
          </dl>
          <div class="p-works-post__text">
            <?php the_content(); ?>
          </div>
          <div class="p-works-post__btn">
            <a href="<?php echo esc_url(home_url('/works')); ?>" class="c-btn">
              一覧へ戻る
              <span></span>
            </a>
          </div>
        </article>

        <!-- 関連記事 -->
        <?php
        // 現在の投稿に関連するタームを取得
        $current_terms = get_the_terms(get_the_ID(), 'case');
        $term_ids = array();
        if (!empty($current_terms) && !is_wp_error($current_terms)) {
          $term_ids = wp_list_pluck($current_terms, 'term_id');
        }

        $related_query = null;
        if (!empty($term_ids)) {
          // 関連する投稿を取得（現在の投稿を除外）
          $related_query = new WP_Query(array(
            'post_type'      => 'works',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'date',
            'order'          => 'DESC',
            'tax_query'      => array(
              array(
                'taxonomy' => 'case',
                'field'    => 'term_id',
                'terms'    => $term_ids,
                'operator' => 'IN',
              ),
            ),
          ));
        }

        // 関連記事が存在する場合に表示
        if ($related_query && $related_query->have_posts()) :
        ?>
          <section class="p-works-post__related">
            <h2 class="p-works-post__related-title c-line-title">
              <span>関</span>連記事
            </h2>
            <ul class="p-works-post__cards">
              <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <li class="p-works-post__card c-column-card">
                  <a href="<?php the_permalink(); ?>" class="c-column-card__item">
                    <div class="c-column-card__image">
                      <?php if (has_post_thumbnail()) : ?>
                        <!-- アイキャッチ画像がある場合 -->
                        <?php the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async', 'style' => 'width: 100%; height: auto;')); ?>
                      <?php else : ?>
                        <!-- アイキャッチ画像がない場合の代替画像 -->
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/works-post/works-post_01.webp'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" decoding="async">
                      <?php endif; ?>
                    </div>
                    <div class="c-works-card__tags">
                      <?php
                      $related_terms = get_the_terms(get_the_ID(), 'case');
                      if (!empty($related_terms) && !is_wp_error($related_terms)) {
                        $related_term = $related_terms[0];
                      ?>
                        <span class="c-works-card__tag c-works-card__tag--black c-works-card__tag--office">
                          <?php echo esc_html($related_term->name); ?>
                        </span>
                      <?php } else { ?>
                        <span class="c-works-card__tag c-works-card__tag--black c-works-card__tag--office">
                          施工事例
                        </span>
                      <?php } ?>
                      <!-- 竣工年月 -->
                      <?php
                      $related_year = get_field('completion_year');
                      if ($related_year) :
                      ?>
                        <span class="c-works-card__tag c-works-card__tag--white">
                          <?php echo esc_html($related_year); ?>年
                        </span>
                      <?php endif; ?>
                    </div>
                    <p class="c-column-card__title">
                      <?php the_title(); ?>
                    </p>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </section>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
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
