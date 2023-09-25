<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();
    $id = get_the_ID();
    $video = theme_get_post($id);
    ?>
      <section class="md:pt-10">
          <div class="container-medium grid gap-8 md:gap-16 py-24">
              <div class="w-full max-w-[56rem] mx-auto"> 
                <div class="flex gap-2 text-sm">
                  <?php
                  
                    if($video->taxonomies){
                      foreach ($video->taxonomies as $key => $tax) {
                        ?>
                        <a href="<?= get_term_link($tax); ?>" class="block text-zinc-900 bg-white py-1 px-4 border border-white rounded-sm">
                          <?= $tax->name; ?>
                        </a>
                        <?php
                      }
                    }

                  ?>
                  <div class="block py-1 px-4 border border-white rounded-sm">
                    <?= $video->fields['bx_play_video_duration']; ?>
                  </div>
                </div>
                <h1 class="font-bold text-3xl md:text-5xl my-4">
                  <?= the_title() ?>
                </h1>
              </div>
              <div class="aspect-video -mx-4 md:mx-0">
                <iframe class="w-full h-full" src="<?= theme_get_video_embed($video->fields['bx_play_video_ID']); ?>"></iframe>
              </div>
              <div class="max-w-[56rem] mx-auto md:text-lg">
                <?php the_content(); ?>
              </div>
          </div>
      </section>
    <?php
  endwhile;
endif;
      
get_footer();

?>
