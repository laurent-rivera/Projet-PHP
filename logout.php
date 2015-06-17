<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/06/2015
 * Time: 10:35
 */

session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
