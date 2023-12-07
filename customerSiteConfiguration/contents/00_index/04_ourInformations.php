<?php
  // 
  // *******************************************************
  // *******************************************************
  // ★ 【global：グローバル変数・デバイス判断フラグ】の取込み
  // *******************************************************
  // *******************************************************
  global $GB_MOBILE_FLAG;
  global $GB_RELLAX_FLAG;

  global $GB_countOfPosts;
  global $GB_categoryType;
?>

<!--  -->
<!-- ********************************************* -->
<!-- ********************************************* -->
<!-- 株式会社和Plus 新着ニュース・ブログ/日々活動 一覧セクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->
      <section id="OurInformation">
        <div class="sectionContainer">
          <div class="informTitle" id="pfmTitleMB5">
            <div class="secHrzLineL"></div>
            <div class="line">
              <span>お</span>
              <span>知</span>
              <span>ら</span>
              <span>せ</span>
              <span>／</span>
              <span>つ</span>
              <span>ぶ</span>
              <span>や</span>
              <span>き</span>
            </div>
            <div class="secHrzLineR"></div>
          </div>

          <div class="infoKind doubleLine" id="bizKindMB5">
            <?php //if ( !$GB_MOBILE_FLAG ): ?>
              <h2 class="forPC">【 新着ニュース 】　　　　　</h2>
            <?php //else: ?>
              <h2 class="forMB">【 新着ニュース 】　</h2>
            <?php //endif; ?>
          </div>

          <div class="msgDetailInform" id="msgDtlPfmMB5">
            <?php //if ( !$GB_MOBILE_FLAG ): ?>
              <div class="msgDetailPC forPC">
                <?php
                       $cateCount = chkCategoryCount( $GB_categoryType );
                  if ( $cateCount > 0 )  {

                    //
                    // wordpress 「お知らせ」投稿情報を取得する。 
                    //【お知らせ:カテゴリ名：「news」】
                    $posts = get_posts("numberposts=$GB_countOfPosts&category_name=$GB_categoryType&orderby=post_date&offset=0");
                    foreach ($posts as $post):
                      //
                      // 取得投稿データの、グローバル変数への設定。
                      setup_postdata($post);
                      require( get_template_directory() . "/customerSiteConfiguration/common-php/categoryUtility/indicateOnePostTILE.php" );
                    endforeach;

                  } else  { ?>
                    <p   style="margin-left: 30px; font-weight: bold; line-height: 200px;">　■ 只今、当カテゴリーでのご案内はありません。</p>
                    <div style="height:200px;"></div>
                <?php } ?>

              </div>
            <?php //else: ?>
              <div class="msgDetailMB forMB">
                <?php
                        $cateCount = chkCategoryCount( $GB_categoryType );
                  if ( $cateCount > 0 )  {
                    //
                    // wordpress 「お知らせ」投稿情報を取得する。 
                    //【お知らせ:カテゴリ名：「news」】
                    $posts = get_posts("numberposts=$GB_countOfPosts&category_name=$GB_categoryType&orderby=post_date&offset=0");
                    foreach ($posts as $post):
                      //
                      // 取得投稿データの、グローバル変数への設定。
                      setup_postdata($post);
                      require( get_template_directory() . "/customerSiteConfiguration/common-php/categoryUtility/indicateOnePostTILE.php" );

                    endforeach;
                  } else  { ?>
                    <div style="height: 50px;"></div>
                    <p   style="margin-left: 50px; font-weight: bold; line-height: 1.5em;">　■ 只今、当カテゴリーでの<br>　　　 ご案内はありません。</p>
                <?php } ?>
              </div>  
            <?php //endif ?>
          </div>
        </div>

        <?php if ( $GB_RELLAX_FLAG ): ?>
          <div class="expImage js-expMImage" id="expImgMB5" data-rellax-zindex="2" data-rellax-tablet-speed="-1">
        <?php else: ?>
          <div class="expImage" id="expImgMB5">
        <?php endif; ?>
          <div class="baseFrame forPC">
            <img src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/ACestus/00_index/ACestus-bangkok1M.jpg' ) ?>" alt="オリジナル商品販売事業・アフロディーテケストスでのビズトリップで訪れたバンコクのレストラン「Baan Chidlom Bangpu」の画像"> 
          </div>
          <div class="baseFrame forMB">
            <img src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/ACestus/00_index/ACestus-bangkok1Px.jpg' ) ?>" alt="オリジナル商品販売事業・アフロディーテケストスでのビズトリップで訪れたバンコクのレストラン「Baan Chidlom Bangpu」の画像"> 
          </div>
        </div>
      </section>
