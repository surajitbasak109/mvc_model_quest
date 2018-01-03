<section id="contentBody" class="site-content">
  <form id="check_user_form" class="check-user-form" action="<?php echo URL . "home/ajax_req" ?>" method="post" autocomplete="off">
    <p>
      <input type="hidden" name="http_ref" value="<?php echo URL . 'home/check_user' ?>">
    </p>
    <div class="form-group">
      <label for="username">Username: </label>
      <input type="text" name="username" value="" id="username" required="required">
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="text" name="email" value="" id="email" required="required">
    </div>
    <div class="form-group">
      <input type="submit" name="check_user" value="Check Username/Email" id="check_user">
      <p class="advice">
      <?php
      if (isset( $data['user']['username_count'] ) && isset( $data['user']['email_count'] ) ) {
        if ( $data['user']['username_count'] > 0) {
          echo "<span class=\"result\">Username already exist.</span><br>";
          if ( $data['user']['email_count'] > 0 ) {
            echo "<span class=\"result\">Email aldready exist.</span>";
          }
        }
        else {
          echo "<span class=\"result\">Congratulation! you can register yourself with this.</span>";
        }
      }
      ?>
      </p>
    </div>
  </form>
</section>
