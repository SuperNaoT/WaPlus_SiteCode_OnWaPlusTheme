<?php
  // 
  // *******************************************************
  // *******************************************************
  // ★ 【global：グローバル変数・デバイス判断フラグ】の取込み
  // *******************************************************
  // *******************************************************
  // echo "【03-01_managementSupport.php】\$args ☛【". $args['GB_MOBILE_FLAG'] . "】\n";

  // $GB_MOBILE_FLAG = $args['GB_MOBILE_FLAG'];
  global $GB_MOBILE_FLAG;
  global $GB_RELLAX_FLAG;


?>

<!--  -->
<!-- ********************************************* -->
<!-- ********************************************* -->
<!-- 各種事業説明セクション内・１、【経営支援事業】セクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->

            <!--  -->
            <!-- 営業支援 -->
            <div class="panel js-panel" id="OurPerformance">
              <div class="sectionContainer">

                <div class="performTitle" id="pfmTitleMB1">
                  <div class="secHrzLineL"></div>
                  <div class="line">
                    <span>込</span>
                    <span>め</span>
                    <span>る</span>
                    <span>思</span>
                    <span>い</span>
                    <span>・</span>
                    <span>・</span>
                    <span>・</span>
                  </div>
                  <div class="secHrzLineR"></div>
                </div>

                <div class="bizKind doubleLine" id="bizKindMB1">
                  <?php //if ( !$GB_MOBILE_FLAG ): ?>
                    <h2 class="forPC">Ⅰ　Management Support：経営支援</h2>
                  <?php //else: ?>
                    <h2 class="forMB">Ⅰ　Management Support</h2>
                  <?php //endif; ?>
                </div>

                <div class="msgDetailPerform" id="msgDtlPfmMB1">
                  <?php //if ( !$GB_MOBILE_FLAG ): ?>
                    <div class="msgDetailPC forPC">
                      <p>【実現したい】その熱い想いをサポート致します。<br>
                        【想いの実現に集中出来る環境】創りが大切です。<br><br>
                        　財務・会計・人事等の付随作業、<br>
                        　更にはマーケティング・営業コンサル、<br>
                        　そして商品開発迄、鋭意支援させて頂きます。
                        　<a href="<?php echo esc_url( home_url('02_mngsup') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a></p>
  
                    </div>
                  <?php //else: ?>
                    <div class="msgDetailMB forMB">
                      <p>【実現したい】<br>
                        　その熱い想いを、<br>
                        　経営支援と言う形で応援致します。<br><br>
                        【想いの実現に集中出来る】<br>
                        　環境創りが大切です。<br><br>
                        　財務・会計・人事等の付随作業、<br>
                        　更には、マーケティング・営業コンサル、<br>
                        　商品開発迄、鋭意支援させて頂きます。<br><br>
                        　　　　　　　　　　　　<a href="<?php echo esc_url( home_url('02_mngsup') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a></p>
  
                    </div>
                  <?php //endif; ?>
                </div>

                <div class="addImagePkg" id="addImgPkgMB1">
                  <div class="rectL"></div>
                  <div class="rectC"></div>  
                  <div class="rectR"></div>
                </div>
  
                <div class="circleO" id="circleOMB1"></div>
              </div>
      

              <?php if ( $GB_RELLAX_FLAG ): ?>
                <div class="expImage js-expMImage" id="expImgMB1" data-rellax-zindex="2" data-rellax-tablet-speed="-1">
              <?php else: ?>
                <div class="expImage" id="expImgMB1">
              <?php endif; ?>
                <div class="baseFrame">
                  <img class="forPC" src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/SunShine.jpg' ) ?>" alt="IT WEB Solイメージ">
                  <img class="forMB" src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/SunShineW.jpg' ) ?>" alt="IT WEB Solイメージ">
                </div>
              </div>  
            </div>
