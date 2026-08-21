<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="p-header l-header">
    <?php if (is_front_page()) : ?>
      <h1>
        <a href="#" class="p-header__logo">CODO ASSIST</a>
      </h1>
    <?php else : ?>
      <div>
        <a href="#" class="p-header__logo">CODO ASSIST</a>
      </div>
    <?php endif; ?>
    <button class="p-header__hamburger js-hamburger" aria-label="ハンバーガーボタン">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="p-header__nav js-drawer">
      <ul class="p-header__nav-list">
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__nav-link <?php if (is_front_page() && !is_home()) echo 'p-header__nav-link--active'; ?>">ホーム</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/news/')); ?>" class="p-header__nav-link <?php if ((is_home() || is_singular('post') || is_category() || is_tag() || is_tax()) && get_post_type() !== 'works' && !is_post_type_archive('works')) echo 'p-header__nav-link--active'; ?>">お知らせ</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/works/')); ?>" class="p-header__nav-link <?php if (is_post_type_archive('works') || is_singular('works') || (is_tax() && get_post_type() === 'works')) echo 'p-header__nav-link--active'; ?>">施工事例</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/company/')); ?>" class="p-header__nav-link <?php if (is_page('company')) echo 'p-header__nav-link--active'; ?>">我々について</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="p-header__nav-link <?php if (is_page('recruit')) echo 'p-header__nav-link--active'; ?>">採用情報</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="p-header__nav-link <?php if (is_page('contact')) echo 'p-header__nav-link--active'; ?>">お問い合わせ</a>
        </li>
      </ul>
    </nav>
  </header>
