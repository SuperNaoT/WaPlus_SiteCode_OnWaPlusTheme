
<!--  -->
<!-- *************************************************** -->
<!-- *************************************************** -->
<!-- *************************************************** -->
<!--                                                     -->
<!-- ■ 投稿概略リスト表示・個別投稿概略１件、表示機能 -->
<!-- 1. トップページ　「front-page.php 」☛「fpSection-1-2.php」    から呼ばれる -->
<!-- 2. 投稿記事リスト「archive.php    」☛「archiveListDspCtr.php」から呼ばれる -->
<!-- 3. 投稿記事リスト「category.php   」☛「categoryListDspCtr.php」から呼ばれる -->
<!--                                                     -->
<!-- *************************************************** -->
<!-- *************************************************** -->
<!-- *************************************************** -->
<!--  -->
<!--  -->
<!--  -->

  <div class="onePostTile">
    <div class="sBysBlk">

      <!-- 新着情報・サムネイル画像 -->
      <!-- PC画面では、サムネイル・日付・記事詳細（タイトル・説明）が横並び -->
      <?php //if ( !$GB_MOBILE_FLAG ): ?>
        <div class="forPC">
          <div class="newsThumb myThumbParentStylePC">
            <a href="<?php the_permalink() ?>">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail( 'thumbnail', array( 100, 100, 'class'=>'myThumbChildStylePC' ) );
              } else  { ?>
                <div class="newsNoImage myThumbChildStylePC"></div>
              <?php } ?>
            </a>
          </div>
        </div>
        <!-- 新着情報・日付 -->
        <div class="forPC">
          <div class="newsDate">
            <a href="<?php the_permalink() ?>">
              <?php the_time('Y年m月d日') ?>
            </a>
          </div>
        </div>
      <?php //else: ?>
        <!-- 新着情報・サムネイル画像 -->
        <!-- モバイル画面では、サムネイル・日付が横並び、記事詳細（タイトル・説明）は下配置 -->
        <div class="thumbDateForMB">
          <div class="forMB">
            <div class="newsThumb myThumbParentStyle">
              <a href="<?php the_permalink() ?>">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail( 'thumbnail', array( 90, 60, 'class'=>'myThumbChildStyleMB' ) );
                } else  { ?>
                  <div class="newsNoImage myThumbChildStyleMB"></div>
                <?php } ?>
              </a>
            </div>
          </div>
          <!-- 新着情報・日付 -->
          <div class="newsDate forMB">
            <a href="<?php the_permalink() ?>">
              <?php the_time('Y年m月d日') ?>
            </a>
          </div>
        </div>
      <?php //endif; ?>

      <!-- 新着情報・記事タイトル／記事紹介 -->
      <div class="newsSet">
        <?php //if ( !$GB_MOBILE_FLAG ): ?>
          <a href="<?php the_permalink() ?>">
            <div class="newsTitle forPC">
              <font color='red'>■</font> <font color='blue'><u><?php the_title() ?></u> <i class="fas fa-link extLnkIcon"></i></i></font>
            </div>
            <div class="newsContext forPC">
              <?php echo mb_substr(get_the_excerpt(), 0, 45); echo '　　...' ; ?>
            </div>
          </a>
        <?php //else: ?>
          <a href="<?php the_permalink() ?>">
            <div class="newsTitle forMB">
              <font color='red'>■</font> <font color='blue'><u><?php echo mb_substr(the_title(), 0, 30) ?></u> <i class="fas fa-link extLnkIcon"></i></i></font>
            </div>
          </a>
        <?php //endif; ?>
      </div>
    </div>        <!-- class="sBysBlk" -->
  </div>
