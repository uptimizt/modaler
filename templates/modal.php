<?php

$post = get_post($post);
?>


<!-- Modal -->
<div class="modal fade" id="modal-<?= $post->ID ?>" tabindex="-1" aria-labelledby="modal-<?= $post->ID ?>"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <?= apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
      </div>
    </div>
  </div>
</div>
