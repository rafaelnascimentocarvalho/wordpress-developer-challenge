<?php

get_header();

$term = get_queried_object();

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
<section class="py-24 md:py-32">
  <div class="container-medium md:pt-16">
    <div class="grid md:flex">
      <div class="w-full">
        <h1 class="text-red-600 font-bold text-3xl mb-6">
          <?= $term->name ?>
        </h1>
        <div class="md:pr-32">
          <?= $term->description ?>
        </div>
      </div>
      <div class="w-full pt-6">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-16">
        <?php foreach ($list as $key => $item) include("src/components/video-item.php"); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php

get_footer();

?>
