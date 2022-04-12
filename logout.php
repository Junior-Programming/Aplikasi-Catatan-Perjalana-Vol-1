<?php

require 'functions.php';

unset($_SESSION['user']);

return header('location: /login.php');