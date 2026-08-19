<?php get_header(); ?>

<main>
  <!-- ページヘッダー -->
  <div class="p-works-header l-works-header c-page-header">
    <div class="c-page-header__inner l-inner">
      <div class="c-page-header__wrapper">
        <h1 class="c-page-header__title c-title ">
          <span class="c-title__en">Works</span>
          <span class="c-title__ja">施工事例</span>
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
          施工事例
        </li>
      </ol>
    </div>
  </div>

  <!-- 施行事例一覧 -->
  <section class="p-works">
    <div class="p-works__inner l-inner">
      <div class="p-works__wrapper">
        <!-- カテゴリー -->
        <nav class="p-works__nav">
          <ul class="p-works__tabs c-tabs">
            <?php
            // 『すべて』タブ（投稿タイプのアーカイブへのリンク）
            $all_link = esc_url(home_url('/works/'));
            $all_active = ! is_tax('case') ? 'is-active' : '';
            ?>
            <li class="<?php echo $all_active; ?>"><a href="<?php echo $all_link; ?>">すべて</a></li>
            <?php
            // タクソノミー 'case' のタームを取得（投稿が1件以上あるもののみ）
            $terms = get_terms(array(
              'taxonomy' => 'case',
              'hide_empty' => true,
            ));
            $current_term = is_tax('case') ? get_queried_object() : null;
            if (! is_wp_error($terms) && ! empty($terms)) :
              foreach ($terms as $term) :
                $term_link = esc_url(get_term_link($term));
                $active = ($current_term && $current_term->term_id === $term->term_id) ? 'is-active' : '';
            ?>
                <li class="<?php echo $active; ?>"><a href="<?php echo $term_link; ?>"><?php echo esc_html($term->name); ?></a></li>
            <?php
              endforeach;
            endif;
            ?>
          </ul>
        </nav>
        <!-- 施行事例リスト -->
        <?php if (have_posts()) : ?>
          <ol class="p-works__cards">
            <?php while (have_posts()) : the_post(); ?>
              <li class="p-works__card c-works-card">
                <a href="<?php the_permalink(); ?>" class="c-works-card__item">
                  <div class="c-works-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('large', array('loading' => 'lazy', 'decoding' => 'async')); ?>
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/works-post/works-post_01.webp'); ?>" alt="<?php the_title_attribute(); ?>" width="317" height="195" loading="lazy" decoding="async">
                    <?php endif; ?>
                  </div>
                  <div class="c-works-card__body">
                    <h2 class="c-works-card__title"><?php the_title(); ?></h2>
                    <p class="c-works-card__text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30, '...')); ?></p>
                    <div class="c-works-card__tags">
                      <?php
                      $cases = get_the_terms(get_the_ID(), 'case');
                      if ($cases && ! is_wp_error($cases)) :
                        $case_names = wp_list_pluck($cases, 'name');
                      ?>
                        <span class="c-works-card__tag c-works-card__tag--black"><?php echo esc_html(implode(' / ', $case_names)); ?></span>
                      <?php endif; ?>
                      <!-- 竣工年月 -->
                      <?php
                      $year = get_field('completion_year');
                      if ($year) :
                        echo '<span class="c-works-card__tag c-works-card__tag--white">' . esc_html($year) . '年</span>';
                      endif;
                      ?>
                    </div>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
          </ol>
          <!-- ページネーション -->
          <?php global $wp_query; ?>
          <?php if ($wp_query->max_num_pages > 1) : ?>
            <nav class="p-works__pagination">
              <div class="p-works__pagination-item c-pagination">
                <?php
                echo paginate_links(array(
                  'total'     => $wp_query->max_num_pages,
                  'current'   => max(1, get_query_var('paged')),
                  'mid_size'  => 1,
                  'end_size'  => 1,
                  'prev_text' => '',
                  'next_text' => '',
                ));
                ?>
              </div>
            </nav>
          <?php endif; ?>
        <?php else : ?>
          <p>現在記事はありません</p>
        <?php endif; ?>
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
