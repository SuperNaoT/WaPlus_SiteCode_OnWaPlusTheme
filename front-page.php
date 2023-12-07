<!-- ■ トップページ【front-page.php】 -->    
<?php

  // 
  // *******************************************************
  // *******************************************************
  // ★ 【global：グローバル変数】の取込み
  // *******************************************************
  // *******************************************************
  get_template_part( 'customerSiteConfiguration/common-php/globalVariables' );

  // 表示対象ページ・メニュー種別
  $GB_pageKind     = 0;    // front-page：0

  // 
  // ■ お問い合わせフォーム・状態フラグ
  // $GB_page_flag = 0：入力フォームページ
  // $GB_page_flag = 1：入力内容確認ページ
  // $GB_page_flag = 2：送信完了報告ページ
  $GB_page_flag   = 0;  

  // 単一セクションに表示する投稿タイルの数
  $GB_countOfPosts = 3;

  // 表示する投稿の種別「カテゴリー」
  $GB_categoryType = "news";

  // 
  // 【WordPress・get_header】用引数設定
  $params       = [ 'GB_pageKind'     => $GB_pageKind,
                    'GB_page_flag'    => $GB_page_flag,
                    'GB_categoryType' => $GB_categoryType
                  ]; 

  // ヘッダー部の取込み
  get_header( null, $params );
  // get_header( null );
?>

    <!--  -->
    <!-- サイトトップページ・メインコンテンツ -->
    <div class="main" id="mainArea">

      <?php
        // 
        // *******************************************************
        // *******************************************************
        // ★ 【株式会社和Plus 企業ポリシー説明】の取込み
        // *******************************************************
        // *******************************************************
        // get_template_part( 'customerSiteConfiguration/contents/00_index/01_pageTopSection', null, $params );
        get_template_part( 'customerSiteConfiguration/contents/00_index/01_pageTopSection' );


        // 
        // *******************************************************
        // *******************************************************
        // ★ 【株式会社和Plus ご提供サービス・事業説明セクション】の取込み
        // *******************************************************
        // *******************************************************
        // get_template_part( 'customerSiteConfiguration/contents/00_index/02_ourServicesSection', null, $params );
        get_template_part( 'customerSiteConfiguration/contents/00_index/02_ourServicesSection' );
      ?>

      <!-- ****************************************************** -->
      <!-- ■■■■■ 横スクロールブロック ■■■■■ -->
      <!-- ****************************************************** -->
      <section id="sideScrollArea">       <!-- NoUse -->
        <div class="sideScrollArea js-sideScrollArea">  <!-- sideScrollArea:scss ／ js-sideScrollArea -->
          <div class="allPanelWrapper js-allPanelWrapper" id="wrapper">

            <?php
              // 
              // *******************************************************
              // *******************************************************
              // ★ 【株式会社和Plus 経営支援事業 説明セクション】の取込み
              // *******************************************************
              // *******************************************************
              // get_template_part( 'customerSiteConfiguration/contents/00_index/03-01_managmentSupport', null, $params );
              get_template_part( 'customerSiteConfiguration/contents/00_index/03-01_managmentSupport' );
            ?>

            <?php
              // 
              // *******************************************************
              // *******************************************************
              // ★ 【株式会社和Plus IT WEB ソリューション 事業説明セクション】の取込み
              // *******************************************************
              // *******************************************************
              // get_template_part( 'customerSiteConfiguration/contents/00_index/03-02_itWebSolution', null, $params );
              get_template_part( 'customerSiteConfiguration/contents/00_index/03-02_itWebSolution' );
            ?>

            <?php
              // 
              // *******************************************************
              // *******************************************************
              // ★ 【株式会社和Plus オリジナル商品販売 大人の素敵雑貨 事業説明セクション】の取込み
              // *******************************************************
              // *******************************************************
              // get_template_part( 'customerSiteConfiguration/contents/00_index/03-03_i-nekka', null, $params );
              get_template_part( 'customerSiteConfiguration/contents/00_index/03-03_i-nekka' );
            ?>

            <?php
              // 
              // *******************************************************
              // *******************************************************
              // ★ 【株式会社和Plus オリジナル商品販売 クロコダイルアイテム 事業説明セクション】の取込み
              // *******************************************************
              // *******************************************************
              // get_template_part( 'customerSiteConfiguration/contents/00_index/03-04_ACestus', null, $params );
              get_template_part( 'customerSiteConfiguration/contents/00_index/03-04_ACestus' );
            ?>

          </div>
        </div>  
      </section>
<!-- ****************************************************** -->
<!-- ****************************************************** -->
<!-- ****************************************************** -->

      <?php
        // 
        // *******************************************************
        // *******************************************************
        // ★ 【株式会社和Plus 新着ニュース・ブログ/日々活動 一覧 セクション】の取込み
        // *******************************************************
        // *******************************************************
        // get_template_part( 'customerSiteConfiguration/contents/00_index/04_ourInformations', null, $params );
        get_template_part( 'customerSiteConfiguration/contents/00_index/04_ourInformations' );
        ?>

    </div>    <!-- main -->

<!-- **************************************************************** -->
<!-- **************************************************************** -->
<!-- **************************************************************** -->
<?php 
  // フッター部の取込み
  // get_footer( null, $params );
  get_footer( null );
?>
<!-- **************************************************************** -->
<!-- **************************************************************** -->
<!-- **************************************************************** -->