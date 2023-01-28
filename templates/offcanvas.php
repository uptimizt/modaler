<?php
$post = get_post($post);

?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-<?= $post->ID ?>" aria-labelledby="offcanvas-<?= $post->ID ?>">
  <div class="offcanvas-header">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?= apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
  </div>
</div>
