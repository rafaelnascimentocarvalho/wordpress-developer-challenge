<?php 

$custom_logo_id = get_theme_mod('custom_logo');

$terms = get_terms(array(
  'taxonomy' => 'video_type',
  'hide_empty' => true,
));

?>
<header class="fixed w-full top-0 left-0 bg-zinc-950 bg-opacity-90 md:bg-opacity-100 text-white z-[2]">
  <div class="container-medium py-4">
    <div class="flex flex-col md:flex-row justify-between gap-2 items-center">
      <div class="w-fit">
        <div class="max-w-[6rem]">
          <a href="<?= site_url(); ?>">
            <?php the_custom_logo(); ?>
          </a>
        </div>
      </div>
      <div class="w-full md:w-fit bg-zinc-950 fixed bottom-0 left-0 md:relative flex justify-center text-xs md:text-base items-center">
        <?php if ($terms): foreach ($terms as $term): ?>
          <a href="<?= get_term_link($term); ?>">
            <div class="p-4 font-semibold hover:text-red-600 ease">
              <?= $term->name; ?>
            </div>
          </a>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
</header>





