<?php
session_start();
if($_SESSION['user']): ?>

<?php else: header('Location: login.php');?>
<?php endif; ?>