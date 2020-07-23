<?php
if (!is_front_page()) return;
?>

<div class="mail__block">
  <a class="mail_box transition" href="<?= get_permalink(35) ?>">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path class="transition" fill-rule="evenodd" clip-rule="evenodd" d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path class="transition" d="M22 6L12 13L2 6" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </a>
</div>