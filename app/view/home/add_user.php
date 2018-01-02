<?php
$user_msg = isset($params[0]) ? $params[0] : "";
?>
<section id="contentBody" class="site-content" >
  <h2>Add User</h2>
  <form class="add-user-form" action="<?php echo URL . "home/addUser" ?>" method="post" autocomplete="off">
    <div class="form-group">
      <label for="username">Username: </label>
      <input type="text" name="username" value="" id="username">
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input type="text" name="email" value="" id="email">
    </div>
    <div class="form-group">
      <input type="submit" name="add_user" value="Add User">
      <p class="advice"><?php
      if ($user_msg === "user_exist") {
        echo "The username is already exist.";
      } else if ( $user_msg === "email_exist" ) {
        echo "Someone aldready using this email address which is exist.";
      }
      ?></p>
    </div>
  </form>
</section>
