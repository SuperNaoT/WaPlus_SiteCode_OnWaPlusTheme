<?php ?>

<!--  -->
<!-- ********************************************* -->
<!-- ********************************************* -->
<!-- 株式会社和Plus ご提供サービス・事業説明セクション -->
<!-- ********************************************* -->
<!-- ********************************************* -->
      <section id="OurServices">
        <div class="innerSection">
          <div class="sectionContainer">
            
            <div class="serviceTitle">
              <div class="secHrzLineL"></div>
              <div class="line">
                <span>サ</span>
                <span>ー</span>
                <span>ビ</span>
                <span>ス</span>
                <span>の</span>
                <span>ご</span>
                <span>案</span>
                <span>内</span>
              </div>
              <div class="secHrzLineR"></div>
            </div>

            <div class="msgDetailService" id="js-vtclBar">
              <div class="svcKind" id="svcKindMB1">
                <div class="barSet">
                  <div class="vtclBar vtclBar1"></div>
                  <div class="vtclBarSdw"></div>  
                </div>
                <!-- <p class="doubleLine">■ 経営支援</p> -->
                <h3 class="doubleLine">■ 経営支援</h3>
                <ul>
                  <li>財務・会計・人事</li>
                  <li>マーケティング・営業</li>
                  <li>ＩＴ 分野支援</li>
                </ul>
                <a href="<?php echo esc_url( home_url('02_mngsup') ); ?>" class="btn andMoreBtn"> and more...</a>
              </div>
              
              <div class="svcKind" id="svcKindMB2">
                <div class="barSet">
                  <div class="vtclBar vtclBar2"></div>
                  <div class="vtclBarSdw"></div>  
                </div>
                <!-- <p class="doubleLine">■ IT WEB Solutions</p> -->
                <h3 class="doubleLine">■ IT WEB Solutions</h3>
                <ul>
                  <li>情報システム部門運営支援</li>
                  <li>各種システム開発</li>
                  <!-- <li class="pcLabel">WEB アプリケーション開発</li>
                  <li class="mbLabel">WEB アプリ開発</li> -->
                  <li>ホームページ開設</li>
                  <li>各種マクロ開発</li>
                  <li>パソコントラブル対応</li>
                  <!-- <li class="pcLabel">情報システム部門運営支援</li>
                  <li class="mbLabel">情シス運営</li> -->
                </ul>
                <a href="<?php echo esc_url( home_url('03_itwebs') ); ?>" class="btn andMoreBtn"> and more...</a>
              </div>

              <div class="svcKind" id="svcKindMB3">
                <div class="barSet">
                  <div class="vtclBar vtclBar3"></div>
                  <div class="vtclBarSdw"></div>  
                </div>
                <!-- <p class="doubleLine">■ オリジナル商品販売</p> -->
                <h3 class="doubleLine">■ オリジナル商品販売</h3>
                <ul>
                  <li>i-nekka</li>
                  <li>Aphrodite Cestus</li>
                </ul>
                <a href="<?php echo esc_url( home_url('04_orgods') ); ?>" class="btn andMoreBtn"> and more...</a>
              </div>
            </div>
          </div>

          <div class="baseFrame">
            <img class="js-parallax"
                src   = "<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/DSC_OhtemachiS.jpg' ) ?>"
                alt   = "大手町金融街" data-y="-20vw" >
          </div>



<!-- 
          <div class="expImage js-expLImage">
            <img srcset=
                        "<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/DSC_OhtemachiS.jpg' ) ?> 900w,
                        <?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/DSC_Ohtemachi.jpg' ) ?> 1980w"
                sizes =
                        "(max-width: 799px) 440px,
                                            800px" 
                src   ="<?php echo esc_url( get_template_directory_uri().'/customerSiteConfiguration/Images/00_index/DSC_Ohtemachi.jpg' ) ?>" alt="大手町金融街">      
          </div>
 -->
        </div>
      </section>

  <!-- <script id="rendered-js"> -->
  <script>
    // gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray('.js-parallax').forEach( wrap => {
      // 
      // 【data-y】上下移動量を設定
      // 「＋値」は画像が下に、「ー値」は画像が上に移動する
      const y = wrap.getAttribute('data-y') || -100;

      gsap.to(wrap, {
        y: y,                     // Y方向の移動量
        scrollTrigger: {
          trigger: wrap,
          start: 'top bottom',    // 要素の「top」の位置が・ビューポート「bottom」位置に達したら移動開始
          end: 'bottom top',      // 要素の「bottom」の位置が・ビューポート「top」位置に達したら移動停止
          scrub: 0.5,             // 数値 小:早くなり・大:遅くなる
          // markers: true
        }
      });
    });
  </script>



