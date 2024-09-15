<?php
unset($_SESSION['login']);

session_destroy();
redirect("home");