<?php

get_header();

$args = array(
  'post_type' => 'video',
  'posts_per_page' => 1,
  'order' => 'DESC',
);

$latest_video = theme_get_post($args);

if ($latest_video) {
  ?>
  <section class="relative pt-20">
    <img src="<?= theme_get_file($latest_video->image); ?>" class="absolute top-0 left-0 w-full h-full opacity-50 object-cover" />
    <div class="container-medium min-h-[80vh] flex items-end relative">
      <div class="py-40 grid gap-6">
        <div class="flex gap-2 items-center">
          <?php
          
            if($latest_video->taxonomies){
              foreach ($latest_video->taxonomies as $key => $tax) {
                ?>
                <a href="<?= get_term_link($tax); ?>" class="block text-zinc-900 bg-white text-sm py-1 px-4 border border-white rounded-sm">
                  <?= $tax->name; ?>
                </a>
                <?php
              }
            }

          ?>
          <div class="block py-1 px-4 border text-sm border-white rounded-sm">
            <?= $latest_video->fields['bx_play_video_duration']; ?>
          </div>
        </div>
        <div class="max-w-[40rem]">
          <h1 class="font-black leading-none text-[3rem] md:text-[5rem]"><?= $latest_video->post_title; ?></h1>
        </div>
        <div>
          <a class="btn bg-red-600 hover:bg-red-700 ease text-sm md:text-base px-8" href="<?= get_permalink($latest_video); ?>">
            <span class="hidden md:block">Mais informações</span>
            <span class="block md:hidden">Assistir</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php
  
  // dump_($latest_video);
}

$terms = get_terms(array(
    'taxonomy' => 'video_type',
    'hide_empty' => true,
));

if ($terms) {
  foreach ($terms as $term) {
    
    $args = [
      'post_type' => 'video',
      'tax_query' => [[
          'taxonomy' => 'video_type',
          'field' => 'slug',
          'terms' => $term,
        ]]
      ];
    
    $list = theme_get_posts($args);

    ?>
      <section class="relative overflow-hidden my-20 md:my-32">
        <div class="container-medium">
          <div class="pb-8">
            <a href="<?= get_term_link($term); ?>">
              <h2 class="font-bold text-2xl md:text-3xl text-red-600">
                <?= $term->name; ?>
              </h2>
            </a>
          </div>
          <div class="slide-video">
            <div class="owl-visible owl-carousel owl-theme">
              <?php

                foreach ($list as $key => $item) {
                  ?>
                    <div class="item">
                      <?php include("src/components/video-item.php"); ?>
                    </div>
                  <?php
                }

              ?>
            </div>
          </div>
        </div>
      </section>
    <?php
  }
}

get_footer();
?>