
<?php 
$errors = $_SESSION['errors'];
if (count($errors) > 0): ?>
  <div class="error">
  	<?php foreach ($errors as $error): ?>
			<p><?php echo $error;
			unset($_SESSION['errors']); ?></p>
  	<?php endforeach?>
  </div>
<?php endif?>