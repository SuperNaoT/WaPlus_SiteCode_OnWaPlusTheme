<?php

  if ( ! is_admin() ) {
    
    // 
    // *******************************************************
    // *******************************************************
    // ★ 【独自スタイルシート】の取込み
    // *******************************************************
    // *******************************************************
    function add_myStyleSheet() {

      global $DEF_catName_news;
      global $DEF_catName_blog;
      global $DEF_catName_tech;
      global $DEF_catName_howTo;

      // echo "<br><br><br><br>　【myStyleSheet.php】　\$DEF_catName_news[ " . $DEF_catName_news . " ]<br>";
      // echo "　【myStyleSheet.php】　\$DEF_catName_blog[ " . $DEF_catName_blog . " ]<br>";

      // 読み込むファイルのバージョン（省略可）.
      $ver = '';
      // 'all'、'screen'、'handheld'、'print' など 対象とするメディア.
      $media = 'all';
      
      // 
      // 「投稿ページ（single）」
      // 「投稿ページ（archive）」
      // } else if ( is_archive() )  {
      if ( is_single() || is_archive() || is_search() )  {

        // // echo "　Ⅰ<br>";

        // // 
        // // ハンドル名（識別要の文字列）
        // // ■ カテゴリーページ・投稿ページ、共通ページネーション書式
        // // ■ 投稿ページ、書式
        // $handle = 'archiveUtil_css';
        // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
        // $deps = array();
        // // 追加したいCSSのURL.
        // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/common-style/archive/style.min.css';
        // // CSSファイル取込実行
        // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // // 
        // // サイドバー追加にて変更になった部分
        // if ( is_single() )  {
 
        //   // 
        //   // ハンドル名（識別要の文字列）
        //   // ■ 個別ページ表示時、WORDPRESS投稿編集にて指定した書式
        //   $handle = 'forWordPressEditor_css';
        //   // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
        //   // $deps = array( 'forSingle_css' );
        //   $deps = array( 'archiveUtil_css' );
        //   // 追加したいCSSのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/common-style/archive/forWordPressEditor.min.css';
        //   // CSSファイル取込実行
        //   wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // } else  {

        //   // カテゴリ【NEWS】表示用設定
        //   // if ( is_category( $DEF_catName_news ) )  {
        //   if ( is_category( $DEF_catName_news  ) ||
        //        is_category( $DEF_catName_blog  ) ||
        //        is_category( $DEF_catName_tech  ) ||
        //        is_category( $DEF_catName_howTo )    )  {
        //     // echo "<br><br><br>　【myStyleSheet.php】 category STYLE SETTING!<br>";

        //     // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
        //     $handle = 'category_css';
        //     // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
        //     $deps = array( 'archiveUtil_css' );
        //     // 追加したいCSSのURL.
        //     $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/07_08_category/style.min.css';
        //     // CSSファイル取込実行
        //     wp_enqueue_style( $handle, $src, $deps, $ver, $media );
        //   } else if ( is_archive() || is_search() )  {

        //     // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
        //     $handle = 'archive_css';
        //     // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
        //     $deps = array( 'archiveUtil_css' );
        //     // 追加したいCSSのURL.
        //     $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/07_08_category/style.min.css';
        //     // CSSファイル取込実行
        //     wp_enqueue_style( $handle, $src, $deps, $ver, $media );
          
        //   }
        // }

      // 
      // 「メインページ（front-page.php）から固定ページ関連」
      } else  {

        // echo "　Ⅱ<br>";

        // 
        // ■ 和Plus・トップページ関連
        // **************************************************
        if ( is_home() )  {
  
          // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          $handle = 'topPage_css';
          // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          $deps = array( 'hbgMenu_css' );
          // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/00_index/style.min.css';
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/00_index/style.css';
          $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/index/style.min.css';
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/index/style.css';
          // CSSファイル取込実行
          wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // ページ「slug」にて判断！
        // 
        // **************************************************
        // ■ 和Plus・活動理念ページ関連
        // **************************************************
        } else if ( is_404() )  {
          
          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = '404Page_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/404/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // ページ「slug」にて判断！
        // 
        // **************************************************
        // ■ 和Plus・活動理念ページ関連
        // **************************************************
        } else if ( is_page( '01_philo' ) )  {
        
          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'philoPage_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/01_philo/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・経営支援ページ関連
        // **************************************************
        } else if ( is_page( '02_mngsup' ) )  {
        
          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'mngSupPage_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/02_mngSup/style.min.css';

          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・IT WEB ソリューション／IT WEB エンジニア略歴ページ関連
        // **************************************************
        } else if ( is_page( '03_itwebs' ) || is_page( '03_itwebe' ) )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'itWebSol_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/03_itWebS/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・オリジナル商品販売ページ関連
        // **************************************************
        } else if ( is_page( '04_orgods' ) )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'orgGoodsSale_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/04_orGods/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・オリジナル商品「いーねっか」販売ページ関連
        // **************************************************
        } else if ( is_page( '05_inekka' ) || is_page( '05_inekkaec') )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'orGdsInekkaAC_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/05_iNekka/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・オリジナル商品「Aphrodite Cestus」販売ページ関連
        // **************************************************
        } else if ( is_page( '06_acestus' ) )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'orGdsInekkaAC_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/06_ACestus/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・新着情報一覧ページ関連
        // **************************************************
        } else if ( is_page( '07_news' ) )  {

          // echo "<br><br><br>　【myStyleSheet.php】 07_news & category( news ) STYLE SETTING!<br>";

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'newsCategory_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/07_news/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・過去投稿ブログ記事一覧ページ関連
        // **************************************************
        } else if ( is_page( '08_blog' ) )  {

          // echo "<br><br><br>　【myStyleSheet.php】 08_blog & category( blog ) STYLE SETTING!<br>";

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'blogCategory_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/08_blog/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・会社概要ページ関連
        // **************************************************
        } else if ( is_page( '09_comprof' ) )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'comProfile_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/09_comProf/style.min.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・個人情報保護指針ページ関連
        // **************************************************
        } else if ( is_page( '10_ppolicy' ) )  {

          // // echo " !!!!! 個人情報保護指針ページ：CSSファイル読込み<br>";

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'privacyPolicy_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいCSSのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/10_pPolicy/style.min.css';

          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        // 
        // **************************************************
        // ■ 和Plus・お問い合わせフォームページ関連
        // **************************************************
        } else if ( is_page( '11_contactf' ) )  {

          // // echo " !!!!! お問い合わせフォーム：CSSファイル読込み<br>";

          // // ハンドル名（識別要の文字列）
          // $handle = 'contactf_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array( 'hbgMenu_css' );
          // // 追加したいjQueryのURL.
          // $src = get_template_directory_uri().'/customerSiteConfiguration/assets/scss/contents/11_contactF/style.min.css';

          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );






        }


        // 
        // **************************************************
        // ■ 和Plus・オリジナル商品販売「いーねっか・ACestus」ページ
        //   ☛ Gallery 関連コード
        // **************************************************
        if ( is_page( '05_inekka' ) || is_page( '06_acestus' ) )  {

          // // ハンドル名（識別要の文字列）.トップページ表示、個別定義用
          // $handle = 'lightBox_css';
          // // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
          // $deps = array();
          // // 追加したいCSSのURL.
          // $src = '//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css';
          // // CSSファイル取込実行
          // wp_enqueue_style( $handle, $src, $deps, $ver, $media );

        }
      }
    }

    // enqueue：「ＦＩＦＯスタック」に積み込む事
    // dequeue：「ＦＩＦＯスタック」から取り出す事（古い物から取り出す）
    add_action( 'wp_enqueue_scripts', 'add_myStyleSheet' );

  }

?>