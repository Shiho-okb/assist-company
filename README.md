# gulp-dev_WordPress_flocss_PCtoSP

## 動作が確認できている環境
- Nodeバージョン v18.20.5
- Gulp 4系

## 使い方
- gulp-dev_WordPress_FLOCSS_PCtoSPフォルダの中身を、WordPress環境のapp/public/wp-content/themes直下に配置する
- themesフォルダをエディターで開く
- WordPressThemeフォルダを任意のフォルダ名に変更する
- gulpfile.jsの5行目のWordPressThemeの部分を上の手順で変更したフォルダ名に変更する
- gulpfile.jsの25行目にLocalのURLを記載する
- themesフォルダ直下のstyle.cssの中身を変更する
- ターミナルを開き、「 cd gulp 」とコマンドを入力する
- ターミナルを開き、「 npm i 」とコマンドを入力する
- gulpフォルダ直下に、node_modulesとpackage-lock.jsonが生成されるのを確認する
- 「 npx gulp 」とコマンドを入力するとgulpが動き出す

## 作業ディレクトリ
- sass・jsの記述はsrcフォルダの中で行う/assetsフォルダは触らない
- 画像はsrcフォルダのimagesの中に格納する
- コンパイルされたCSS・jsと圧縮された画像はテーマフォルダ/assetsフォルダの中に出力される
- phpはテーマフォルダ直下のphpファイルに直接記述する

## 圧縮（本番環境などに）
- 「 npm run build 」で本番用(min化)を1回だけ実行します（watchなし）。
- 開発時は「 npx gulp 」を使うと非minのまま自動コンパイル&watchします。
-ビルド後もfunctions.phpの書き換えは不要です

## 注意事項
- min済みライブラリ（例: swiper-bundle.min.js / .css）は再min化しない設定です。
- 二重minを避けるため、開発中は「 npx gulp 」、本番前だけ「 npm run build 」を実行してください。
- 「 npm run build 」はタスク完了後に終了し、変更監視は行いません。

## 備考
- CSS設計はFLOCSS( https://github.com/hiloki/flocss )を採用
- PCファースト
- rem記述を前提
