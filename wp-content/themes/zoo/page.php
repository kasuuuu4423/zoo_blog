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
      <h1 class="content__title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </section>
    <?php
      endwhile;
    endif;
    ?>
    <section class="ad"></section>
  </div>
  <section class="index pc_only">
  </section>
</main>
<?php get_footer(); ?>