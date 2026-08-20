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
    <?php if ( is_front_page() ) : ?>
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
          <a href="#" class="p-header__nav-link p-header__nav-link--active">ホーム</a>
        </li>
        <li class="p-header__nav-item">
          <a href="./news/" class="p-header__nav-link">お知らせ</a>
        </li>
        <li class="p-header__nav-item">
          <a href="./works/" class="p-header__nav-link">施工事例</a>
        </li>
        <li class="p-header__nav-item">
          <a href="./company/" class="p-header__nav-link">我々について</a>
        </li>
        <li class="p-header__nav-item">
          <a href="./recruit/" class="p-header__nav-link">採用情報</a>
        </li>
        <li class="p-header__nav-item">
          <a href="./contact/" class="p-header__nav-link">お問い合わせ</a>
        </li>
      </ul>
    </nav>
  </header>
