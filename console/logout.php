<?php
session_start();
session_destroy();
header('Location: /console/login.php');
exit;