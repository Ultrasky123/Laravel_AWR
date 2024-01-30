<?php
$password = 'bbyoctopusz';
$hashedPassword = bcrypt($password);

echo $hashedPassword;
?>
