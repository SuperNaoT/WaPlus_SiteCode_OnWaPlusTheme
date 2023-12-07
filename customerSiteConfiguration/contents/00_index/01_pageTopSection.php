<?php
  // 
  // *******************************************************
  // *******************************************************
  // ★ 【global：グローバル変数・デバイス判断フラグ】の取込み
  // *******************************************************
  // *******************************************************

  // $GB_MOBILE_FLAG = $args['GB_MOBILE_FLAG'];
  global $GB_MOBILE_FLAG;
  // if (   $GB_MOBILE_FLAG )  {
  //   echo "【01_pageTopSection.php】\$GB_MOBILE_FLAG ☛【TRUE】\n";
  // } else  {
  //   echo "【01_pageTopSection.php】\$GB_MOBILE_FLAG ☛【FALSE】\n";
  // }

?>

<!--  -->
<!-- ********************************************* -->
<!-- ********************************************* -->
<!-- 株式会社和Plus ホームページ、トップセクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->

      <!--  -->
      <!-- メインコンテンツ内、和プラス企業理念 -->
      <section id="rollingTitlePage">
        <div class="container">

          <!-- メッセージ部 -->
          <div class="rollingTitle js-pallax" data-rellax-speed="5">
            <div class="msgMainTitle">
              <div class="pcLine">
                <span>W</span>
                <span>e</span>　
                <span>w</span>
                <span>i</span>
                <span>l</span>
                <span>l</span>　
                <span>c</span>
                <span>h</span>
                <span>a</span>
                <span>n</span>
                <span>g</span>
                <span>e</span>
              </div>
              <div class="pcLine">
                <span>c</span>
                <span>h</span>
                <span>a</span>
                <span>r</span>
                <span>m</span>
                <span>s</span>　
                <span>m</span>
                <span>u</span>
                <span>c</span>
                <span>h</span>　
                <span>m</span>
                <span>o</span>
                <span>r</span>
                <span>e</span>
                <span>!</span>
              </div>
              
              <div class="mbLine">
                <span>W</span>
                <span>e</span>　
                <span>w</span>
                <span>i</span>
                <span>l</span>
                <span>l</span>
              </div>
              <div class="mbLine">
                <span>c</span>
                <span>h</span>
                <span>a</span>
                <span>n</span>
                <span>g</span>
                <span>e</span>　
                <span>c</span>
                <span>h</span>
                <span>a</span>
                <span>r</span>
                <span>m</span>
                <span>s</span>
              </div>
              <div class="mbLine">
                <span>m</span>
                <span>u</span>
                <span>c</span>
                <span>h</span>　
                <span>m</span>
                <span>o</span>
                <span>r</span>
                <span>e</span>
                <span>!</span>
              </div>
              
            </div>

            <div class="cthCopy">
              <div class="hrzLine"></div>
              <h2>ひと価値添えて・・・</h2>
            </div>
            <?php //if ( $GB_MOBILE_FLAG == false ): ?>
              <div class="msgDetailPC forPC">
                <p>【和Plus】<br>
                    　このフィルタを透過させる事により、<br>
                    　小さな「Plus-α」を加え「更に大きな魅力」に創造して参ります。<br><br>
                    　　　　　　　　　　　　　　　　<a href="<?php echo esc_url( home_url('01_philo' ) ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a></p>
              </div>
            <?php //else: ?>
              <div class="msgDetailMB forMB">
                <p>【和Plus】<br>
                    　このフィルタを透過させる事により、<br>
                    　小さな「Plus-α」を加え、<br><br>
                    「更に大きな魅力」<br>
                    　に創造して参ります。<br><br>
                    　　　　　　　　　　　　<a href="<?php echo esc_url( home_url('01_philo' ) ); ?>">[ ... <i class="fas fa-info colBlue"></i> <i class="fas fa-link extLnkIcon colBlue"></i> ]</a></p>
              </div>
            <?php //endif; ?>
          </div>

          <!-- イメージ画像表示【山梨・鶴ヶ城】 -->
          <div class="ourImage"></div>
        </div>
      </section>
