<?php

$theme = [
    "plugins" => [
        "SleekDB",
        "dbLists",
        "menu",
        "session",
        "valCustom",
        "readChapters",
        "readingMode",
    ],
    "lists" => [
        "dbLists" => [
            "dbl_default",
            "dbl_euphoria",
            "dbl_session",
        ],
    ],
    "config" => [
        "last" => [
            "title" => 5,
            "chapter" => 20,
        ],
        "perpage" => [
            "title" => 15,
            "chapter" => 20,
        ],
        "sleek" => [
            "dir" => "/database/euphoria",
            "config" => [
                "auto_cache" => true,
                "cache_lifetime" => null,
                "timeout" => false, // deprecated! Set it to false!
                "primary_key" => "id",
                "search" => array(
                    "min_length" => 2,
                    "mode" => "or",
                    "score_key" => "scoreKey",
                ),
                "folder_permissions" => 0777,
            ],
        ],
    ],
];
