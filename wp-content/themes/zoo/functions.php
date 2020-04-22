<?php
function my_scripts() {
  wp_enqueue_style( 'common-style', get_template_directory_uri() . '/css/common.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'single', get_template_directory_uri() . '/css/single.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'top', get_template_directory_uri() . '/css/top.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/single.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function pagination( $pages, $paged, $range = 2, $show_only = false ) {

  $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
  $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

  //表示テキスト
  $text_first   = "« 最初へ";
  $text_before  = "Prev";
  $text_next    = "Next";
  $text_last    = "最後へ »";
  $tag = '<div class="pagination">';
  $endtag = '</div>';
  if ( $show_only && $pages === 1 ) {
      // １ページのみで表示設定が true の時
      echo $tag.'<span class="num num_state_active">1</span>'.$endtag;
      return;
  }

  if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

  if ( 1 !== $pages ) {
    echo $tag;
      //２ページ以上の時
      if ( $paged > 1 ) {
          // 「前へ」 の表示
          echo '<span class="next"><a href="', get_pagenum_link( $paged - 1 ) ,'">', $text_before ,'</a></span>';
      }
      for ( $i = 1; $i <= $pages; $i++ ) {
          if ( $i <= $paged + $range && $i >= $paged - $range ) {
              // $paged +- $range 以内であればページ番号を出力
              if ( $paged === $i ) {
                  echo '<span class="num num_state_active">', $i ,'</span>';
              }else{
                  echo '<span class="num"><a href="', get_pagenum_link( $i ) ,'">', $i ,'</a></span>';
              }
          }

      }
      if ( $paged < $pages ) {
          // 「次へ」 の表示
          echo '<span class="next"><a href="', get_pagenum_link( $paged + 1 ) ,'">', $text_next ,'</a></span>';
      }
      echo $endtag;
  }
}

function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
	}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);