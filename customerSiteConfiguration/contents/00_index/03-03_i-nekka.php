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
    【オリジナル商品販売１：大人の素敵雑貨事業】セクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->

            <!--  -->
            <!-- 大人の素敵雑貨　i-nekka -->
            <div class="panel js-panel" id="OurPerformanceInekka">
              <div class="sectionContainer">
      
                <div class="bizKind doubleLine" id="bizKindMB3">
                  <h2>Ⅲ　i-nekka : 大人の素敵雑貨</h2>
                </div>

                <div class="msgDetailPerform" id="msgDtlPfmMB3">
                  <?php //if ( !$GB_MOBILE_FLAG ): ?>
                    <div class="msgDetailPC forPC">
                      <!-- <p>　人と繋がっていたい！<br>
                        　いいなと思う気持ちを共有したい！<br><br>                    
                        　こんな想いから、<br>
                        　姉妹2人で【i-nekka（イーネッカ）】を始めました。<br><br>
                        　縫うのが大好きな妹と、編むのが大好きな姉。<br>
                        『あったらいいな！』と思う”大人の素敵な小物”を、<br>
                        　一つ一つ想いを込めて丁寧に作っています。
                        　<a href="<?php // echo esc_url( home_url('05_inekka') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                      </p> -->
                      <p>　人と繋がっていたい！<br>
                        「素敵だな」と思う気持ちを共有したい！<br>
                        　こんな想いから姉妹2人で【i-nekka（イーネッカ）】を始めました。<br><br>
                        　縫うのが大好きな妹と、編むのが大好きな姉。<br>
                        　キーワードは『刺子・レース・ニット』等々、素敵な手芸作品。<br>
                        　作品を通じて多くの方と繋がり、笑顔を広めて参ります。<br>
                        　更には、過疎・高齢化の進む地域を元気づけたい！<br>
                        　始めの一歩、先ずはコミュニティーを作って参ります。
                        　<a href="<?php echo esc_url( home_url('05_inekka') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                      </p>

                    </div>
                  <?php //else: ?>
                    <div class="msgDetailMB forMB">
                      <!-- <p>　人と繋がっていたい！<br>
                        　いいなと思う気持ちを共有したい！<br><br>                    
                        　こんな想いから姉妹２人で、<br>
                        【i-nekka（イーネッカ）】を始めました。<br><br>
                        　縫うのが大好きな妹と、<br>
                        　編むのが大好きな姉。<br><br>
                        『あったらいいな！』と思う<br>
                        【大人の素敵な小物】を、<br><br>
                        　一つ一つ、<br>
                        　想いを込めて、<br>
                        　丁寧に作っています。<br><br>
                        　　　　　　　　　　　　<a href="<?php // echo esc_url( home_url('05_inekka') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                      </p> -->
                      <p>　人と繋がっていたい！<br>
                        「素敵だな」と思う気持ちを共有したい！<br><br>
                        　こんな想いから姉妹2人で、<br>
                        【i-nekka（イーネッカ）】を始めました。<br><br>
                        　縫うのが大好きな妹と、<br>
                        　編むのが大好きな姉。<br><br>
                        　キーワードは『刺子・レース・ニット』等々、<br>
                        　素敵な手芸作品。<br><br>
                        　作品を通じて多くの方と繋がり、<br>
                        　笑顔を広めて参ります。<br><br>
                        　更には過疎・高齢化の進む地域を元気づけたい！<br>
                        　始めの一歩、コミュニティーを作って参ります。<br><br>
                        　　　　　　　　　　　　<a href="<?php echo esc_url( home_url('05_inekka') ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a>
                      </p>
                    </div>
                  <?php //endif; ?>
                </div>

                <div class="addImagePkg" id="addImgPkgMB3">
                  <div class="rectL"></div>
                  <div class="rectC"></div>  
                  <div class="rectR"></div>
                </div>

                <div class="circleO" id="circleOMB3"></div>
              </div>

              <?php if ( $GB_RELLAX_FLAG ): ?>
                <div class="expImage js-expMImage" id="expImgMB3" data-rellax-zindex="2" data-rellax-tablet-speed="-1">
              <?php else: ?>
                <div class="expImage" id="expImgMB3">
              <?php endif; ?>
                <div class="baseFrame">
                  <img src="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/i-nekka/00_index/i-nekka-roses.jpg' ) ?>" alt="いーねっか、ローズ">
                  <!-- <img class="forPC" src="<?php //echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/i-nekka/00_index/i-nekka-roses.jpg' ) ?>" alt="いーねっか、ローズ"> -->
                  <!-- <img class="forMB" src="<?php //echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/i-nekka/00_index/i-nekka-rosesPx.jpg' ) ?>" alt="いーねっか、ローズ"> -->
                </div>
              </div>  
            </div>
