<div class="row">
  <?php
    if (have_posts()){
      $count = 0;
      while (have_posts()){
        if ($count > 0 && $count % 3 == 0) { echo('</div><div class="row">'); }
        the_post();
        get_template_part( 'entry' );
        $count++;
      }
    }
  ?>
</div>
