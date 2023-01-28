<?php

if (empty($args['id'])) {
  return;
}

$post = get_post($args['id']);

if (empty($post)) {
  return;
}

$anchor = $args['a'] ?? null;
if ($anchor) {
  $data = explode('-', $anchor);
  if (isset($data[1])) {
    $post = get_post($data[1]);
  }
  // var_dump($data);
}
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

<script>

  document.addEventListener('DOMContentLoaded', function () {

    document.addEventListener("click", e => {
      const origin = e.target.closest("a");
      if (origin) {
        if (origin.hash) {
          showModal(origin.hash);
        }
      }
    });
    if (window.location.hash) {
      var hash = window.location.hash;
      showModal(hash)
    }

    function showModal(hash) {
      var modal = document.querySelector(hash);
      if (modal == undefined) {
        return;
      }
      let myModal = new Modal(modal);
      myModal.show();
    }


  }, false);


</script>
