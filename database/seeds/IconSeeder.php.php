<?php

use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->truncate();
        DB::table('icons')->insert([
            [ 'name' => 'fa-glass'],
            [ 'name' => 'fa-music'],
            [ 'name' => 'fa-search'],
            [ 'name' => 'fa-envelope-o'],
            [ 'name' => 'fa-heart'],
            [ 'name' => 'fa-star'],
            [ 'name' => 'fa-star-o'],
            [ 'name' => 'fa-user'],
            [ 'name' => 'fa-film'],
            [ 'name' => 'fa-th-large'],
            [ 'name' => 'fa-th'],
            [ 'name' => 'fa-th-list'],
            [ 'name' => 'fa-check'],
            [ 'name' => 'fa-remove'],
            [ 'name' => 'fa-close'],
            [ 'name' => 'fa-times'],
            [ 'name' => 'fa-search-plus'],
            [ 'name' => 'fa-search-minus'],
            [ 'name' => 'fa-power-off'],
            [ 'name' => 'fa-signal'],
            [ 'name' => 'fa-gear'],
            [ 'name' => 'fa-cog'],
            [ 'name' => 'fa-trash-o'],
            [ 'name' => 'fa-home'],
            [ 'name' => 'fa-file-o'],
            [ 'name' => 'fa-clock-o'],
            [ 'name' => 'fa-road'],
            [ 'name' => 'fa-download'],
            [ 'name' => 'fa-arrow-circle-o-do'],
            [ 'name' => 'fa-arrow-circle-o-up'],
            [ 'name' => 'fa-inbox'],
            [ 'name' => 'fa-play-circle-o'],
            [ 'name' => 'fa-rotate-right'],
            [ 'name' => 'fa-repeat'],
            [ 'name' => 'fa-refresh'],
            [ 'name' => 'fa-list-alt'],
            [ 'name' => 'fa-lock'],
            [ 'name' => 'fa-flag'],
            [ 'name' => 'fa-headphones'],
            [ 'name' => 'fa-volume-off'],
            [ 'name' => 'fa-volume-down'],
            [ 'name' => 'fa-volume-up'],
            [ 'name' => 'fa-qrcode'],
            [ 'name' => 'fa-barcode'],
            [ 'name' => 'fa-tag'],
            [ 'name' => 'fa-tags'],
            [ 'name' => 'fa-book'],
            [ 'name' => 'fa-bookmark'],
            [ 'name' => 'fa-print f'],
            [ 'name' => 'fa-camera'],
            [ 'name' => 'fa-font'],
            [ 'name' => 'fa-bold'],
            [ 'name' => 'fa-italic'],
            [ 'name' => 'fa-text-height'],
            [ 'name' => 'fa-text-width'],
            [ 'name' => 'fa-align-left'],
            [ 'name' => 'fa-align-center'],
            [ 'name' => 'fa-align-right'],
            [ 'name' => 'fa-align-justify'],
            [ 'name' => 'fa-list'],
            [ 'name' => 'fa-dedent'],
            [ 'name' => 'fa-outdent'],
            [ 'name' => 'fa-indent'],
            [ 'name' => 'fa-video-camera'],
            [ 'name' => 'fa-photo'],
            [ 'name' => 'fa-image'],
            [ 'name' => 'fa-picture-o'],
            [ 'name' => 'fa-pencil'],
            [ 'name' => 'fa-map-marker'],
            [ 'name' => 'fa-adjust'],
            [ 'name' => 'fa-tint'],
            [ 'name' => 'fa-edit'],
            [ 'name' => 'fa-pencil-square-o'],
            [ 'name' => 'fa-share-square-o'],
            [ 'name' => 'fa-check-square-o'],
            [ 'name' => 'fa-arrows'],
            [ 'name' => 'fa-step-backward'],
            [ 'name' => 'fa-fast-backward'],
            [ 'name' => 'fa-backward'],
            [ 'name' => 'fa-play'],
            [ 'name' => 'fa-pause'],
            [ 'name' => 'fa-stop'],
            [ 'name' => 'fa-forward'],
            [ 'name' => 'fa-fast-forward'],
            [ 'name' => 'fa-step-forward'],
            [ 'name' => 'fa-eject'],
            [ 'name' => 'fa-chevron-left'],
            [ 'name' => 'fa-chevron-right'],
            [ 'name' => 'fa-plus-circle'],
            [ 'name' => 'fa-minus-circle'],
            [ 'name' => 'fa-times-circle'],
            [ 'name' => 'fa-check-circle'],
            [ 'name' => 'fa-question-circle'],
            [ 'name' => 'fa-info-circle'],
            [ 'name' => 'fa-crosshairs'],
            [ 'name' => 'fa-times-circle-o'],
            [ 'name' => 'fa-check-circle-o'],
            [ 'name' => 'fa-ban'],
            [ 'name' => 'fa-arrow-left'],
            [ 'name' => 'fa-arrow-right'],
            [ 'name' => 'fa-arrow-up'],
            [ 'name' => 'fa-arrow-down'],
            [ 'name' => 'fa-mail-forward'],
            [ 'name' => 'fa-share'],
            [ 'name' => 'fa-expand'],
            [ 'name' => 'fa-compress'],
            [ 'name' => 'fa-plus'],
            [ 'name' => 'fa-minus'],
            [ 'name' => 'fa-asterisk'],
            [ 'name' => 'fa-exclamation-circl'],
            [ 'name' => 'fa-gift'],
            [ 'name' => 'fa-leaf'],
            [ 'name' => 'fa-fire'],
            [ 'name' => 'fa-eye'],
            [ 'name' => 'fa-eye-slash'],
            [ 'name' => 'fa-warning'],
            [ 'name' => 'fa-exclamation-trian'],
            [ 'name' => 'fa-plane'],
            [ 'name' => 'fa-calendar'],
            [ 'name' => 'fa-random'],
            [ 'name' => 'fa-comment'],
            [ 'name' => 'fa-magnet'],
            [ 'name' => 'fa-chevron-up'],
            [ 'name' => 'fa-chevron-down'],
            [ 'name' => 'fa-retweet'],
            [ 'name' => 'fa-shopping-cart'],
            [ 'name' => 'fa-folder'],
            [ 'name' => 'fa-folder-open'],
            [ 'name' => 'fa-arrows-v'],
            [ 'name' => 'fa-arrows-h'],
            [ 'name' => 'fa-bar-chart-o'],
            [ 'name' => 'fa-bar-chart'],
            [ 'name' => 'fa-twitter-square'],
            [ 'name' => 'fa-facebook-square'],
            [ 'name' => 'fa-camera-retro'],
            [ 'name' => 'fa-key'],
            [ 'name' => 'fa-gears'],
            [ 'name' => 'fa-cogs'],
            [ 'name' => 'fa-comments'],
            [ 'name' => 'fa-thumbs-o-up'],
            [ 'name' => 'fa-thumbs-o-down'],
            [ 'name' => 'fa-star-half'],
            [ 'name' => 'fa-heart-o'],
            [ 'name' => 'fa-sign-out'],
            [ 'name' => 'fa-linkedin-square'],
            [ 'name' => 'fa-thumb-tack'],
            [ 'name' => 'fa-external-link'],
            [ 'name' => 'fa-sign-in'],
            [ 'name' => 'fa-trophy'],
            [ 'name' => 'fa-github-square'],
            [ 'name' => 'fa-upload'],
            [ 'name' => 'fa-lemon-o'],
            [ 'name' => 'fa-phone'],
            [ 'name' => 'fa-square-o'],
            [ 'name' => 'fa-bookmark-o'],
            [ 'name' => 'fa-phone-square'],
            [ 'name' => 'fa-twitter'],
            [ 'name' => 'fa-facebook-f'],
            [ 'name' => 'fa-facebook'],
            [ 'name' => 'fa-github'],
            [ 'name' => 'fa-unlock'],
            [ 'name' => 'fa-credit-card'],
            [ 'name' => 'fa-rss'],
            [ 'name' => 'fa-hdd-o'],
            [ 'name' => 'fa-bullhorn'],
            [ 'name' => 'fa-bell'],
            [ 'name' => 'fa-certificate'],
            [ 'name' => 'fa-hand-o-right'],
            [ 'name' => 'fa-hand-o-left'],
            [ 'name' => 'fa-hand-o-up'],
            [ 'name' => 'fa-hand-o-down'],
            [ 'name' => 'fa-arrow-circle-left'],
            [ 'name' => 'fa-arrow-circle-righ'],
            [ 'name' => 'fa-arrow-circle-up'],
            [ 'name' => 'fa-arrow-circle-down'],
            [ 'name' => 'fa-globe'],
            [ 'name' => 'fa-wrench'],
            [ 'name' => 'fa-tasks'],
            [ 'name' => 'fa-filter'],
            [ 'name' => 'fa-briefcase'],
            [ 'name' => 'fa-arrows-alt'],
            [ 'name' => 'fa-group'],
            [ 'name' => 'fa-users'],
            [ 'name' => 'fa-chain'],
            [ 'name' => 'fa-link'],
            [ 'name' => 'fa-cloud'],
            [ 'name' => 'fa-flask'],
            [ 'name' => 'fa-cut'],
            [ 'name' => 'fa-scissors'],
            [ 'name' => 'fa-copy'],
            [ 'name' => 'fa-files-o'],
            [ 'name' => 'fa-paperclip'],
            [ 'name' => 'fa-save'],
            [ 'name' => 'fa-floppy-o'],
            [ 'name' => 'fa-square'],
            [ 'name' => 'fa-navicon'],
            [ 'name' => 'fa-reorder'],
            [ 'name' => 'fa-bars'],
            [ 'name' => 'fa-list-ul'],
            [ 'name' => 'fa-list-ol'],
            [ 'name' => 'fa-strikethrough'],
            [ 'name' => 'fa-underline'],
            [ 'name' => 'fa-table'],
            [ 'name' => 'fa-magic'],
            [ 'name' => 'fa-truck'],
            [ 'name' => 'fa-pinterest'],
            [ 'name' => 'fa-pinterest-square'],
            [ 'name' => 'fa-google-plus-squar'],
            [ 'name' => 'fa-google-plus'],
            [ 'name' => 'fa-money'],
            [ 'name' => 'fa-caret-down'],
            [ 'name' => 'fa-caret-up'],
            [ 'name' => 'fa-caret-left'],
            [ 'name' => 'fa-caret-right'],
            [ 'name' => 'fa-columns'],
            [ 'name' => 'fa-unsorted'],
            [ 'name' => 'fa-sort'],
            [ 'name' => 'fa-sort-down'],
            [ 'name' => 'fa-sort-desc'],
            [ 'name' => 'fa-sort-up'],
            [ 'name' => 'fa-sort-asc'],
            [ 'name' => 'fa-envelope'],
            [ 'name' => 'fa-linkedin'],
            [ 'name' => 'fa-rotate-left'],
            [ 'name' => 'fa-undo'],
            [ 'name' => 'fa-legal'],
            [ 'name' => 'fa-gavel'],
            [ 'name' => 'fa-dashboard'],
            [ 'name' => 'fa-tachometer'],
            [ 'name' => 'fa-comment-o'],
            [ 'name' => 'fa-comments-o'],
            [ 'name' => 'fa-flash'],
            [ 'name' => 'fa-bolt'],
            [ 'name' => 'fa-sitemap'],
            [ 'name' => 'fa-umbrella'],
            [ 'name' => 'fa-paste'],
            [ 'name' => 'fa-clipboard'],
            [ 'name' => 'fa-lightbulb-o'],
            [ 'name' => 'fa-exchange'],
            [ 'name' => 'fa-cloud-download'],
            [ 'name' => 'fa-cloud-upload'],
            [ 'name' => 'fa-user-md'],
            [ 'name' => 'fa-stethoscope'],
            [ 'name' => 'fa-suitcase'],
            [ 'name' => 'fa-bell-o'],
            [ 'name' => 'fa-coffee'],
            [ 'name' => 'fa-cutlery'],
            [ 'name' => 'fa-file-text-o'],
            [ 'name' => 'fa-building-o'],
            [ 'name' => 'fa-hospital-o'],
            [ 'name' => 'fa-ambulance'],
            [ 'name' => 'fa-medkit'],
            [ 'name' => 'fa-fighter-jet'],
            [ 'name' => 'fa-beer'],
            [ 'name' => 'fa-h-square'],
            [ 'name' => 'fa-plus-square'],
            [ 'name' => 'fa-angle-double-left'],
            [ 'name' => 'fa-angle-double-righ'],
            [ 'name' => 'fa-angle-double-up'],
            [ 'name' => 'fa-angle-double-down'],
            [ 'name' => 'fa-angle-left'],
            [ 'name' => 'fa-angle-right'],
            [ 'name' => 'fa-angle-up'],
            [ 'name' => 'fa-angle-down'],
            [ 'name' => 'fa-desktop'],
            [ 'name' => 'fa-laptop'],
            [ 'name' => 'fa-tablet'],
            [ 'name' => 'fa-mobile-phone'],
            [ 'name' => 'fa-mobile'],
            [ 'name' => 'fa-circle-o'],
            [ 'name' => 'fa-quote-left'],
            [ 'name' => 'fa-quote-right'],
            [ 'name' => 'fa-spinner'],
            [ 'name' => 'fa-circle'],
            [ 'name' => 'fa-mail-reply'],
            [ 'name' => 'fa-reply'],
            [ 'name' => 'fa-github-alt'],
            [ 'name' => 'fa-folder-o'],
            [ 'name' => 'fa-folder-open-o'],
            [ 'name' => 'fa-smile-o'],
            [ 'name' => 'fa-frown-o'],
            [ 'name' => 'fa-meh-o'],
            [ 'name' => 'fa-gamepad'],
            [ 'name' => 'fa-keyboard-o'],
            [ 'name' => 'fa-flag-o'],
            [ 'name' => 'fa-flag-checkered'],
            [ 'name' => 'fa-terminal'],
            [ 'name' => 'fa-code'],
            [ 'name' => 'fa-mail-reply-all'],
            [ 'name' => 'fa-reply-all'],
            [ 'name' => 'fa-star-half-empty'],
            [ 'name' => 'fa-star-half-full'],
            [ 'name' => 'fa-star-half-o'],
            [ 'name' => 'fa-location-arrow'],
            [ 'name' => 'fa-crop'],
            [ 'name' => 'fa-code-fork'],
            [ 'name' => 'fa-unlink'],
            [ 'name' => 'fa-chain-broken'],
            [ 'name' => 'fa-question'],
            [ 'name' => 'fa-info'],
            [ 'name' => 'fa-exclamation'],
            [ 'name' => 'fa-superscript'],
            [ 'name' => 'fa-subscript'],
            [ 'name' => 'fa-eraser'],
            [ 'name' => 'fa-puzzle-piece'],
            [ 'name' => 'fa-microphone'],
            [ 'name' => 'fa-microphone-slash'],
            [ 'name' => 'fa-shield'],
            [ 'name' => 'fa-calendar-o'],
            [ 'name' => 'fa-fire-extinguisher'],
            [ 'name' => 'fa-rocket'],
            [ 'name' => 'fa-maxcdn'],
            [ 'name' => 'fa-chevron-circle-le'],
            [ 'name' => 'fa-chevron-circle-ri'],
            [ 'name' => 'fa-chevron-circle-up'],
            [ 'name' => 'fa-chevron-circle-do'],
            [ 'name' => 'fa-html'],
            [ 'name' => 'fa-css'],
            [ 'name' => 'fa-anchor'],
            [ 'name' => 'fa-unlock-alt'],
            [ 'name' => 'fa-bullseye'],
            [ 'name' => 'fa-ellipsis-h'],
            [ 'name' => 'fa-ellipsis-v'],
            [ 'name' => 'fa-rss-square'],
            [ 'name' => 'fa-play-circle'],
            [ 'name' => 'fa-ticket'],
            [ 'name' => 'fa-minus-square'],
            [ 'name' => 'fa-minus-square-o'],
            [ 'name' => 'fa-level-up'],
            [ 'name' => 'fa-level-down'],
            [ 'name' => 'fa-check-square'],
            [ 'name' => 'fa-pencil-square'],
            [ 'name' => 'fa-external-link-squ'],
            [ 'name' => 'fa-share-square'],
            [ 'name' => 'fa-compass'],
            [ 'name' => 'fa-toggle-down'],
            [ 'name' => 'fa-caret-square-o-do'],
            [ 'name' => 'fa-toggle-up'],
            [ 'name' => 'fa-caret-square-o-up'],
            [ 'name' => 'fa-toggle-right'],
            [ 'name' => 'fa-caret-square-o-ri'],
            [ 'name' => 'fa-euro'],
            [ 'name' => 'fa-eur'],
            [ 'name' => 'fa-gbp'],
            [ 'name' => 'fa-dollar'],
            [ 'name' => 'fa-usd'],
            [ 'name' => 'fa-rupee'],
            [ 'name' => 'fa-inr'],
            [ 'name' => 'fa-cny'],
            [ 'name' => 'fa-rmb'],
            [ 'name' => 'fa-yen'],
            [ 'name' => 'fa-jpy'],
            [ 'name' => 'fa-ruble'],
            [ 'name' => 'fa-rouble'],
            [ 'name' => 'fa-rub'],
            [ 'name' => 'fa-won'],
            [ 'name' => 'fa-krw'],
            [ 'name' => 'fa-bitcoin'],
            [ 'name' => 'fa-btc'],
            [ 'name' => 'fa-file'],
            [ 'name' => 'fa-file-text'],
            [ 'name' => 'fa-sort-alpha-asc'],
            [ 'name' => 'fa-sort-alpha-desc'],
            [ 'name' => 'fa-sort-amount-asc'],
            [ 'name' => 'fa-sort-amount-desc'],
            [ 'name' => 'fa-sort-numeric-asc'],
            [ 'name' => 'fa-sort-numeric-desc'],
            [ 'name' => 'fa-thumbs-up'],
            [ 'name' => 'fa-thumbs-down'],
            [ 'name' => 'fa-youtube-square'],
            [ 'name' => 'fa-youtube'],
            [ 'name' => 'fa-xing'],
            [ 'name' => 'fa-xing-square'],
            [ 'name' => 'fa-youtube-play'],
            [ 'name' => 'fa-dropbox'],
            [ 'name' => 'fa-stack-overflow'],
            [ 'name' => 'fa-instagram'],
            [ 'name' => 'fa-flickr'],
            [ 'name' => 'fa-adn'],
            [ 'name' => 'fa-bitbucket'],
            [ 'name' => 'fa-bitbucket-square'],
            [ 'name' => 'fa-tumblr'],
            [ 'name' => 'fa-tumblr-square'],
            [ 'name' => 'fa-long-arrow-down'],
            [ 'name' => 'fa-long-arrow-up'],
            [ 'name' => 'fa-long-arrow-left'],
            [ 'name' => 'fa-long-arrow-right'],
            [ 'name' => 'fa-apple'],
            [ 'name' => 'fa-windows'],
            [ 'name' => 'fa-android'],
            [ 'name' => 'fa-linux'],
            [ 'name' => 'fa-dribbble'],
            [ 'name' => 'fa-skype'],
            [ 'name' => 'fa-foursquare'],
            [ 'name' => 'fa-trello'],
            [ 'name' => 'fa-female'],
            [ 'name' => 'fa-male'],
            [ 'name' => 'fa-gittip'],
            [ 'name' => 'fa-gratipay'],
            [ 'name' => 'fa-sun-o'],
            [ 'name' => 'fa-moon-o'],
            [ 'name' => 'fa-archive'],
            [ 'name' => 'fa-bug'],
            [ 'name' => 'fa-vk'],
            [ 'name' => 'fa-weibo'],
            [ 'name' => 'fa-renren'],
            [ 'name' => 'fa-pagelines'],
            [ 'name' => 'fa-stack-exchange'],
            [ 'name' => 'fa-arrow-circle-o-ri'],
            [ 'name' => 'fa-arrow-circle-o-le'],
            [ 'name' => 'fa-toggle-left'],
            [ 'name' => 'fa-caret-square-o-le'],
            [ 'name' => 'fa-dot-circle-o'],
            [ 'name' => 'fa-wheelchair'],
            [ 'name' => 'fa-vimeo-square'],
            [ 'name' => 'fa-turkish-lira'],
            [ 'name' => 'fa-try'],
            [ 'name' => 'fa-plus-square-o'],
            [ 'name' => 'fa-space-shuttle'],
            [ 'name' => 'fa-slack'],
            [ 'name' => 'fa-envelope-square'],
            [ 'name' => 'fa-wordpress'],
            [ 'name' => 'fa-openid'],
            [ 'name' => 'fa-institution'],
            [ 'name' => 'fa-bank'],
            [ 'name' => 'fa-university'],
            [ 'name' => 'fa-mortar-board'],
            [ 'name' => 'fa-graduation-cap'],
            [ 'name' => 'fa-yahoo'],
            [ 'name' => 'fa-google'],
            [ 'name' => 'fa-reddit'],
            [ 'name' => 'fa-reddit-square'],
            [ 'name' => 'fa-stumbleupon-circl'],
            [ 'name' => 'fa-stumbleupon'],
            [ 'name' => 'fa-delicious'],
            [ 'name' => 'fa-digg'],
            [ 'name' => 'fa-pied-piper'],
            [ 'name' => 'fa-pied-piper-alt'],
            [ 'name' => 'fa-drupal'],
            [ 'name' => 'fa-joomla'],
            [ 'name' => 'fa-language'],
            [ 'name' => 'fa-fax'],
            [ 'name' => 'fa-building'],
            [ 'name' => 'fa-child'],
            [ 'name' => 'fa-paw'],
            [ 'name' => 'fa-spoon'],
            [ 'name' => 'fa-cube'],
            [ 'name' => 'fa-cubes'],
            [ 'name' => 'fa-behance'],
            [ 'name' => 'fa-behance-square'],
            [ 'name' => 'fa-steam'],
            [ 'name' => 'fa-steam-square'],
            [ 'name' => 'fa-recycle'],
            [ 'name' => 'fa-automobile'],
            [ 'name' => 'fa-car'],
            [ 'name' => 'fa-cab'],
            [ 'name' => 'fa-taxi'],
            [ 'name' => 'fa-tree'],
            [ 'name' => 'fa-spotify'],
            [ 'name' => 'fa-deviantart'],
            [ 'name' => 'fa-soundcloud'],
            [ 'name' => 'fa-database'],
            [ 'name' => 'fa-file-pdf-o'],
            [ 'name' => 'fa-file-word-o'],
            [ 'name' => 'fa-file-excel-o'],
            [ 'name' => 'fa-file-powerpoint-o'],
            [ 'name' => 'fa-file-photo-o'],
            [ 'name' => 'fa-file-picture-o'],
            [ 'name' => 'fa-file-image-o'],
            [ 'name' => 'fa-file-zip-o'],
            [ 'name' => 'fa-file-archive-o'],
            [ 'name' => 'fa-file-sound-o'],
            [ 'name' => 'fa-file-audio-o'],
            [ 'name' => 'fa-file-movie-o'],
            [ 'name' => 'fa-file-video-o'],
            [ 'name' => 'fa-file-code-o'],
            [ 'name' => 'fa-vine'],
            [ 'name' => 'fa-codepen'],
            [ 'name' => 'fa-jsfiddle'],
            [ 'name' => 'fa-life-bouy'],
            [ 'name' => 'fa-life-buoy'],
            [ 'name' => 'fa-life-saver'],
            [ 'name' => 'fa-support'],
            [ 'name' => 'fa-life-ring'],
            [ 'name' => 'fa-circle-o-notch'],
            [ 'name' => 'fa-ra'],
            [ 'name' => 'fa-rebel'],
            [ 'name' => 'fa-ge'],
            [ 'name' => 'fa-empire'],
            [ 'name' => 'fa-git-square'],
            [ 'name' => 'fa-git'],
            [ 'name' => 'fa-hacker-news'],
            [ 'name' => 'fa-tencent-weibo'],
            [ 'name' => 'fa-qq'],
            [ 'name' => 'fa-wechat'],
            [ 'name' => 'fa-weixin'],
            [ 'name' => 'fa-send'],
            [ 'name' => 'fa-paper-plane'],
            [ 'name' => 'fa-send-o'],
            [ 'name' => 'fa-paper-plane-o'],
            [ 'name' => 'fa-history'],
            [ 'name' => 'fa-genderless'],
            [ 'name' => 'fa-circle-thin'],
            [ 'name' => 'fa-header'],
            [ 'name' => 'fa-paragraph'],
            [ 'name' => 'fa-sliders'],
            [ 'name' => 'fa-share-alt'],
            [ 'name' => 'fa-share-alt-square'],
            [ 'name' => 'fa-bomb'],
            [ 'name' => 'fa-soccer-ball-o'],
            [ 'name' => 'fa-futbol-o'],
            [ 'name' => 'fa-tty'],
            [ 'name' => 'fa-binoculars'],
            [ 'name' => 'fa-plug'],
            [ 'name' => 'fa-slideshare'],
            [ 'name' => 'fa-twitch'],
            [ 'name' => 'fa-yelp'],
            [ 'name' => 'fa-newspaper-o'],
            [ 'name' => 'fa-wifi'],
            [ 'name' => 'fa-calculator'],
            [ 'name' => 'fa-paypal'],
            [ 'name' => 'fa-google-wallet'],
            [ 'name' => 'fa-cc-visa'],
            [ 'name' => 'fa-cc-mastercard'],
            [ 'name' => 'fa-cc-discover'],
            [ 'name' => 'fa-cc-amex'],
            [ 'name' => 'fa-cc-paypal'],
            [ 'name' => 'fa-cc-stripe'],
            [ 'name' => 'fa-bell-slash'],
            [ 'name' => 'fa-bell-slash-o'],
            [ 'name' => 'fa-trash'],
            [ 'name' => 'fa-copyright'],
            [ 'name' => 'fa-at'],
            [ 'name' => 'fa-eyedropper'],
            [ 'name' => 'fa-paint-brush'],
            [ 'name' => 'fa-birthday-cake'],
            [ 'name' => 'fa-area-chart'],
            [ 'name' => 'fa-pie-chart'],
            [ 'name' => 'fa-line-chart'],
            [ 'name' => 'fa-lastfm'],
            [ 'name' => 'fa-lastfm-square'],
            [ 'name' => 'fa-toggle-off'],
            [ 'name' => 'fa-toggle-on'],
            [ 'name' => 'fa-bicycle'],
            [ 'name' => 'fa-bus'],
            [ 'name' => 'fa-ioxhost'],
            [ 'name' => 'fa-angellist'],
            [ 'name' => 'fa-cc za'],
            [ 'name' => 'fa-shekel'],
            [ 'name' => 'fa-sheqel'],
            [ 'name' => 'fa-ils'],
            [ 'name' => 'fa-meanpath'],
            [ 'name' => 'fa-buysellads'],
            [ 'name' => 'fa-connectdevelop'],
            [ 'name' => 'fa-dashcube'],
            [ 'name' => 'fa-forumbee'],
            [ 'name' => 'fa-leanpub'],
            [ 'name' => 'fa-sellsy'],
            [ 'name' => 'fa-shirtsinbulk'],
            [ 'name' => 'fa-simplybuilt'],
            [ 'name' => 'fa-skyatlas'],
            [ 'name' => 'fa-cart-plus'],
            [ 'name' => 'fa-cart-arrow-down'],
            [ 'name' => 'fa-diamond'],
            [ 'name' => 'fa-ship'],
            [ 'name' => 'fa-user-secret'],
            [ 'name' => 'fa-motorcycle'],
            [ 'name' => 'fa-street-view'],
            [ 'name' => 'fa-heartbeat'],
            [ 'name' => 'fa-venus'],
            [ 'name' => 'fa-mars'],
            [ 'name' => 'fa-mercury'],
            [ 'name' => 'fa-transgender'],
            [ 'name' => 'fa-transgender-alt'],
            [ 'name' => 'fa-venus-double'],
            [ 'name' => 'fa-mars-double'],
            [ 'name' => 'fa-venus-mars'],
            [ 'name' => 'fa-mars-stroke'],
            [ 'name' => 'fa-mars-stroke-v'],
            [ 'name' => 'fa-mars-stroke-h'],
            [ 'name' => 'fa-neuter'],
            [ 'name' => 'fa-facebook-official'],
            [ 'name' => 'fa-pinterest-p'],
            [ 'name' => 'fa-whatsapp'],
            [ 'name' => 'fa-server'],
            [ 'name' => 'fa-user-plus'],
            [ 'name' => 'fa-user-times'],
            [ 'name' => 'fa-hotel'],
            [ 'name' => 'fa-bed'],
            [ 'name' => 'fa-viacoin'],
            [ 'name' => 'fa-train'],
            [ 'name' => 'fa-subway'],
            [ 'name' => 'fa-medium'],
        ]);
    }
}
