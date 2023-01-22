<?php

function img_url($fileName) {
    $url = (env('APP_ENV') == 'local') ? asset("storage/" . $fileName) : str_replace("public/test", "", asset("test/storage/app/public/" . $fileName));
    
    return $url;
}