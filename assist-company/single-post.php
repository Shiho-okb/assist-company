<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-news-header l-news-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <div class="c-page-header__title c-title ">
          <span class="c-title__en">News</span>
          <span class="c-title__ja">お知らせ</span>
        </div>
      </div>
    </div>
  </div>

  <!-- パンくずリスト -->
  <div class="p-news-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- お知らせ詳細ポスト -->
  <div class="p-news-post">
    <div class="p-news-post__inner l-inner">
      <div class="p-news-post__wrapper">
        <!-- 本文 -->
        <article class="p-news-post__main">
          <h1 class="p-news-post__title">
            <?php the_title(); ?>
          </h1>

          <?php
          // 投稿のカテゴリーを取得
          $post_categories = get_the_category();

          // デフォルト値（News）の設定
          $category_label = 'News';
          $category_class = 'c-news-card__category--news c-news-tag';
          $category_data_attr = 'data-category="news"';

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
                $category_class = 'c-news-card__category--news c-news-tag';
                $category_data_attr = 'data-category="news"';
                break;
              } elseif ('recruit-info' === $category_slug || 'recruit' === $category_slug) {
                // 採用の場合
                $category_label = '採用';
                $category_class = 'c-news-card__category--recruit c-news-tag';
                $category_data_attr = 'data-category="recruit"';
                break;
              } else {
                // その他カテゴリー
                $category_label = $post_category->name;
                $category_class = 'c-news-tag';
                $category_data_attr = 'data-category="' . esc_attr($category_slug) . '"';
                break;
              }
            }
          }
          ?>

          <div class="p-news-post__meta c-news-card">
            <?php if (! empty($category_label)) : ?>
              <span class="c-news-card__category <?php echo esc_attr($category_class); ?>" <?php echo $category_data_attr; ?>>
                <?php echo esc_html($category_label); ?>
              </span>
            <?php endif; ?>
            <time class="c-news-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
              <?php the_time('Y.m.d'); ?>
            </time>
          </div>

          <?php if (has_post_thumbnail()) : ?>
            <!-- 記事本文：アイキャッチ画像がある時のみ表示 -->
            <div class="p-news-post__image">
              <?php the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async', 'alt' => get_the_title())); ?>
            </div>
          <?php endif; ?>

          <div class="p-news-post__body">
            <?php the_content(); ?>
          </div>

          <div class="p-news-post__btn">
            <a href="<?php echo esc_url(home_url('/news')); ?>" class="c-btn">
              一覧へ戻る
              <span></span>
            </a>
          </div>
        </article>

        <!-- 関連記事 -->
        <?php
        // 投稿のカテゴリーを取得
        $cats = get_the_category();
        if (! empty($cats)) {
          $cat_ids = wp_list_pluck($cats, 'term_id');
          $related_query = new WP_Query(array(
            'posts_per_page'      => 3,
            'post__not_in'        => array(get_the_ID()),
            'category__in'        => $cat_ids,
            'post_type'           => 'post',
            'ignore_sticky_posts' => true,
            'orderby'             => 'date',
            'order'               => 'DESC',
          ));
        }
        ?>
        <!-- 関連記事が存在する場合に表示 -->
        <?php if (! empty($related_query) && $related_query->have_posts()) : ?>
          <section class="p-news-post__related">
            <h2 class="p-news-post__related-title c-line-title">
              <span>関</span>連記事
            </h2>
            <ul class="p-news-post__cards">
              <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <?php
                // 関連記事のカテゴリー判定
                $related_cats = get_the_category();

                // デフォルト値（News）の設定
                $category_label = 'News';
                $category_class = 'c-column-card__category c-column-card__category--news';
                $category_data_attr = 'data-category="news"';

                if (! empty($related_cats)) {
                  foreach ($related_cats as $related_cat) {
                    $category_slug = $related_cat->slug;

                    if ('uncategorized' === $category_slug) {
                      continue;
                    }

                    if ('news-info' === $category_slug || 'news' === $category_slug) {
                      // Newsの場合
                      $category_label = 'News';
                      $category_class = 'c-column-card__category c-column-card__category--news';
                      $category_data_attr = 'data-category="news"';
                      break;
                    } elseif ('recruit-info' === $category_slug || 'recruit' === $category_slug) {
                      // 採用の場合
                      $category_label = '採用';
                      $category_class = 'c-column-card__category c-column-card__category--recruit';
                      $category_data_attr = 'data-category="recruit"';
                      break;
                    } else {
                      // その他カテゴリー
                      $category_label = $related_cat->name;
                      $category_class = 'c-column-card__category';
                      $category_data_attr = 'data-category="' . esc_attr($category_slug) . '"';
                      break;
                    }
                  }
                }
                ?>
                <li class="p-news-post__card c-column-card">
                  <a href="<?php the_permalink(); ?>" class="c-column-card__item">
                    <div class="c-column-card__image">
                      <?php if (has_post_thumbnail()) : ?>
                        <!-- アイキャッチ画像がある場合 -->
                        <?php the_post_thumbnail('large', array('loading' => 'lazy', 'decoding' => 'async', 'alt' => get_the_title())); ?>
                      <?php else : ?>
                        <!-- アイキャッチ画像がない場合の代替画像 -->
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/news-column/news-column_01.webp'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="wp-post-image" loading="lazy" decoding="async">
                      <?php endif; ?>
                    </div>
                    <div class="c-column-card__body">
                      <?php if (! empty($category_label)) : ?>
                        <span class="<?php echo esc_attr($category_class); ?>" <?php echo $category_data_attr; ?>>
                          <?php echo esc_html($category_label); ?>
                        </span>
                      <?php endif; ?>
                      <time class="c-column-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                        <?php the_time('Y.m.d'); ?>
                      </time>
                    </div>
                    <p class="c-column-card__title">
                      <?php the_title(); ?>
                    </p>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </section>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- 採用情報 -->
  <?php get_template_part('template-parts/cta-recruit'); ?>

  <!-- お問い合わせ -->
  <?php get_template_part('template-parts/cta-contact'); ?>
</main>

<?php get_footer(); ?>
