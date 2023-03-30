{if (isset($rel) && $rel != 'tab') || !isset($rel)}
    <!DOCTYPE html>
    <html lang="{$userlang}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{$pagetitle}</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/site.webmanifest">
        <style>
            .link {
                text-decoration-line: underline;
                text-decoration-style: dotted;
            }

            .link:hover {
                text-decoration-style: solid;
            }

            .auto a {
                text-decoration-line: underline;
                text-decoration-style: dotted;
            }

            .auto a:hover {
                text-decoration-style: solid;
            }
        </style>
    </head>

    <body data-theme="{$daisytheme}" onload="assignTheme('{cat($config.title)}_');" class="min-h-screen">

        {include file="../parts/menu.tpl"}
{/if}