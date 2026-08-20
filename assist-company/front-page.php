<?php get_header(); ?>

<main>
  <!-- メインビジュアル -->
  <?php
  // ACF画像フィールドから動的にスライドを生成
  $slides = array();
  for ($i = 1; $i <= 6; $i++) {
    $field_name = 'mv_slide_' . $i;
    $img = get_field($field_name);
    if ($img) {
      $slides[] = $img;
    }
  }

  // 画像が1枚以上の場合のみセクションを出力
  if (!empty($slides)):
  ?>
    <section class="p-mainvisual l-mainvisual">
      <div class="swiper p-mainvisual__swiper">
        <div class="swiper-wrapper">
          <?php foreach ($slides as $idx => $img): ?>
            <!-- スライド<?php echo $idx + 1; ?> -->
            <div class="p-mainvisual__slide swiper-slide">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?? ''); ?>" width="904" height="500">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

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
            <?php
            $news_query = new WP_Query(array(
              'post_type'      => 'post',
              'posts_per_page' => 3,
              'orderby'        => 'date',
              'order'          => 'DESC',
            ));

            if ($news_query->have_posts()):
              while ($news_query->have_posts()): $news_query->the_post();

                // 投稿のカテゴリーを取得
                $post_categories = get_the_category();

                // デフォルト値（News）の設定
                $category_label = 'News';
                $category_class = 'c-news-card__category--news';

                // カテゴリースラッグに応じて設定
                if (! empty($post_categories)) {
                  foreach ($post_categories as $post_category) {
                    $category_slug = $post_category->slug;

                    if ('uncategorized' === $category_slug) {
                      continue;
                    }

                    if ('news-info' === $category_slug || 'news' === $category_slug) {
                      // Newsの場合
                      $category_label = 'News';
                      $category_class = 'c-news-card__category--news';
                      break;
                    } elseif ('recruit-info' === $category_slug || 'recruit' === $category_slug) {
                      // 採用の場合
                      $category_label = '採用';
                      $category_class = 'c-news-card__category--recruit';
                      break;
                    } elseif ('blog' === $category_slug || 'blog-info' === $category_slug) {
                      // ブログの場合
                      $category_label = 'ブログ';
                      $category_class = 'c-news-card__category--blog';
                      break;
                    } else {
                      // その他カテゴリー
                      $category_label = $post_category->name;
                      $category_class = 'c-news-card__category--' . $category_slug;
                      break;
                    }
                  }
                }
            ?>
                <li class="p-top-news__card c-news-card">
                  <a href="<?php the_permalink(); ?>" class="c-news-card__item">
                    <span class="c-news-card__category <?php echo esc_attr($category_class); ?>">
                      <?php echo esc_html($category_label); ?>
                    </span>
                    <time class="c-news-card__date" datetime="<?php the_time('Y-m-d'); ?>">
                      <?php the_time('Y.m.d'); ?>
                    </time>
                    <p class="c-news-card__title">
                      <?php the_title(); ?>
                    </p>
                  </a>
                </li>
              <?php endwhile;
            else: ?>
              <p>お知らせはありません</p>
            <?php
            endif;
            wp_reset_postdata();
            ?>
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
          <?php
          $args = array(
            'post_type' => 'works',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
          );
          $works_query = new WP_Query($args);

          if ($works_query->have_posts()) :
            while ($works_query->have_posts()) : $works_query->the_post();
          ?>
              <li class="p-top-works__card c-works-card">
                <a href="<?php the_permalink(); ?>" class="c-works-card__item">
                  <div class="c-works-card__image">
                    <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('medium');
                    } ?>
                  </div>
                  <div class="c-works-card__body">
                    <h3 class="c-works-card__title"><?php the_title(); ?></h3>
                    <p class="c-works-card__text">
                      <?php
                      $excerpt = get_the_excerpt();
                      echo esc_html(mb_substr($excerpt, 0, 78));
                      ?>
                    </p>
                    <div class="c-works-card__tags">
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'case');
                      if (! empty($terms) && ! is_wp_error($terms)) {
                        $first_term = $terms[0];
                        echo '<span class="c-works-card__tag c-works-card__tag--black">' . esc_html($first_term->name) . '</span>';
                      }
                      $completion = get_field('completion_year');
                      if ($completion) {
                        echo '<span class="c-works-card__tag c-works-card__tag--white">' . esc_html($completion) . '年</span>';
                      }
                      ?>
                    </div>
                  </div>
                </a>
              </li>
            <?php
            endwhile;
          else :
            ?>
            <p>Coming Soon</p>
          <?php
          endif;
          wp_reset_postdata();
          ?>
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
  <?php get_template_part('template-parts/cta-recruit'); ?>

  <!-- お問い合わせ -->
  <?php get_template_part('template-parts/cta-contact'); ?>
</main>

<?php get_footer(); ?>
