<?php

    session_start();
    unset($_SESSION['start']);
    unset($_SESSION['data']);
    session_destroy();
    
    echo "Saliendo sistema";
    
    $url_text_adicional = "cersuteafolder/Zb5CzbRI#S3kKL9gKEY6TKNxdnERKYQ";

    header("location:?pg=login&code=$url_text_adicional");

?>