Short Notice: v0.2.0 is currently in development. Join the Discord for more information and its status. Please do not use v0.1.4 or any other version until v0.2.0 is officially released. Thanks!

![FoOlSlideX Logo](https://cdn.henai.eu/assets/images/foolslidex-logo.png)

# FoOlSlideX

The new, most powerful Comic- & Manga-Reader ever created by the human race. Reworked by an Otaku for Scanlation-Groups.

Before contributing, make sure to read [Contributing](#contributing)! Make sure you start with [TYP-xxx] or else it won't be merged!

## Index

- [Features](#features)
- [Contributing](#contributing)
- [Video-Guides](#video-guides)
- [Installation using the Installer](#installation-using-the-installer)
- [Adding a Chapter](#adding-a-chapter)
- [Documentation](#documentation)
- [Config Variables](#config-variables)
- [Supprt](#support)
- [Donate](#donate)
- [Demo](#demo)
- [Used By](#used-by)
- [Authors](#authors)

## Features

- Create invites
- Register using invite & login to Account
- Add Titles/Edit them
- Add Chapters/Edit them
- Bookmark Mangas & Chapters via Cookies
- View Bookmarks & keep track of them
- Create Groups, view groups and their chapters
- Create static pages & manage them

## Contributing

Contributions are ALWAYS welcome! Even if it's just improving a language-file. Really!

Make sure you follow these rules!

- Commit Message should follow this title system: [TYP-xxx] where xxx is the typ type. ([See more in deathnotes.txt at the footer where types are declared](https://github.com/saintly2k/FoOlSlideX/blob/master/deathnotes.txt))
- Code should somewhat be clean and readable
- Notes in the code should be in ENGLISH and no other language (except language files)

## Video-Guides

As someone requested, I started a video-guide on YouTube on how to install, update and do some more stuff on FoOlSlideX.

[View the full PlayList](https://www.youtube.com/playlist?list=PLDQvUzXjsrhP8EsCrxJ6yoqcOKTESXixX)

## Installation using the Installer

- Download the latest stable release
- Create a MySQL Database
- Edit your config.php properly (MySQL User, Pass, Database name)
- Open your webroot in your browser
- Fill out all data and click on submit
- Create an account using the invite code `FoOlSlideX`
- Done

## Adding a Chapter

This is very important that you follow these steps I will give you. If you prefer a video-guide, you can watch it here:

https://www.youtube.com/watch?v=E-HFaMTH-NM&ab_channel=TeamH33T

If not, here is a step-by-step guide:

- You need to have a folder structure like this:
```
- Chapter 01
- - 01.png
- - 02.png
- - 03.png
```
- Then you need to ZIP "Chapter 01" as a ZIP file with THE SAME NAME
- After that, DON'T RENAME THE ZIP FILE, IF YOU DO, IT WON'T WORK!
- Then go to the title where you want to add it
- Click on "Add new Chapter" and select the ZIP, volume, chapter and group(s)
- Hit "Add Chapter" and you're done
- If you encounter any errors saying "cannot rename" or such, it means you renamed the folder or didn't zip it properly

## Documentation

[View full Documentation in the GitHub Wiki](https://github.com/saintly2k/FoOlSlideX/wiki)


## Config Variables

`$slave["host"]` is the MySQL host

`$slave["user"]` is the MySQL user

`$slave["pass"]` is the password for the user

`$slave["table"]` is the table where you imported the SQL file

## Support

For support, join our Discord: https://discord.gg/uahG2fKVvg

Or eMail me at saintly@h33t.moe


## Donate

I spend a lot of time working on this. Really.

Please consider donating some money via PayPal: [yuki.akihabara@yandex.com](https://paypal.me/WOLFRAMEdev)

Or donate via Ko-fi: [ko-fi.com/saintly](https://ko-fi.com/saintly) (I need to pay server-bills)

## Demo

View (a slightly modified version of) FoOlsldiex in action: https://stukas.henai.eu/reader/

## Used By

This project is used by the following groups:

- [Lubuntu Bionic Beaver Scans](https://stukas.henai.eu)
- [weltenWanderer Scans](https://wws.henai.eu)
- [ELEVEN SCANLATOR](http://eleven-scanlator.epizy.com)
- [PuchiRoll](https://puchiroll.com)


## Authors

FoOlSlideX Development:
- [@saintly2k](https://www.github.com/saintly2k)
- [@kaligula-eu](https://www.github.com/kaligula-eu)

Translation:
- EN: [Saintly2k](https://github.com/saintly2k)
- DE: [Saintly2k](https://github.com/saintly2k)
- PT: Luckkyz
- RU: [RenOK](https://github.com/totavok8)

FoOlSlide/FoOlSlide2 Original Idea/Development:
- [@FoolCode](https://github.com/FoolCode)
