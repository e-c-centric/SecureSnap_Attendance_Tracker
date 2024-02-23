<?php

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function redirects_with($url, $params = [])
{
    $query = http_build_query($params);
    header("Location: {$url}?{$query}");
}
