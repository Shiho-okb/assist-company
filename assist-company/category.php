<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-news-header l-news-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <h1 class="c-page-header__title c-title ">
          <span class="c-title__en">News</span>
          <span class="c-title__ja">お知らせ</span>
        </h1>
      </div>
    </div>
  </div>

  <!-- パンくずリスト -->
  <div class="p-news-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <ol class="c-breadcrumb__list">
        <li class="c-breadcrumb__item">
          <a href="./index.html">
            TOP
          </a>
        </li>
        <li class="c-breadcrumb__item">
          お知らせ
        </li>
      </ol>
    </div>
  </div>

  <!-- お知らせ一覧 -->
  <div class="p-news">
    <div class="p-news__inner l-inner">
      <div class="p-news__wrapper">
        <!-- カテゴリーナビ -->
        <?php
        // カテゴリーを取得(投稿数が1件以上あるもののみ)
        $news_categories = get_categories(array(
          'hide_empty' => true, // 投稿数が0件のカテゴリーは除外
        ));

        // 投稿が存在するかどうかを確認
        $has_posts = ! empty(get_posts(array(
          'posts_per_page' => 1,
          'post_status'   => 'publish',
          'fields'        => 'ids',
        )));

        // 投稿が存在し、かつカテゴリーが存在しない場合、'news-info'カテゴリーを取得して配列に追加
        if ($has_posts && empty($news_categories)) {
          $news_info_category = get_category_by_slug('news-info');
          if ($news_info_category) {
            $news_categories = array($news_info_category);
          }
        }

        // 投稿が存在し、かつカテゴリーが存在する場合にナビゲーションを表示
        if ($has_posts && ! empty($news_categories)) :
          $current_cat_id = 0;
          if (is_category()) {
            $current_cat_id = get_queried_object_id();
          } elseif (get_query_var('cat')) {
            $current_cat_id = intval(get_query_var('cat'));
          }
        ?>
          <nav class="p-news__nav">
            <ul class="p-news__tabs c-tabs">
              <li<?php if (empty($current_cat_id)) : ?> class="is-active" <?php endif; ?>>
                <a href="<?php echo esc_url(home_url('/news')); ?>">すべて</a>
                </li>
                <?php foreach ($news_categories as $news_category) : ?>
                  <li<?php if (intval($current_cat_id) === intval($news_category->term_id)) : ?> class="is-active" <?php endif; ?>>
                    <a href="<?php echo esc_url(get_category_link($news_category->term_id)); ?>">
                      <?php echo esc_html($news_category->name); ?>
                    </a>
                    </li>
                  <?php endforeach; ?>
            </ul>
          </nav>
          <!-- 投稿が0件の場合はここまでのHTMLが出力されない -->
        <?php endif; ?>

        <!-- お知らせリスト -->
        <?php if (have_posts()) : ?>
          <ol class="p-news__cards">
            <?php while (have_posts()) : the_post(); ?>
              <?php
              // 投稿のカテゴリーを取得
              $post_categories = get_the_category();
              $category_label = '';
              $category_class = 'c-news-tag';
              $category_data_attr = '';

              // カテゴリースラッグに応じて設定
              if (! empty($post_categories)) {
                foreach ($post_categories as $post_category) {
                  $category_slug = $post_category->slug;

                  if ('uncategorized' === $category_slug) {
                    continue;
                  }

                  if ('news-info' === $category_slug) {
                    $category_label = 'News';
                    $category_class = 'c-news-card__category--news c-news-tag';
                    $category_data_attr = 'data-category="news"';
                  } elseif ('recruit-info' === $category_slug) {
                    $category_label = '採用';
                    $category_class = 'c-news-card__category--recruit c-news-tag';
                    $category_data_attr = 'data-category="recruit"';
                  } else {
                    // その他カテゴリー
                    $category_label = $post_category->name;
                    $category_class = 'c-news-tag';
                    $category_data_attr = '';
                  }

                  break;
                }
              }
              ?>
              <li class="p-news__card c-news-card">
                <a href="<?php the_permalink(); ?>" class="c-news-card__item">
                  <?php if (! empty($category_label)) : ?>
                    <span class="c-news-card__category <?php echo esc_attr($category_class); ?>" <?php echo esc_attr($category_data_attr); ?>>
                      <?php echo esc_html($category_label); ?>
                    </span>
                  <?php endif; ?>
                  <time class="c-news-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                  </time>
                  <p class="c-news-card__title">
                    <?php the_title(); ?>
                  </p>
                </a>
              </li>
            <?php endwhile; ?>
          </ol>
        <?php else : ?>
          <p class="p-news_nopost">現在投稿はありません</p>
        <?php endif; ?>
      </div>
      <!-- ページネーション -->
      <?php global $wp_query; ?>
      <?php if ($wp_query->max_num_pages > 1) : ?>
        <nav class="p-news__pagination">
          <div class="p-news__pagination-item c-pagination">
            <?php echo paginate_links(
              array(
                'total'     => $wp_query->max_num_pages, // 総ページ数を取得
                'current'   => max(1, get_query_var('paged')), // 現在のページ番号を取得
                'mid_size'  => 1, // 現在のページの前後に表示するページ番号の数
                'end_size'  => 1, // 最初と最後に表示するページ番号の数
                'prev_text' => '',
                'next_text' => '',
              )
            ); ?>
          </div>
        </nav>
      <?php endif; ?>
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
