<div class="">
  <a href="<?= get_permalink($item) ?>">
    <img src="<?= theme_get_file($item->image); ?>" class="w-full rounded-sm" />
  </a>
  <div class="grid gap-2 pt-4">
    <div>
      <div class="inline-block px-8 text-sm border border-white rounded-sm">
        <?= $item->fields['bx_play_video_duration']; ?>
      </div>
    </div>
    <a href="<?= get_permalink($item) ?>">
      <h3 class="font-bold text-[1.25rem] md:text-[1.7rem] leading-none">
        <?= $item->post_title; ?>
      </h3>
    </a>
  </div>
</div>