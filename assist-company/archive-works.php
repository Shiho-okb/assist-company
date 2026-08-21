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
  <div class="p-works-breadcrumb c-breadcrumb">
    <div class="c-breadcrumb__inner l-inner">
      <div class="c-breadcrumb__list" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </div>
  </div>

  <!-- 施行事例一覧 -->
  <section class="p-works">
    <div class="p-works__inner l-inner">
      <div class="p-works__wrapper">
        <!-- カテゴリー -->
        <?php
        // 施工事例 (works) の公開投稿が存在するか確認
        $has_works_posts = ! empty(get_posts(array(
          'post_type'      => 'works',
          'posts_per_page' => 1,
          'post_status'   => 'publish',
          'fields'        => 'ids',
        )));

        // 投稿が1件以上ある場合のみナビゲーション全体を出力
        if ($has_works_posts) :
        ?>
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
                'taxonomy'   => 'case',
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
        <?php endif; ?>
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
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/coming-soon.png'); ?>" alt="<?php the_title_attribute(); ?>" width="317" height="195" loading="lazy" decoding="async">
                    <?php endif; ?>
                  </div>
                  <div class="c-works-card__body">
                    <h2 class="c-works-card__title"><?php the_title(); ?></h2>
                    <p class="c-works-card__text"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30, '...')); ?></p>
                    <div class="c-works-card__tags">
                      <!-- カテゴリー -->
                      <?php
                      $cases = get_the_terms(get_the_ID(), 'case');

                      if ($cases && ! is_wp_error($cases)) :
                        $case_names = wp_list_pluck($cases, 'name');
                        $case_slugs = wp_list_pluck($cases, 'slug');

                        // オフィスビルが含まれているか判定（名前：オフィスビル）
                        $is_office = in_array('オフィスビル', $case_names, true);
                        $tag_class = $is_office ? ' c-works-card__tag--office' : '';
                      ?>
                        <span class="c-works-card__tag c-works-card__tag--black<?php echo esc_attr($tag_class); ?>">
                          <?php echo esc_html(implode(' / ', $case_names)); ?>
                        </span>
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
    </div>
  </section>

  <!-- 採用情報 -->
  <?php get_template_part('template-parts/cta-recruit'); ?>

  <!-- お問い合わせ -->
  <?php get_template_part('template-parts/cta-contact'); ?>
</main>

<?php get_footer(); ?>
