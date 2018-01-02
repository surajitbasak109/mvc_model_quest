<?php
$user_count = $data['user']['count'];
$user_data = $data['user']['data'];
$user_count_output = $user_count > 1 ? $user_count . ' users' : $user_count . ' user';
?>

<section id="contentBody" class="site-content" >
<h2>Showing All Users</h2>
<div class="table-top">
  <div class="user-num"><?php echo $user_count_output; ?></div>
</div>
<table class="user-table">
  <thead>
    <tr>
      <th>ID(PRI, AI)</th>
      <th>Username (VAR, 255)</th>
      <th>Email (VAR, 255)</th>
      <th>Created At (DATETIME)</th>
      <th>Updated At (DATETIME)</th>
    </tr>
  </thead>

  <tbody>
    <?php
    if ($user_count < 1) {
      echo "<tr><td style=\"text-align: center;\" colspan=\"5\">User column is empty.</td></tr>";
    }
    foreach ($user_data as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['username'] . "</td>";
      echo "<td>" . $value['email'] . "</td>";
      echo "<td>" . $value['created_at'] . "</td>";
      echo "<td>" . $value['updated_at'] . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
<div class="table-bottom">
  <div class="user-num"><?php echo $user_count_output; ?></div>
</div>
</section>
