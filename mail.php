<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>

<form action="https://api.elasticemail.com/contact/add?version=2" method="post">
  <fieldset style="border:none;">
    <input type="hidden" name="publicaccountid" value="73be17af-e494-45c3-a705-b71281737820">
    <input type="hidden" name="return_url" value="">
    <input type="hidden" name="activation_return_url" value="">
    <input type="hidden" name="activation_template" value="แบบตอบรับการเข้าประชุมออนไลน์">
    <input type="hidden" name="type" value="3">
    <div>
      <span id="email">
        <label for="email">Email
        </label>
        <input maxlength="40" class="form-control" name="email" size="20" type="email" required="">
      </span>
      <span id="firstname">
        <label for="firstname">First Name
        </label>
        <input maxlength="40" class="form-control" name="firstname" size="20" type="text">
      </span>
      <span id="lastname">
        <label for="lastname">Last Name
        </label>
        <input maxlength="40" class="form-control" name="lastname" size="20" type="text">
      </span>
    </div>
    <ul class="lists" style="list-style:none">
    </ul>
    <input type="submit" name="submit" value="Subscribe">
  </fieldset>
</form>
