<?php
session_start();
session_unset();
session_destroy();

header("Location: /phpt/forum_project/index.php");
exit;
?>