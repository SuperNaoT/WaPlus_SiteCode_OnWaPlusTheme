<!--
 <style type="text/css">

  /*
   * ■ WaPlus Theme に於ける初期ロード画面の背景画像を、カスタマーサイトより引用 
   */
  .loading {
  /* 
    // 
    // 表示位置固定
    // サイトロード画面表示中、
    // メインコンテンツ部分を非表示にする為
  */

    position: fixed;
    top: 0;
    left: 0;

    width: 100%;
    height: 100vh;

    background-image: url( "<?php // echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/loadBGImage.jpg' ) ?>" );
    background-image: url( "<?php // echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/loadBGImage_MB.jpg' ) ?>" );
    background-size: cover;
    background-position: center;
    overflow: hidden;
    scrollbar-width: none;

    opacity: 0;
    visibility: hidden;
    transition: 0.3s;

  }

</style> -->

  <!--  -->
  <!-- ********************************************* -->
  <!-- *********************************************
        ■ ホームページ、初期ロードスクリーン表示コード
      ********************************************* -->
  <!-- ********************************************* -->
  <!--  -->
  <div class="siteLoadWrapper" id="siteLoadWrapper">
    <!-- <div id="loading" class="loading active"> -->
    <div id="loading" class="loading">
      <div class="gradient">
        <div class="gra-inner -gradient"></div>
        <div class="gra-out   -gradient"></div>
      </div>
      <h1>
        <img src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/WaPlus-Logo.png' ) ?>" id="loadWPLogo" alt="株式会社和Plus・和プラス・ワプラスのロゴマークが入った画像">
        <span id="loadWPSpan1">W</span>
        <span id="loadWPSpan2">a</span>
        <span id="loadWPSpan3">P</span>
        <span id="loadWPSpan4">l</span>
        <span id="loadWPSpan5">u</span>
        <span id="loadWPSpan6">s</span>
      </h1>
    </div>
    <div class="bg"></div>
  </div>
