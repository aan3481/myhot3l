<?php
session_start();
session_destroy();
header("location:  login-tamu.php");
