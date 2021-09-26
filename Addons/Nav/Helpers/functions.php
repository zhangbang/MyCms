<?php

if (!function_exists('navs')) {
    function navs()
    {
        return (new \Addons\Nav\Service\NavService())->childTree();
    }
}
