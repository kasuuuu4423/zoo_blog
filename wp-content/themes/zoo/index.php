<?php get_header(); ?>
<main>
  <section class="main__wrap">
    <section class="main__cat">
      <div class="cat__item cat_state_active"><span class="all"><a href="<?php echo home_url(); ?>">ALL</a></span></div>
      <?php
        // パラメータを指定
        $args = array(
          // カテゴリー内の記事数順で指定
            'orderby' => 'count',
            // 降順で指定
            'order' => 'DESC'
        );
        $categories = get_categories( $args );
        $now = get_category($_GET['cat']);
        
        foreach( $categories as $category ){
          if($now->slug == $category->slug){
            echo '<div class="cat__item cat_state_active"><span class="' . $category->slug . '"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></span></div> ';
          }
          else{
            echo '<div class="cat__item"><span class="' . $category->slug . '"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></span></div> ';
          }
        }
      ?>
    </section>
    <section class="main__articles row">
      <?php
      $query__top = new WP_Query(
        array(
          'post_type'      => 'post',
          'posts_per_page' => 8,
          'order' => 'DESC',
          'paged' => $paged,
        )
      );
      if($query__top->have_posts()):
        while($query__top->have_posts()):
        $query__top->the_post();
        $post__cat =  get_the_category();
        $post__cat = $post__cat[0]->slug;
      ?>
      <div class="main__article">
        <div class="article__head <?php echo $post__cat; ?>">
          <div class="cat"><?php the_category(); ?></div>
          <div class="date"><?php the_date(); ?></div>
        </div>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      if ( function_exists( 'pagination' ) ) :
        pagination( $query__top->max_num_pages, get_query_var( 'paged' ) );
      endif;
      ?>
      <!-- <div class="pagination"><span class="num num_state_active"><a href="#">1</a></span><span class="num"><a href="#">2</a></span><span class="num"><a href="#">3</a></span><span class="num"><a href="#">4</a></span><span class="num"><a href="#">5</a></span><span class="next"><a href="#">Next</a></span></div> -->
    </section>
  </section>
  <section class="main__side">
    <div class="side__search">
      <h2>Search</h2>
      <?php get_search_form(true); ?>
    </div>
    <div class="side__author">
      <h2>Author</h2>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/img/profile.png" alt="プロフィール画像"></figure>
      <p><strong>Zoo<br></strong>札幌のデザイン系大学在学。<br>
        WEB、映像を中心にエンジニア・デザイナーとして活動、実務2年目です。<br>
        このブログは基本的にまだまだ拙い技術とエラーとの闘いの記録です。
      </p>
      <div class="author__links"><span><a href="https://shimizoo.com/">Portfolio</a></span><span><a href="https://mobile.twitter.com/zoo_shim"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="twitterのロゴ"></a></span><span><a href="https://www.facebook.com/yasushi.sihmizoo"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="facebookのロゴ"></a></span></div>
      <dl class="devEnv">
        <dt>開発環境:</dt>
        <dd>MacBookPro => MacOS Mojave 10.14.6</dd>
        <dd>DesktopPC => Windows10</dd>
        <dd>Editor => VisualStudioCode</dd>
      </dl>
    </div>
    <div class="side__popular">
      <h2>Popular</h2>
      <?php
      $args = array(
        'post_type'     => 'post',
        'display_count'  => 3,
        'period' => 7
      );
      $ranking_data = sga_ranking_get_date($args);
      foreach($ranking_data as $post_id):
        $post = get_post($post_id);
        setup_postdata($post);
      ?>
      <div class="popular__article <?php echo $pop__cat; ?>">
        <div class="popular__cat"><?php the_category(); ?></div>
        <div class="popular__date"><?php the_date(); ?></div>
        <h2 class="popular__title"><?php the_title(); ?></h2>
      </div>
      <?php
      endforeach;
      wp_reset_postdata(); 
      ?>
    </div>
    <div class="ad">
      <h2>Ad</h2>
    </div>
  </section>
</main>
<?php get_footer(); ?>