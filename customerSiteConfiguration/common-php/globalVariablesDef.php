<?php

  // 
  // デバイスチェック：モバイル・PC
  require_once( get_template_directory() . '/customerSiteConfiguration/common-php/Mobile_Check.php'    );

	//   
	// グローバル変数定義ファイル
  require_once( get_template_directory() . '/customerSiteConfiguration/common-php/globalVariables.php' );

  // 
  // ■ クライアントデバイス種別判定フラグ
  // 
  // WordPress関数に因る判定
	// $GB_MOBILE_FLAG = mobileCheck();
  // 
  // タブレットはPC扱い・・・
    	 $GB_MOBILE_FLAG = mobileCheck_Mobile_Detect();
  if ( $GB_MOBILE_FLAG )  { $GB_DEVICE_KIND = "MOBILE"; }
  else                    { $GB_DEVICE_KIND = "PC";     }

	$GB_RELLAX_FLAG = rellaxExecFlg();

  // echo "\n\n\n >>>>> globalVariablesDef.php [\$GB_pageKind] ☛【". $GB_pageKind . "】\n";

  // if ( $GB_RELLAX_FLAG )  {
  //   echo "\n\n\n >>>>> globalVariablesDef.php [\$GB_RELLAX_FLAG] ☛【TRUE】\n";
  // } else  {
  //   echo "\n\n\n >>>>> globalVariablesDef.php [\$GB_RELLAX_FLAG] ☛【FALSE】\n";
  // }

  // 
  // 「カテゴリ：ＩＤ」
  $DEF_catID_news  = 3;
  $DEF_catID_blog  = 4;
  $DEF_catID_tech  = 5;
  $DEF_catID_howTo = 6;
  // 「カテゴリ：スラッグ」
  $DEF_catName_news  = "news";
  $DEF_catName_blog  = "blog";
  $DEF_catName_tech  = "tech";
  $DEF_catName_howTo = "howto";

  // 
  // 表示中投稿年月
  $GB_postYear  = -99;
  $GB_postMonth = -99;

  // echo " >>>>> called globalVariableDef !!!!!";
?>