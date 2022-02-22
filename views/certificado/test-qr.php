<?php

require_once("./public/lib/phpqrcode/qrlib.php");

// require_once("phpqrcode/qrlib.php");

QRcode::png($_GET['code']);