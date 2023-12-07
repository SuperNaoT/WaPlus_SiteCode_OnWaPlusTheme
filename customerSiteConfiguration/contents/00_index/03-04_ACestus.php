<?php
  // 
  // *******************************************************
  // *******************************************************
  // ★ 【global：グローバル変数・デバイス判断フラグ】の取込み
  // *******************************************************
  // *******************************************************
  // $GB_MOBILE_FLAG = $args['GB_MOBILE_FLAG'];
  global $GB_MOBILE_FLAG;
  global $GB_RELLAX_FLAG;

?>

<!--  -->
<!-- ********************************************* -->
<!-- ********************************************* -->
<!-- 各種事業説明セクション内・３、
    【オリジナル商品販売２：クロコダイルレザー事業】セクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->

            <!--  -->
            <!-- クロコダイルレザー　ACestus -->
            <div class="panel js-panel" id="OurPerformanceACestus">
              <div class="sectionContainer">
      
                <div class="bizKind doubleLine" id="bizKindMB4">
                  <?php //if ( !$GB_MOBILE_FLAG ): ?>
                    <h2 class="forPC">Ⅳ　Aphrodite-Cestus : クロコダイル</h2>
                  <?php //else: ?>
                    <h2 class="forMB">Ⅳ　Aphrodite-Cestus</h2>
                  <?php //endif; ?>

                </div>

                <div class="msgDetailPerform" id="msgDtlPfmMB4">
                  <?php //if ( !$GB_MOBILE_FLAG ): ?>
                    <div class="msgDetailPC forPC">
                      <p>　東南アジアでは、クロコダイルがとても重宝されており、<br>
                        　農園にて飼育され薬用として余すところなく利用されて居ります。<br><br>
                        　私共は、現地パートナー様と連携し<br>
                        　貴重なクロコダイルを更に無駄にする事なく、<br>
                        　原皮を用いて各種製品を企画・製造・販売、<br>
                        　高品質・低価格にてご提供して参ります。
                        　<a href="<?php echo esc_url( home_url('06_acestus') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                        <br><br>
                        　　　　　　　　　　　　　　　商標登録番号（第６２７１６３６号）</p>  
                    </div>
                  <?php //else: ?>
                    <div class="msgDetailMB forMB">
                      <p>　東南アジアでは、<br>
                        　クロコダイルがとても重宝されており、<br>
                        　農園にて飼育され薬用として<br>
                        　余す所なく利用されて居ります<br><br>
                        　私共は、<br>
                        　現地パートナー様と連携し、<br>
                        　貴重なクロコダイルを無駄にする事なく、<br>
                        　原皮を用い各種製品を企画・製造・販売、<br>
                        　高品質・低価格にてご提供して参ります。<br><br>
                        　　　　　　　　　　　　<a href="<?php echo esc_url( home_url('06_acestus') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                        <br><br>
                        　　　商標登録番号（第６２７１６３６号）</p>  
                    </div>
                  <?php //endif ?>
                </div>

                <div class="addImagePkg" id="addImgPkgMB4">
                  <div class="rectL"></div>
                  <div class="rectC"></div>  
                  <div class="rectR"></div>
                </div>

                <div class="circleO" id="circleOMB4"></div>

              </div>

              <?php if ( $GB_RELLAX_FLAG ): ?>
                <div class="expImage js-expMImage" id="expImgMB4" data-rellax-zindex="2" data-rellax-tablet-speed="-1">
              <?php else: ?>
                <div class="expImage" id="expImgMB4">
              <?php endif; ?>
                <div class="baseFrame">
                  <img src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/ACestus/00_index/ACestus-500x350.jpg' ) ?>" alt="ACestus メイン">      
                  <!-- <img class="forPC" src="<?php //echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/ACestus/00_index/ACestus-500x350.jpg' ) ?>" alt="ACestus メイン">       -->
                  <!-- <img class="forMB" src="<?php //echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/ACestus/00_index/ACestus-500x350Px.jpg' ) ?>" alt="ACestus メイン">       -->
                </div>
              </div>  
            </div>
