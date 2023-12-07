// 
//【JavaScript】 
// ■ 各種イベント対応、コールバックノーティファイア登録
// ****************************************************************************

document.addEventListener( 'DOMContentLoaded', function() {

  //
  // ******************************************************************
  // ******************************************************************
  // 
  // 【Knowledge】＊＊＊＊＊
  // 【関数名】function(u)
  //  機能：ユーザーエージェントでスマホとタブレットを判定
  //  引数：ユーザーエージェント情報
  // ***************************************
  const _ua_iphone = (function(u){
    return {
      Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
        ||    u.indexOf("ipad") != -1
        ||   (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
        ||   (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
        ||    u.indexOf("kindle") != -1
        ||    u.indexOf("silk") != -1
        ||    u.indexOf("playbook") != -1,
      Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
        ||    u.indexOf("iphone") != -1
        ||    u.indexOf("ipod") != -1
        ||   (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
        ||   (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
        ||    u.indexOf("blackberry") != -1
    }
  })(window.navigator.userAgent.toLowerCase());

  // 
  // *****************************************************
  // Pallax効果有効化
  // *****************************************************
  // 
  //スマホとタブレットではなかったら読み込む
  // if(!_ua.Mobile && !_ua.Tablet){
  //   if ( document.querySelector( 'body' ).classList.contains( 'MOBILE' ) )  {
  //        document.querySelector( 'body' ).classList.remove  ( 'MOBILE' );
  //       //  document.querySelector( 'body' ).classList.add     ( 'PC'     );
  //   }
  // }

  // 
  let rellax    = new Rellax('.js-pallax');
  let rlxImgM   = new Rellax('.js-expMImage img',  {center:true, breakpoints:[576,768,1201]} );
  let rlxImgL   = new Rellax('.js-expLImage img',  {center:true} );
  let circleO   = new Rellax('.circleO', { speed:2, center:true} );

  function ChkArgumentsInURL() {

    // console.log( `\n >>>>> Enter ChkArgumentsInURL() >>>>> `);

    // 
    // URL 内引数の有無チェック
    if (1 < document.location.search.length) {
      var query      = document.location.search.substring(1);

      // 複数引数の分割
      var parameters = query.split('&');

      // 個別引数の格納
      var result = new Object();
      for (var i = 0; i < parameters.length; i++) {
        var element = parameters[i].split('=');

        // 引数名
        var paramName  = decodeURIComponent(element[0]);
        // 値
        var paramValue = decodeURIComponent(element[1]);

        // 配列格納
        result[paramName] = decodeURIComponent(paramValue);
      }
      return result;
    }

    // console.log( ` <<<<< Exit  ChkArgumentsInURL() <<<<< \n`);
    return null;
  }

  // ******************************************************************
  // ******************************************************************
  // 
  // 【関数名】window.addEventListener()
  //  機能：ロードイベント対応ページ表示
  //  引数：無し
  // ***************************************
  window.addEventListener( 'load', ()=>{

    // 
    // サイトメイン画面ロード時、パラメータをチェック
    // １．loadScreen: 定義時は、サイトロードスクリーンを非表示
    // ２．location  : サイトメイン画面内飛び先ＩＤ
    // 
    // console.log( `\n >>>>> Enter window.addEventListener( LOAD ) >>>>> `);

    // 
    // URL 内引数の取得
    var  param  = ChkArgumentsInURL();
    if ( param == null || param["loadScreen"] == undefined )  {
    } else  {
      // let locationId = param["location"];
      document.querySelector( 'body' ).classList.add( 'noLoadScreen' );
    }

    // console.log( ` >>>>> Start window.addEventListener( LOAD ) >>>>> `);
    // 
    //  クライアント画面サイズ認識：レスポンシヴ対応用
    if ( document.querySelector( 'body' ).classList.contains( 'MOBILE' ) )  {

      // console.log( "　　 >>>>> 【main.js】Mobile Device Size 認識！\n\n" );

      // window.alert( `【${window.performance.navigation.type}】` );

      // 
      // モバイル表示時、各セクション・内部要素表示位置算出
      calcEachElmPos( _ua_iphone );

    } else  {
      //PC処理
      // console.log( "　　 >>>>> PC Device Size 認識！\n\n" );
    }

    // 
    // Cookie 情報を連想配列に格納
    function getCookieArray(){
      var arr = new Array();
      if(document.cookie != ''){
          var tmp = document.cookie.split('; ');
          for(var i=0 ; i<tmp.length ; i++ )  {
              var data = tmp[i].split('=');
              arr[i] = decodeURIComponent(data[1]);
              // console.log( ` >>>>> ${data[0]} = ${arr[i]}` );
          }
      } else  {
        // console.log( ' !!!!! There is not any cookie data !!!!!' );
      }
      return arr;
    }

    // 
    // 取得 Cookie情報から「key」を指定して有無チェック
    let cookieInfo = getCookieArray();
    let ifg        = 0;
    // console.log( ` Cookie count : ${cookieInfo.length}` );      // [key,value] 
    for (let i=0 ; i<cookieInfo.length ; i++ )  {              //一つ一つ取り出して
        // console.log( ` Cookie value? ${cookieInfo[i]} ${ifg}` );      // [key,value] 
        if( cookieInfo[i] == 'LOADED'){   // 取り出したいkeyと合致したら
            ifg = 1;
            // console.log( ` Cookie is Exist! ${cookieInfo[i]} : ${ifg}` );      // [key,value] 
            break;
        }
    }

        
    // 
    // ■ 表示画像の事前取込み機能を実装
    // ? 余り意味ないかな？
    // 
    if ( document.getElementById("wpThemeDir") != null )  {
      var checkID = document.getElementById('wpThemeDir');
      var imgPath = checkID.getAttribute('themeDir');

      // alert(imgPath);  

      var preLoadImages = [
        imgPath + 'WaPlusCfg/Images/bgImage_SakuraS.jpg',
        imgPath + 'WaPlusCfg/Images/DSC_Ohtemachi.jpg',  
        imgPath + 'WaPlusCfg/Images/DSC_OhtemachiS.jpg',  
        imgPath + 'WaPlusCfg/Images/SunShine.jpg',  
        imgPath + 'WaPlusCfg/Images/ITWebSol/macOnDeskS.jpg',  
        imgPath + 'WaPlusCfg/Images/i-nekka/i-nekka-roses.jpg', 
        imgPath + 'WaPlusCfg/Images/ACestus/ACestus-500x350.jpg', 
        imgPath + 'WaPlusCfg/Images/ACestus/ACestus-bancok1M.jpg', 
        imgPath + 'WaPlusCfg/Images/ACestus/ACestus-bancok1Px.jpg', 
      ];
      for( i=0; i<preLoadImages.length; i++ )  {
        var img = document.createElement('img');
            img.src = preLoadImages[i];
      }
    }



    // //
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // // 2023/12/05
    // // ■ WaPlusTheme にてロード画面を表示するので、個別サイト定義ではロード画面を動作させない！
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // //
    // //「cookie」への当ページ表示状況の設定
    // // ・初期ロード時のみ、サイトロード画面を表示する
    // // ・一度表示した場合には、サイトロード画面を表示しない
    // // **************************************************
    // //
    // if( !ifg )  {
    //   // 
    //   // 当ページ読込み済みフラグ設定
    //   // 
    //   // 当ページ読込み済みフラグクッキー、有効期限設定（当日限り）
    //   let date = new Date(Date.now());    //  - 86400e3 ： 前日設定
    //       date = date.toUTCString();
    //   document.cookie = `load-unload=LOADED; Max-Age=300`;   // 300秒（5分）指定
      
    //   // 
    //   // サイトローディング画面の非表示
    //   // ★ サイトローディング画面・サイトメインページ制御は「dispTopPage()」関数にて実施
    //   // *********************************************************************
    //   document.querySelector( '.loading' ).classList.add( 'active' );

    // }

    // //
    // // サブページからの遷移の場合、サイトロード画面は非表示にしたい！
    // //「index.html」内スクリプトにて、
    // // 呼ばれた際の「URL内引数【loadScreen=no】」有無をチェックし、
    // // その記述が有れば、下記クラスが追加されて居る。
    // // 
    // if ( document.querySelector( 'body' ).classList.contains( 'noLoadScreen' ) )  {
    //      document.querySelector( 'body' ).classList.remove  ( 'noLoadScreen' );
    //   ifg = 1;
    // }

    // initSiteMainPG( ifg );
    initSiteMainPG( 1 );

    // // 
    // // ローディング中画面表示中のスクロールロックを解除
    // document.querySelector( '.bodyLock' ).classList.remove( 'bodyLock' );

    // // 
    // // サイトメイン画面の表示
    // document.querySelector( '.mainContents' ).classList.add( 'active' );
    // //
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // //

    // 
    // サブメニュー表示位置、サブメニュー上部消去領域位置の取得
    getPosSubM_SubMnuErase( 0 );

    // console.log( ` <<<<< Exit  window.addEventListener( LOAD ) <<<<< \n`);

  })
  // ******************************************************************
  // ******************************************************************

  // ******************************************************************
  // ******************************************************************
  // 
  // 【関数名】window.addEventListener()
  //  機能：画面サイズ変更イベント対応ページ表示
  //  引数：無し
  // ***************************************
  window.addEventListener('resize', ()=>{

    // 
    // サブメニュー表示位置、サブメニュー上部消去領域位置の取得
    getPosSubM_SubMnuErase( 0 );

  })
  // ******************************************************************
  // ******************************************************************

  // ******************************************************************
  // ******************************************************************
  // 
  // 【関数名】window.onscroll()
  //  機能：スクロールイベント対応処理
  //  引数：e / エレメント情報
  // ***************************************
  window.onscroll = function(e) {
    // console.log( ` >>>>> Start window.onscroll( e ) >>>>> `);

    
    // 
    // スクロールガイド、フッター部表示時は消去
    gsap.to('.scrollGuideArea', { //アニメーションしたい要素を指定
      opacity: 0,
      duration: 2,
      scrollTrigger: {
        trigger: 'footer',//アニメーションが始まるトリガーとなる要素
        start: 'top 60%', //アニメーションが始まる位置
        end:   'center 60%', //アニメーションが始まる位置
        scrub: true,
        // markers: true,
      }
    });

    // 
    // スクロールアップ対応
    if ( this.oldScroll > this.scrollY )  {
      // console.log("scrolling up");
      gsap.to('.scrollGuideArea', { //アニメーションしたい要素を指定
        // opacity: 0.9,
        opacity: 1,
        duration: 1.5,
        scrollTrigger: {
          trigger: '#OurInformation',//アニメーションが始まるトリガーとなる要素
          start: 'top center', //アニメーションが始まる位置
          // markers: true,
        }
      });

    // 
    // スクロールダウン対応
    } else  {
      // console.log("scrolling Down");
      // 
    }
    this.oldScroll = this.scrollY;
    
    // console.log( ` <<<<< Exit  window.onscroll( e ) <<<<< `);
  }
  // ******************************************************************
  // ******************************************************************

  // 
  // サブメニュー表示制御
  subMenusDispCtr( 0, document.querySelectorAll( '.navInter' ) );

  // 
  // サブメニュー表示位置、サブメニュー上部消去領域位置の取得
  getPosSubM_SubMnuErase( 0 );

  // 
  // メインページ内各セクション、アニメーション表示制御
  eachPageAnimeCtr();
    
  // ******************************************************************
  // ******************************************************************
  // ハンバーガーメニュー内、個別メニュークリックイベント対応ハンドラ
  // ******************************************************************
  　document.getElementById( 'hamburgerNav'        ).addEventListener( 'click', function() {
    document.getElementById( 'hamburgerMenuButton' ).classList.toggle( 'active' );
    document.getElementById( 'hamburgerNav'        ).classList.toggle( 'active' );
    document.getElementById( 'mask'                ).classList.toggle( 'active' );
    // console.log( "\n\n\n !!!!!!!!!! Hamburger Menu was CLICKED !!!!! \n\n\n");
  })

})

// 
// ****************************************************************************
// ****************************************************************************
// ****************************************************************************
// ****************************************************************************
// JavaScript 共通関数群
// １．initSiteMainPG()：サイトロード画面表示制御関数
// ２．dispTopPage()：サイト本体・トップページ表示
// ３．eachPageAnimeCtr()：メインページ内個別セクションアニメーション制御
// ４．calcEachElmPos()：モバイルデバイス時、メインページ構成要素表示位置算出
// ５．getParam()：URL 内 引数（LOAD画面表示非表示フラグ）取得関数
// ****************************************************************************
// ****************************************************************************
// ****************************************************************************
// ****************************************************************************

// ******************************************************************
// ******************************************************************
// ******************************************************************
// 参考【https://www.youtube.com/watch?v=L97u5Ip3fcs&ab_channel=CODELABO】 
// ******************************************************************
// 【関数名】initSiteMainPG( ifg )
//  機能：サイト・トップページ表示制御
//  引数：ifg (int) / in ：ページ表示制御
//        0 : 初期（サイトロード）画面、トップページ表示
//        1 : トップページのみ表示
// ******************************************************************
// ******************************************************************
const initSiteMainPG = ( ifg ) => {
  // console.log( `\n >>>>> Start initSiteMainPG( ${ifg} ) >>>>> `);

  if ( window.innerHeight > window.innerWidth )  {
    document.getElementById  ( "loadWPLogo"  ).style.width    = 10 + "vh";
    document.getElementById  ( "loadWPSpan1" ).style.fontSize =  5 + "vh";
    document.getElementById  ( "loadWPSpan2" ).style.fontSize =  5 + "vh";
    document.getElementById  ( "loadWPSpan3" ).style.fontSize =  5 + "vh";
    document.getElementById  ( "loadWPSpan4" ).style.fontSize =  5 + "vh";
    document.getElementById  ( "loadWPSpan5" ).style.fontSize =  5 + "vh";
    document.getElementById  ( "loadWPSpan6" ).style.fontSize =  5 + "vh";
    // console.log( `　　 ????? change LOAD Screen's LOGO and SAPN 【VH】 !!!!!` );
  } else  {
    document.getElementById  ( "loadWPLogo"  ).style.width    = 10 + "vw";
    document.getElementById  ( "loadWPSpan1" ).style.fontSize =  5 + "vw";
    document.getElementById  ( "loadWPSpan2" ).style.fontSize =  5 + "vw";
    document.getElementById  ( "loadWPSpan3" ).style.fontSize =  5 + "vw";
    document.getElementById  ( "loadWPSpan4" ).style.fontSize =  5 + "vw";
    document.getElementById  ( "loadWPSpan5" ).style.fontSize =  5 + "vw";
    document.getElementById  ( "loadWPSpan6" ).style.fontSize =  5 + "vw";
    // console.log( `　　 ????? change LOAD Screen's LOGO and SAPN 【VW】 !!!!!` );
  }

  if ( !ifg )  {

    // console.log( '\n★ サイトロード画面からの表示 ★\n\n' );

    gsap.timeline()
    // 幕開け（洎夫藍色 / さふらんいろ / Safuraniro）
    .to( '.bg', {
      scaleY: 1,
      duration: 0.5,    // 0.8
      ease: 'Power4.easeIn'
    })
    // グラデーション前座
    .to( '.gra-out', {
      y: '-100%',
      duration: 0.5,    // 0.3
      ease: 'Power1.easeOut'
    }, '-=0.4' )        // 前のアニメーションの終了する「0.4秒前」にアクションを開始する
    // グラデーションフィナーレ
    .to( '.gra-inner', {
      opacity: 1,
      duration: 1.0,    // ADD
      ease: 'Power1.easeOut'
    }, '-=0.4' )        // 前のアニメーションの終了する「0.4秒前」にアクションを開始する

    // 
    // 会社ロゴを上昇・位置移動しなから表示
    .to( 'h1 img', {
      opacity: 0.7,
      y: '-27%',      // '-10%'
      duration: 1.8,  // 1.8
      ease: 'power4.out'
    }, '-=0.4' )        // 前のアニメーションの終了する「0.4秒前」にアクションを開始する
    // 
    // 社名を回転・色変化・位置移動しなから表示
    .to( 'h1 span', {
      x: 0,
      y: 0,
      color: '#fff',
      opacity: 1,
      duration: 1.8,  // 1.8 (like2.5)
      rotationY: '0deg',
      stagger: {
        each: 0.1,
        from: 'random'
      }
    }, '-=0.4' )    // -=0.4 ☛ 前のアニメーションの終了する「0.4秒前」にアクションを開始する
    .to( '.bg', {
      opacity: 0,
      duration: 0.1,    // 0.5
      ease: 'Power1.easeOut',

      // 
      // サイト本体の表示
      // 
      onComplete: dispTopPage,
      onCompleteParams:[]
    }, '+=1' )

  } else  {

    // console.log( '\n★ サイト本体のみの表示機能 ★\n\n' );

    // 
    // サイト本体の表示
    // 
    dispTopPage();
    
  }

  // console.log( ` <<<<< Exit  initSiteMainPG( ${ifg} ) <<<<< \n`);
}

// ******************************************************************
// ******************************************************************
// ******************************************************************
// 【関数名】dispTopPage()
//  機能：サイト・トップページ表示
//  引数：無し
// ******************************************************************
// ******************************************************************
function dispTopPage() {
  // console.log( `\n >>>>> Start dispTopPage( トップページ表示 ) >>>>> `);

  // 
  // For mobile phone screen size.
  //*********************************************************/ 
  if ( document.querySelector( 'body' ).classList.contains( 'MOBILE' ) )  {

    // window.alert( " 【dispTopPage()】Mobile Size recognized ! " );

    gsap.timeline()
    // 
    // サイト本体の表示
    // 
    // .to( '.mainContents', {
    //   opacity: 1,
    //   y: 0,
    //   duration: 0.8,    // 0.8
    //   // ease: 'Power1.easeOut'
    // })
    // 
    // ★ 2022/01/20
    // 「【active】クラス設定表示」からの、
    // 「【active】クラス削除」による非表示に変更
    // 


    // //
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // // 2023/12/05
    // // ■ WaPlusTheme にてヘッダー部を制御するので、個別サイト定義ではヘッダー部を制御させない！
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // //
    // .to( 'header', {
    //   opacity: 0.9,
    //   y: 0,
    //   duration: 0.8,    // 1.0
    //   ease: 'Power1.easeOut'
    // })
    
    // **********************************************************
    // **********************************************************
    // 21-1122
    // **********************************************************
    // **********************************************************
    // 
    // 大見出し「We will change charms be more!」
    // を、回転・色変化・位置移動しなから表示
    .to( '.mbLine span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 0.8 (like2.5)
      rotationY: '0deg',
      stagger: {
        each: 0.1
        // from: 'random'
      }
    }, '-=0.5' )

    // 
    // キャッチコピー表示
    .to( '.cthCopy', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 3.0,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      }
    }, '-=1.0' )
    // 
    // 理念・イメージ画像表示
    .to( '.msgDetailMB', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 3.0,  // 1.8 (like2.5)
    }, "<0" )
    // 
    // 理念・イメージ画像表示
    .to( '.ourImage', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 2.5,  // 1.8 (like2.5)
    }, '<0' )
    // **********************************************************
    // **********************************************************
    // **********************************************************
    // **********************************************************
    // **********************************************************

    // 
    // 理念・イメージ画像表示
    .to( '.scrollGuideArea', {
      x: 0,
      y: 0,
      opacity: 0.9,
      duration: 5.0,
    }, '<1' )

  // 
  // For PC screen size.
  //*********************************************************/ 
  } else  {

    // window.alert( " 【dispTopPage()】PC Size recognized ! " );

    gsap.timeline()

    // //
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // // 2023/12/05
    // // ■ WaPlusTheme にてヘッダー部を制御するので、個別サイト定義ではヘッダー部を制御させない！
    // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
    // //
    // 
    // .to( 'header', {
    //   opacity: 0.9,
    //   y: 0,
    //   duration: 0.8,    // 1.0
    //   ease: 'Power1.easeOut'
    // })
    
    // **********************************************************
    // **********************************************************
    // 21-1122
    // **********************************************************
    // **********************************************************
    // 
    // 大見出し「We will change charms be more!」
    // を、回転・色変化・位置移動しなから表示
    .to( '.pcLine span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      rotationY: '0deg',
      stagger: {
        each: 0.1
        // from: 'random'
      }
    }, '-=0.5' )

    // 
    // キャッチコピー「ひと価値添えて」表示
    .to( '.cthCopy', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 3.0,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      }
    }, '-=1.8' )
    // 
    // 理念・説明文章「フィルタを透過・・・」表示
    .to( '.msgDetailPC', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 3.0,  // 1.8 (like2.5)
    }, "<0" )
    // 
    // 理念「櫻画像」・イメージ画像表示
    .to( '.ourImage', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 2.5,  // 1.8 (like2.5)
    }, '<0' )
    // **********************************************************
    // **********************************************************
    // **********************************************************
    // **********************************************************
    // **********************************************************

    // 
    // 縦書き・スクロールガイド表示
    .to( '.scrollGuideArea', {
      x: 0,
      y: 0,
      opacity: 0.9,
      duration: 5.0,
    }, '<1' )

  }


  // //
  // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
  // // 2023/12/05
  // // ■ WaPlusTheme にてロード画面を表示するので、個別サイト定義ではロード画面を動作させない！
  // // ＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
  // //
  // // ★ ローディング中画面表示中のスクロールロックを解除
  // // *********************************************************************
  // document.querySelector( '.bodyLock' ).classList.remove( 'bodyLock' );
  // //

  // // 
  // // ★ サイトローディング画面の非表示
  // // *********************************************************************
  // if ( document.querySelector( '.loading' ).classList.contains( 'active' ) )  {
  //      document.querySelector( '.loading' ).classList.remove  ( 'active' );
  // }

  // // 
  // // ★ サイトメイン画面の表示
  // // *********************************************************************
  // document.querySelector( '.mainContents' ).classList.add( 'active' );

  // console.log( ` <<<<< Exit  dispTopPage() <<<<< \n`);
}

// ******************************************************************
// ******************************************************************
// ******************************************************************
// 【関数名】eachPageAnimeCtr()
//  機能：メインページ内各セクション、アニメーション表示制御
//  引数：無し
// ******************************************************************
// ******************************************************************
function eachPageAnimeCtr() {

  // console.log( `\n >>>>> Enter eachPageAnimeCtr( メインページ内アニメーション表示 ) >>>>> `);

  // 
  // For mobile phone screen size.
  // クライアント画面サイズ認識：レスポンシヴ対応用
  //*********************************************************/ 
  if ( document.querySelector( 'body' ).classList.contains( 'MOBILE' ) )  {

    // window.alert( " 【eachPageAnimaCtr()】Mobile Size recognized ! " );

    // 
    // *****************************************************
    // *****************************************************
    // スクロール対応メッセージ表示アニメーション
    // *****************************************************
    // *****************************************************
    // 【２：サービスのご案内】
    // *****************************************************
    let svTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurServices',
        start: 'top 90%',
        // markers: true,
      }
    });
    // *****************************************************
    // 
    // サービスのご案内ページ・タイトル表示
    svTL.to( '.serviceTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    svTL.to('.serviceTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, "-=0.5" )
    svTL.to( '.serviceTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    // 
    // サービス種別１件目「経営支援」表示
    svTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#svcKindMB1',
        start: 'top 90%',
        // markers: true,
      }
    });
    svTL.to('#svcKindMB1', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );
    // 
    // サービス種別２件目「IT WEB Sol」表示
    svTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#svcKindMB2',
        start: 'top 90%',
        // markers: true,
      }
    });
    svTL.to('#svcKindMB2', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );
    // 
    // サービス種別３件目「オリジナル商品販売」表示
    svTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#svcKindMB3',
        start: 'top 90%',
        // markers: true,
      }
    });
    svTL.to('#svcKindMB3', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    /******************************/
    // 縦方向アニメーションバー
    /******************************/
    gsap.set( '.vtclBar1', {
      y: -500,
    })
    gsap.to( '.vtclBar1', {
      y: 0,
      opacity: 1,
      duration: 2,    // 0.8
      // ease: 'Power4.easeIn'
      scrollTrigger: {
        trigger: '#svcKindMB1',
        start: 'center 80%',         // top 70%
        end: 'center 20%',         // 70% 40%
        toggleActions: "play reverse play reverse",
        // markers: true,
      },
    })
    gsap.set( '.vtclBar2', {
      y: -500,
    })
    gsap.to( '.vtclBar2', {
      y: 0,
      opacity: 1,
      duration: 2,    // 0.8
      // ease: 'Power4.easeIn'
      scrollTrigger: {
        trigger: '#svcKindMB2',
        start: 'center 80%',         // top 70%
        end: 'center 20%',         // 70% 40%
        toggleActions: "play reverse play reverse",
        // markers: true,
      },
    })
    gsap.set( '.vtclBar3', {
      y: -500,
    })
    gsap.to( '.vtclBar3', {
      y: 0,
      opacity: 1,
      duration: 2,    // 0.8
      // ease: 'Power4.easeIn'
      scrollTrigger: {
        trigger: '#svcKindMB3',
        start: 'center 80%',         // top 70%
        end: 'center 20%',         // 70% 40%
        toggleActions: "play reverse play reverse",
        // markers: true,
      },
    })

    // 
    // *****************************************************
    // *****************************************************
    // 【３：事業活動・経営支援】
    // *****************************************************
    let pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurPerformance',
        start: 'top 90%',
        // markers: true,
      }
    });
    // *****************************************************
    // 
    // 経営支援セクション「タイトル・込める思い・・・」表示
    pfTL.to( '.performTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    pfTL.to('.performTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, '-=0.5' )
    pfTL.to( '.performTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    // 
    // 経営支援セクション「事業種別中見出し・Ⅰ経営支援」表示
    pfTL.to( '#bizKindMB1', {
      opacity: 1,
      duration: 3,
    }, '<0' )

    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#pfmTitleMB1',
        start: 'center 40%',
        // markers: true,
      }
    });
    // 
    // 経営支援セクション「事業説明詳細文章・実現したい」表示
    pfTL.to('#msgDtlPfmMB1', {
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    // 
    // *****************************************************
    // *****************************************************
    // 【４：事業活動・IT WEB ソリューション】
    // *****************************************************
    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurPerformanceITWEBSol',
        start: 'top 70%',
        // markers: true,
      }
    });
    // *****************************************************
    pfTL.to( '#bizKindMB2', {
      opacity: 1,
      duration: 3,
    }, '<0' )

    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#bizKindMB2',
        start: 'center 40%',
        // markers: true,
      }
    });
    pfTL.to('#msgDtlPfmMB2', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    // 
    // *****************************************************
    // *****************************************************
    // 【５：事業活動・i-nekka 大人の素敵雑貨 ソリューション】
    // *****************************************************
    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurPerformanceInekka',
        start: 'top 70%',
        // markers: true,
      }
    });
    // *****************************************************
    pfTL.to( '#bizKindMB3', {
      opacity: 1,
      duration: 3,
    }, '<0' )

    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#bizKindMB3',
        start: 'center 40%',
        // markers: true,
      }
    });
    pfTL.to('#msgDtlPfmMB3', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    // 
    // *****************************************************
    // *****************************************************
    // 【６：事業活動・Aphrodite Cestus クロコダイル ソリューション】
    // *****************************************************
    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurPerformanceACestus',
        start: 'top 70%',
        // markers: true,
      }
    });
    // *****************************************************
    pfTL.to( '#bizKindMB4', {
      opacity: 1,
      duration: 3,
    }, '<0' )

    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#bizKindMB4',
        start: 'center 40%',
        // markers: true,
      }
    });
    pfTL.to('#msgDtlPfmMB4', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    // 
    // *****************************************************
    // *****************************************************
    // 【７：お知らせ・ブログ セクション】
    // *****************************************************
    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurInformation',
        start: 'top 90%',
        // markers: true,
      }
    });
    // *****************************************************
    pfTL.to( '.informTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    pfTL.to('.informTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, '-=0.5' )
    pfTL.to( '.informTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    pfTL.to( '#bizKindMB5', {
      opacity: 1,
      duration: 3,
    }, '<0' )

    pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#pfmTitleMB5',
        start: 'center 40%',
        // markers: true,
      }
    });
    pfTL.to('.msgDetailInform', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );


  // 
  // For PC screen size.
  //*********************************************************/ 
  } else  {

    // window.alert( " 【eachPageAnimaCtr()】PC Size recognized ! " );

    // 
    // *****************************************************
    // *****************************************************
    // スクロール対応メッセージ表示アニメーション
    // *****************************************************
    // *****************************************************
    // 【２：サービスのご案内】
    // *****************************************************
    let svTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurServices',
        start: 'top 90%',
        // markers: true,
      }
    });
    // *****************************************************
    svTL.to( '.serviceTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    svTL.to('.serviceTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, "-=0.5" )
    svTL.to( '.serviceTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    svTL.to('.msgDetailService', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );


    /******************************/
    // 縦方向アニメーションバー
    /******************************/
    gsap.set( '.vtclBar', {
      y: -500,
    })
    gsap.to( '.vtclBar', {
      y: 0,
      opacity: 1,
      duration: 2,    // 0.8
      // ease: 'Power4.easeIn'
      scrollTrigger: {
        trigger: '#js-vtclBar',
        start: '60% 90%',         // top 70%
        end: '40% 30%',         // 30% 70% 40%
        // start: 'top 70%',
        // end: '70% 40%',         // 70% 30%
        toggleActions: "play reverse play reverse",
        // markers: true,
      },
    })

    // 
    // *****************************************************
    // *****************************************************
    // 【３：事業活動】
    // *****************************************************
    let pfTL = gsap.timeline({
      scrollTrigger: {
        trigger: '#OurPerformance',
        start: 'top 90%',
        // markers: true,
      }
    });
    // *****************************************************
    pfTL.to( '.performTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    pfTL.to('.performTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, '-=0.5' )
    pfTL.to( '.performTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    pfTL.to( '.bizKind', {
      opacity: 1,
      duration: 3,
    }, '<0' )
    pfTL.to('.msgDetailPerform', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );

    // 
    // *****************************************************
    // *****************************************************
    // 【４：ご案内・ブログ】
    // *****************************************************
    let ifTL = gsap.timeline({
      scrollTrigger: {
        // **********************************************
        // ■ 横スクロールを入れた事による問題・・・ 
        // 　１．GSAP.ScrollTriger
        // 　２．Pallax効果用ライブラリ「rellax」は、
        // 　※　マウススクロール量をみて動作をさせて居る様子。
        // 　　　従って、横スクロールの画面を「途中に挿入」すると、
        // 　　　それ以降のセクションにて設定した、上記２機能を、
        // 　　　ScrollTriggerの設定位置、
        // 　　　Pallax効果対象画面の位置等を、
        // 　　【微妙にずらす必要】が生じた・・・
        // **********************************************
        // trigger: '#OurInformation',
        // start: 'top 90%',
        // **********************************************
        trigger: '#footerSection',
        // start: '99% 80%',
        // end: '99% 40%',
        start: 'top 30%',
        end:   'top top',
        // **********************************************
        // markers: true,
      }
    });
    // *****************************************************
    ifTL.to( '.informTitle .secHrzLineL', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    })
    ifTL.to('.informTitle .line span', {
      x: 0,
      y: 0,
      color: '#665A1A',
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
      stagger: {
        each: 0.1
      },
    }, '-=0.5' )
    ifTL.to( '.informTitle .secHrzLineR', {
      x: 0,
      y: 0,
      opacity: 1,
      duration: 0.8,  // 1.8 (like2.5)
    }, '-=0.5' )
    ifTL.to( '.infoKind', {
      opacity: 1,
      duration: 3,
    }, '<0' )
    ifTL.to('.msgDetailInform', { //アニメーションしたい要素を指定
      x: 0,
      y: 0,
      opacity: 1.0,
      duration: 2.0,
    }, '<0' );
  }
  // console.log( ` <<<<< Exit  eachPageAnimeCtr( メインページ内アニメーション表示 ) <<<<< \n`);
}

// ******************************************************************
// ******************************************************************
// ******************************************************************
// 【関数名】calcEachElmPOs()
//  機能：モバイルデバイス時、メインページ構成要素表示位置算出
//    ※　ＰＣ表示（横スクロール）時は「position:relative/absolute」にて表示位置を決めている。
//    　　その為に、モバイル表示時：各要素高に応じた自然なセクション高と要素配置にできない。
//    　　対策として、
//    　　各セクションのページ上部からのＹ位置を（各包含要素の高さと間隔を確認）算出
//    　　
//  引数：無し
// ******************************************************************
// ******************************************************************
function calcEachElmPos( _ua_iphone ) {

  // console.log( "\n >>>>> Start calcEachElmPos() >>>>> " );

  // 
  // 各要素ID名格納配列
  // 
  // 【３：事業活動・経営支援】
  // 【７：お知らせ・ブログ セクション】
  const secElms = {
    // セクション名（ページトップからの位置取得）
    sName  : ["OurPerformance","OurPerformanceITWEBSol","OurPerformanceInekka","OurPerformanceACestus","OurInformation"],
    // セクション共通タイトル
    sTitle : ["pfmTitleMB1","pfmTitleMB2","pfmTitleMB3","pfmTitleMB4","pfmTitleMB5"],
    // 事業種別
    bzKind : ["bizKindMB1","bizKindMB2","bizKindMB3","bizKindMB4","bizKindMB5"],
    // 事業説明イメージ画像
    expImg : ["expImgMB1","expImgMB2","expImgMB3","expImgMB4","expImgMB5"],
    // 事業説明詳細文章
    dtlMsg : ["msgDtlPfmMB1","msgDtlPfmMB2","msgDtlPfmMB3","msgDtlPfmMB4","msgDtlPfmMB5"],
    // 事業説明画像３枚セット
    pkgImg : ["addImgPkgMB1","addImgPkgMB2","addImgPkgMB3","addImgPkgMB4","addImgPkgMB5"],
    // ブランドイメージ円形画像
    cleImg : ["circleOMB1","circleOMB2","circleOMB3","circleOMB4","circleOMB5"],
  }

  // 共通設定値
  const topBottomSpace = 80;
  const intervalSpace  = 50;

  // セクション指定ＩＤ　０・１・２・３・４
  let pfmSecPos;

  // セクション内各要素の高さ取得
  // セクション共通タイトル　「事業支援／ブログ」　０・３・４
  let pfmTtlHgt;
  // 事業種別　　　　　　　　「事業支援／IT WEK／I-nekka／ACestus／ブログ」　０・１・２・３・４
  let bizKndHgt;
  // 事業説明イメージ画像　　「事業支援／IT WEBII-nekka／ACestus／ブログ」　０・１・２・３・４
  let expImgHgt;
  // 事業説明詳細文章　　　　「事業支援／IT WEB／I-nekka／ACestus／ブログ」　０・１・２・３・４
  let dtlMsgHgt;
  // 事業説明画像３枚セット　「事業支援／IT WEB／I-nekka／ACestus」　１・２・３
  let addImgHgt;
  // ブランドイメージ円形画像「事業支援／I-nekka／ACestus」　０・２・３
  let circleHgt;

  let iWrk;

  for( i=0 ; i<5 ; i++ ) {
    // console.log( `     ? for loop index[${i}] `);

    pfmTtlHgt = 0;
    bizKndHgt = 0;
    expImgHgt = 0;
    dtlMsgHgt = 0;
    addImgHgt = 0;
    circleHgt = 0;

    // 
    // *****************************************************
    // *****************************************************
    // 各セクション・モバイル表示時、先頭からの位置取得　０・１・２・３・４
    // *****************************************************
    // 
    // 【Knowledge】＊＊＊＊＊
    // 【document.getElementById(～).getBoundingClientRect().top】
    // 「現在の表示【Window左上原点】からの距離」を取得するので、
    // 「取得した値にスクロール量【window.pageYOffset】を加算」しないと、ページ構成上の位置を算出出来ない
    // 
    // 【参考：https://ja.javascript.info/coordinates】
    // 
    pfmSecPos = document.getElementById( secElms[ "sName"][i] ).getBoundingClientRect().top + window.pageYOffset;
    // console.log( `\n\n >>>>> 「${secElms["sName"][i]}」 セクション位置【${pfmSecPos}】` );

    // セクション内各要素の高さ取得
    // セクション共通タイトル「事業支援／ブログ」　０・４
    if ( i===0 || i===4 )  {
      pfmTtlHgt = document.getElementById( secElms["sTitle"][i] ).clientHeight;
      // console.log( `》「${secElms["sTitle"][i]}」 タイトル　高さ【${pfmTtlHgt}】` );
    }

    // 事業種別　　　　　　　　「事業支援／IT WEK／I-nekka／ACestus／ブログ」　０・１・２・３・４
    bizKndHgt = document.getElementById( secElms["bzKind"][i] ).clientHeight;
    // console.log( `》「${secElms["bzKind"][i]}」 事業種別・中見出し　高さ【${bizKndHgt}】` );

    // 事業説明イメージ画像　　「事業支援／IT WEBII-nekka／ACestus／ブログ」　０・１・２・３・４
    expImgHgt = document.getElementById( secElms["expImg"][i] ).clientHeight;
    // console.log( `》「${secElms["expImg"][i]}」 説明画像　高さ【${expImgHgt}】` );
    
    // 事業説明詳細文章　　　　「事業支援／IT WEB／I-nekka／ACestus／ブログ」　０・１・２・３・４
    dtlMsgHgt = document.getElementById( secElms["dtlMsg"][i] ).clientHeight;
    // console.log( `》「${secElms["dtlMsg"][i]}」 説明文章　高さ【${dtlMsgHgt}】` );

    // 事業説明画像３枚セット　「事業支援／IT WEB／I-nekka／ACestus」　１・２・３
    if ( i<4 )  {
      addImgHgt = document.getElementById( secElms["pkgImg"][i] ).clientHeight;
      // console.log( `》「${secElms["pkgImg"][i]}」 追加画像　高さ【${addImgHgt}】` );
    }
    // ブランドイメージ円形画像「事業支援／I-nekka／ACestus」　０・２・３
    if ( i===0 || i===2 || i===3 )  {
      circleHgt = document.getElementById( secElms["cleImg"][i] ).clientHeight;
      // console.log( `》「${secElms["cleImg"][i]}」 円形画像　高さ【${circleHgt}】` );
    }

    // console.log( ` >>>>> IT WEB Sol 追加画像　高さ【${addImgHgt}】` );

    // 
    // 当該セクション、高さ設定
    let iWrk = topBottomSpace + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + intervalSpace + addImgHgt + topBottomSpace;
    if ( i===0 )  { iWrk += 30; }
    document.getElementById( secElms["sName"][i] ).style.height = iWrk + "px";
    // console.log( `    ? each Section HEIGHT[ ${iWrk + "px"} ]`)

    // 
    // 各要素、先頭位置設定
    // セクション共通タイトル「事業支援／ブログ」　０・４
    if ( i===0 || i===4 )  {
      document.getElementById( secElms["sTitle"][i] ).style.top = pfmSecPos + topBottomSpace + "px"; // ourPerformanceMB1.scss にて定義済み
    }
    // 事業種別　　　　　　　　「事業支援／IT WEK／I-nekka／ACestus／ブログ」　０・１・２・３・４
    document.getElementById( secElms["bzKind"][i] ).style.top = pfmSecPos + topBottomSpace + pfmTtlHgt + "px"; // ourPerformanceMB1.scss にて定義済み

    // 事業説明イメージ画像　　「事業支援／IT WEBII-nekka／ACestus／ブログ」　０・１・２・３
    document.getElementById( secElms["expImg"][i] ).style.top = pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + "px";
    // console.log( `》★「${secElms["expImg"][i]}」 説明画像　位置【${pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + "px"}】` );

    // 事業説明詳細文章　　　　「事業支援／IT WEB／I-nekka／ACestus／ブログ」　０・１・２・３・４
    // document.getElementById( secElms["dtlMsg"][i] ).style.top = pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + "px";
    // console.log( `》★「${secElms["dtlMsg"][i]}」 説明文章　位置【${pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + "px"}】` );
    document.getElementById( secElms["dtlMsg"][i] ).style.top = topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + "px";
    // console.log( `》★「${secElms["dtlMsg"][i]}」 説明文章　位置【${topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + "px"}】` );

    // 事業説明画像３枚セット　「事業支援／IT WEB／I-nekka／ACestus」　１・２・３
    if ( i<4 )  {
      // document.getElementById( secElms["pkgImg"][i] ).style.top = pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + intervalSpace + "px";
      document.getElementById( secElms["pkgImg"][i] ).style.top = topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + intervalSpace + "px";
      // console.log( `》★「${secElms["pkgImg"][i]}」 セット画像　位置【${topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + intervalSpace + "px"}】` );
    }

    // 円形補助説明画像位置
    if ( i===0 || i===2 || i===3 )  {
      // 
      // 本当はこっちで、正しい位置に表示される・・・が、「pallax効果」を入れると、位置がずれる
      // iWrk = pfmSecPos + topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt - circleHgt;
      iWrk = topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt - 100;
      switch( i )  {
        case 2:
          iWrk = topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + 200;
          break;
        case 3:
          iWrk = topBottomSpace + pfmTtlHgt + bizKndHgt + intervalSpace + expImgHgt + intervalSpace + dtlMsgHgt + 400;
          break;
      }
      document.getElementById( secElms["cleImg"][i] ).style.top = iWrk + "px";
      // console.log( `》★「${secElms["cleImg"][i]}」 円形画像　位置【${iWrk + "px"}】` );

      // if ( ( i===2 || i===3 ) && _ua_iphone.Mobile )  {
      //   // 
      //   // iPhone だったら、高さを増す！
      //   // なんで iPhone だと、表示位置指定が効かないのか？
      //   // 
      //   document.getElementById( secElms["cleImg"][i] ).style.top = iWrk + 500 + "px";
      //   // window.alert( ` recognized iPhone !【${secElms["cleImg"][i]} : ${ iWrk + "px "} 】`);
      // } else  {
      //   // window.alert( ` NOT recognized iPhone-A !【${secElms["cleImg"][i]} : ${ iWrk + "px "} 】`);
      // }
      // console.log( ` >>>>> 「${secElms["cleImg"][i]}」 円形画像　高さ【${iWrk}】` );
    }
  }

  // console.log( " <<<<< Exit  calcEachElmPos() <<<<< \n" );
}

// 
// ********************************************************
// ********************************************************
// 
// 【難読化】JavaScript 難読化ツール利用
//    参照　：https://uxbear.me/obfuscator/
//    ツール：https://obfuscator.io/
// 
// ********************************************************
// ********************************************************
// 