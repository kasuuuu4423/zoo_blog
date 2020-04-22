<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# undefined: http://ogp.me/ns/undefined#">
    <script>
      (function(d) {  var config = {
          kitId: 'lep2ido',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
  <?php wp_head(); ?>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <?php if(is_home()): ?>
        <h1 class="header__logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="ロゴ">
          </a>
        </h1>
        <?php else: ?>
        <div class="header__logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="ロゴ">
          </a>
        </div>
        <?php endif; ?>
        <div class="header__links"><span><a href="https://shimizoo.com/" target="_blank">Portfolio</a></span><span><a href="https://mobile.twitter.com/zoo_shim" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="twitterのロゴ"></a></span><span><a href="https://www.facebook.com/yasushi.sihmizoo" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="facebookのロゴ"></a></span></div>
      </header>