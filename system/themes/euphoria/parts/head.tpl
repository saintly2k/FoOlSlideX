<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{$pageTitle}</title>
    {* <script src="https://cdn.tailwindcss.com"></script> *}
    <link href="{$config.url}dist/output.css" rel="stylesheet">
    {* <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" /> *}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courier+Prime&family=PT+Serif&display=swap');

        * {
            font-family: 'Courier Prime', monospace;
            font-family: 'PT Serif', serif;
        }
    </style>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body>