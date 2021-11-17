<?php

use Addons\Seo\Pipeline\PageDescriptionForRule;
use Addons\Seo\Pipeline\PageKeywordForRule;
use Addons\Seo\Pipeline\PageTitleForRule;

return [
    'page_title' => [
        PageTitleForRule::class
    ],
    'page_keyword' => [
        PageKeywordForRule::class
    ],
    'page_description' => [
        PageDescriptionForRule::class
    ],
];
