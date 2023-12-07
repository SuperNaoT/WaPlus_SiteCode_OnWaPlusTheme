<?php

if ( ! is_admin() ) {

    // 
    // *******************************************************
    // *******************************************************
    // ★ 【JavaScriptファイル】の取込み
    // *******************************************************
    // *******************************************************
    function init_myJavaScript() {
      
      global $DEF_catName_news;
      global $DEF_catName_blog;
      global $DEF_catName_tech;
      global $DEF_catName_howTo;

      // echo "<br><br><br><br>　\$DEF_catName_news[ " . $DEF_catName_news . " ]<br>";
      // echo "　\$DEF_catName_blog[ " . $DEF_catName_blog . " ]<br>";

      // WordPressに含まれているjquery.jsを読み込まない
      wp_deregister_script('jquery');

      // パララックス効果用Scriptの読み込み
      // ハンドル名（識別要の文字列）.
      $handle = 'pallax_js';
      // 追加したい「rellax効果ライブラリ」のURL.
      $src = '//cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js';
      // 特定のスクリプトの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
      $deps = array();
      // 読み込むファイルのバージョン（省略可）.
      $ver = '';
      // JavaScriptファイルの取込み実行
      wp_enqueue_script( $handle, $src, $deps, $ver );

      // GreenSock用Scriptの読み込み
      // ハンドル名（識別要の文字列）.
      $handle = 'gsap_js';
      // 追加したい「GSAP効果ライブラリ」のURL.
      $src = "//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js";
      // Scriptの取込み実行
      wp_enqueue_script( $handle, $src, $deps, $ver );

      // GreenSock用Scriptの読み込み
      // ハンドル名（識別要の文字列）.
      $handle = 'scrollTrigger_js';
      // 追加したい「GSAP/ScrollTrigger効果ライブラリ」のURL.
      $src = "//cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js";
      // Scriptの取込み実行
      wp_enqueue_script( $handle, $src, $deps, $ver );

      // fontawesomeアイコン表示用Scriptの読み込み
      // ハンドル名（識別要の文字列）.
      $handle = 'fontAwesome_js';
      // 追加したいjQueryのURL.
      $src = '//kit.fontawesome.com/2a411c1cdb.js';
      // JavaScriptファイルの取込み実行
      wp_enqueue_script( $handle, $src, $deps, $ver );

      // メインナビゲーションメニュー配下サブメニュー制御用Scriptの読み込み
      // ハンドル名（識別要の文字列）.
      $handle = 'mobileChkByWindowSize_js';
      // 追加したい「メインナビゲーションメニュー・サブメニュー表示制御ライブラリ」のURL.
      $src = get_template_directory_uri().'/customerSiteConfiguration/js/com/breakPointsSetByWindowSize.min.js';
      // $src = get_template_directory_uri().'/customerSiteConfiguration/js/com/breakPointsSetByWindowSize.js';
      // JavaScriptファイルの取込み実行
      wp_enqueue_script( $handle, $src, $deps, $ver );

      if ( is_home() )  {

        // fontawesomeアイコン表示用Scriptの読み込み
        // ハンドル名（識別要の文字列）.
        $handle = 'sideScroll_js';
        // 追加したいjQueryのURL.
        $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/00_index/sideScrollScript.min.js';
        // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/00_index/sideScrollScript.js';
        // JavaScriptファイルの取込み実行
        wp_enqueue_script( $handle, $src, $deps, $ver );

        // ホームページ・トップページ表示制御用Scriptの読み込み
        // ハンドル名（識別要の文字列）.
        $handle = 'front-page_js';
        // 追加したいjQueryのURL.
        // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/00_index/main.min.js';
        $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/00_index/main.js';
        // JavaScriptファイルの取込み実行
        wp_enqueue_script( $handle, $src, $deps, $ver );

        // echo " >>>>> LOAD [ ". $src . " ] >>>>>\n";

      } else  {

        // // 
        // // 各サブページ・ヘッダー部表示制御用Scriptの読み込み
        // // トップページは「ローディングスクリーン表示」の為、別途直に組み込み
        // // ハンドル名（識別要の文字列）.
        // $handle = 'headerDspGSAPCtr_js';
        // // 追加したいjQueryのURL.
        // $src = get_template_directory_uri().'/customerSiteConfiguration/js/com/headerDspGSAPCtr.min.js';
        // // JavaScriptファイルの取込み実行
        // wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売「いーねっか・ACestus」ページ・画像拡大表示機能用
        // // ■ 和Plus・お問い合わせフォームページ　　　　　　　　　　　・カナ自動変換機能用
        // //   ☛ 【JQuery】取込み
        // // **************************************************
        // if ( is_page( '11_contactf' ) || is_page( '05_inekka' ) || is_page( '06_acestus' ) ||
        //      is_single()              || is_archive()           || is_search()                )  {

        //   // echo "<br> >>>>> prepare jQuery Library ! <br>";

        //   // jQueryの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'jQuery360';
        //   // 追加したいjQueryのURL.
        //   $src = "//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js";
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        //   // 
        //   // ■ 個別投稿ページ・カテゴリ一覧ページ等サイドバー有りページ、
        //   //  サイドバー内、年号一覧・スライドバー/アコーディオン表示制御の取込み
        //   if ( is_single() || is_archive() )  {
        //     // echo " >>>>> prepare jQuery archiveList ! <br>";
  
        //     // 
        //     // ★ アーカイブページ・サイドバー内「年号一覧表示」
        //     //  「クリックイベント制御」Scriptの読み込み」
        //     // ハンドル名（識別要の文字列）.
        //     $handle = 'archiveList_js';
        //     // 追加したいjQueryのURL.
        //     $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/jquery.archiveList.min.js';
        //     // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/jquery.archiveList.js';
        //     // jQueryの取込み実行
        //     wp_enqueue_script( $handle, $src, $deps, $ver );
  
        //     // 
        //     // ★ アーカイブページ・サイドバー内「年号一覧表示」
        //     //  「スクロールバー表示制御」Scriptの読み込み
        //     // ハンドル名（識別要の文字列）.
        //     $handle = 'scrollBarCtr_js';
        //     // 追加したいjQueryのURL.
        //     $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/js_scrollBarCtl.min.js';
        //     // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/js_scrollBarCtl.js';
        //     // 特定のCSSの後で読み込ませたい場合はそのハンドル名（指定がなければ空の array() でも可）.
        //     $deps = array( "archiveList_js" );
        //     // スクロール表示制御の取込み実行
        //     wp_enqueue_script( $handle, $src, $deps, $ver );
  
        //   }
        // }

        // // 
        // // ページ「slug」にて判断！
        // // 
        // // **************************************************
        // // ■ 和Plus・活動理念ページ関連
        // // **************************************************
        // if ( is_page( '01_philo' ) || is_404() )  {

        //   // echo " >>>>> LOAD 01_philo JavaScript !";
        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'philoPage_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/01_philo/philo.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/01_philo/philo.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・経営支援ページ関連
        // // **************************************************
        // } else if ( is_page( '02_mngsup' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'mngSupPage_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/02_mngSup/mngSup.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/02_mngSup/mngSup.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・IT WEB ソリューションページ関連
        // // **************************************************
        // } else if ( is_page( '03_itwebs' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'ITWebSol_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/03_itWebS/ITWebSol.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/03_itWebS/ITWebSol.js';

        //   // スクリプトの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        //   // /**
        //   //  * scriptLoader
        //   //  * javascriptの遅延defer属性を追加
        //   //  */
        //   // function scriptLoader($script, $handle, $src) {
        //   //   if (is_admin()) {
        //   //     return $script;
        //   //   }
        //   //   $script = sprintf('<script src="%s" type="text/javascript" defer=""></script>' . "\n", $src);
        //   //   return $script;
        //   // }
        //   // add_filter('script_loader_tag', 'scriptLoader', 10, 5);

        // // 
        // // **************************************************
        // // ■ 和Plus・IT WEB エンジニア詳細情報ページ関連
        // // **************************************************
        // } else if ( is_page( '03_itwebe' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'ITWebSolEng_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/03_itWebS/ITWebSolEng.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/03_itWebS/ITWebSolEng.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売ページ関連
        // // **************************************************
        // } else if ( is_page( '04_orgods' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'orgGoodsSale_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/04_orGods/orgPrdSales.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/04_orGods/orgPrdSales.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売「いーねっか」ページ関連
        // // **************************************************
        // } else if ( is_page( '05_inekka' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'orGdsInekka_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/05_iNekka/iNekka.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/05_iNekka/iNekka.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // //
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売「いーねっか」ページ関連
        // // **************************************************
        // } else if ( is_page( '05_inekkaec' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'orGdsInekkaEC_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/05_iNekka/iNekkaOLShop.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/05_iNekka/iNekkaOLShop.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売「ACestus」ページ関連
        // // **************************************************
        // } else if ( is_page( '06_acestus' ) )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'orGdsACestus_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/06_ACestus/ACestus.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/06_ACestus/ACestus.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・カテゴリー「新着ニュース・投稿ブログ」一覧ページ関連
        // // **************************************************
        // // ■ 和Plus・アーカイブ「投稿日時・年月指定時」一覧ページ関連
        // // **************************************************
        // } else if ( is_category( $DEF_catName_news  ) ||
        //             is_category( $DEF_catName_blog  ) ||
        //             is_category( $DEF_catName_tech  ) ||
        //             is_category( $DEF_catName_howTo ) ||
        //             is_archive (                    ) ||
        //             is_search  (                    )    )  {

        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'newsBlogCategoryArchive_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/07_08_newsBlog/categoryPageCtr.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/07_08_newsBlog/categoryPageCtr.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // // 
        // // // **************************************************
        // // // ■ 和Plus・アーカイブ「投稿日時・年月指定時」一覧ページ関連
        // // // **************************************************
        // // } else if ( is_archive() )  {

        // //   // ホームページ・トップページ表示制御用Scriptの読み込み
        // //   // ハンドル名（識別要の文字列）.
        // //   $handle = 'newsBlogArchive_js';
        // //   // 追加したいjQueryのURL.
        // //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/07_08_newsBlog/categoryPageCtr.min.js';
        // //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/07_08_newsBlog/categoryPageCtr.js';
        // //   // JavaScriptファイルの取込み実行
        // //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・会社概要ページ関連
        // // **************************************************
        // } else if ( is_page( '09_comprof' ) )  {
          
        //   // ホームページ・トップページ表示制御用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'comProfile_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/09_comProf/companyProfile.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/09_comProf/companyProfile.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・個人情報保護指針ページ関連
        // // **************************************************
        // } else if ( is_page( '10_ppolicy' ) )  {

        //   // ハンドル名（識別要の文字列）
        //   $handle = 'privacyPolicy_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/10_pPolicy/privacyPolicy.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/10_pPolicy/privacyPolicy.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・お問い合わせフォームページ関連
        // // **************************************************
        // } else if ( is_page( '11_contactf' ) )  {
          
        //   //  入力データ確認画面用、タイトル・記事本体を GSAP にてアニメーション表示Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'contactFormGSAP_js';
        //   // 追加したいサブページ利用GSAPアニメーションスクリプトのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/contactFormGSAPDspCtr.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/contactFormGSAPDspCtr.js';
        //   // Scriptの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        //   // カナ文字入力チェック用jQueryの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'jQAutoKana_js';
        //   // 追加したいサブページ利用GSAPアニメーションスクリプトのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/jquery.autoKana.min.js';
        //   // Scriptの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );      

        //   // カナ文字入力チェックScriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'autoKana_js';
        //   // 追加したいサブページ利用GSAPアニメーションスクリプトのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/autoKanajQ.min.js';
        //   // Scriptの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        //   // ハンドル名（識別要の文字列）
        //   $handle = 'contactform_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/contactForm.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/11_contactF/contactForm.js';
        //   // JavaScriptファイルの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // // 
        // // **************************************************
        // // ■ 和Plus・投稿個別ページ表示関連
        // // **************************************************
        // } else if ( is_single() )  {

        //   // 
        //   // ★ アーカイブページ「各種要素表示制御」Scriptの読込み（GSAP）
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'singlePageCtr_js';
        //   // 追加したいjQueryのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/singlePageCtr.min.js';
        //   // $src = get_template_directory_uri().'/customerSiteConfiguration/js/contents/singleArchive/singlePageCtr.js';
        //   // スクロール表示制御の取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );
          
        // }

        // // 
        // // **************************************************
        // // ■ 和Plus・オリジナル商品販売「いーねっか・ACestus」ページ
        // //   ☛ Gallery・画像拡大表示機能関連コード
        // // **************************************************
        // if ( is_page( '05_inekka' ) || is_page( '06_acestus' ) )  {
          
        //   // ギャラリー画像拡大表示用Scriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'lightBox_js';
        //   // 追加したいサブページ利用GSAPアニメーションスクリプトのURL.
        //   $src = "//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js";
        //   // Scriptの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        //   // 画像種別切替え用ローカルScriptの読み込み
        //   // ハンドル名（識別要の文字列）.
        //   $handle = 'myGallaryExec_js';
        //   // 追加したいサブページ利用GSAPアニメーションスクリプトのURL.
        //   $src = get_template_directory_uri().'/customerSiteConfiguration/js/com/imgGallary.min.js';
        //   // Scriptの取込み実行
        //   wp_enqueue_script( $handle, $src, $deps, $ver );

        // }

      }
    }

    // enqueue：「ＦＩＦＯスタック」に積み込む事
    // dequeue：「ＦＩＦＯスタック」から取り出す事（古い物から取り出す）
    add_action( 'wp_enqueue_scripts', 'init_myJavaScript');

  }
?>