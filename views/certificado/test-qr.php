<?php

require_once("phpqrcode/qrlib.php");

QRcode::png($_GET['code']);