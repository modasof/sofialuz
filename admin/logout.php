<?php

session_start();
unset ($SESSION['username']);
session_destroy();

header("location:../Login/index.php");
?>