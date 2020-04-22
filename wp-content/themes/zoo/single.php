<?php
get_header();
?>
<main>
  <div class="main__wrap_for_content_related">
    <section class="content">
      <?php
      $content__cat = '';
      if(have_posts()):
        while(have_posts()):
          the_post();
          $content__cat =  get_the_category();
          $content__cat = $content__cat[0]->slug;
      ?>
      <div class="content__wrap_for_cat_date">
        <section class="content__cat">
          <div class='content__item'>
            <?php the_category(); ?>
          </div>
        </section>
        <div class="content__date"><?php the_date(); ?></div>
      </div>
      <h1 class="content__title <?php echo $content__cat; ?>"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <div class="content__share"><span class="share__twitter"><img src="<?php echo get_template_directory_uri(); ?>/img/tweet.png" alt="tweetする"></span><span class="share__facebook"><img src="<?php echo get_template_directory_uri(); ?>/img/share.png" alt="facebookでシェアする"></span></div>
    </section>
    <?php
      endwhile;
    endif;
    ?>
    <section class="ad"></section>
    <section class="related">
    <?php
      $related__arg = array(
        'post_type' => 'post',
        'category_name' => $content__cat,
        'posts_per_page' => 3,
        'post__not_in' => $_GET['p'],
      );
      $related__query = new WP_Query($related__arg);
      if($related__query->have_posts()):
      ?>
      <div class="related__head">Related</div>
      <?php
        while($related__query->have_posts()):
          $related__query->the_post();
          $related__cat_slug = get_the_category();
          $related__cat_slug = $related__cat_slug[0]->slug;
      ?>
      <div class="related__article <?php echo $related__cat_slug; ?>">
        <div class="related__cat"><?php the_category(); ?></div>
        <div class="related__date"><?php the_date(); ?></div>
        <div class="related__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      </div>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </section>
  </div>
  <section class="index pc_only">
  </section>
</main>
<?php get_footer(); ?>