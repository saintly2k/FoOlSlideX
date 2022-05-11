
![FoOlSlideX Logo](https://cdn.henai.eu/assets/images/foolslidex-logo.png)


# FoOlSlideX

The new, most powerful Comic- & Manga-Reader ever created by the human race. Reworked by an Otaku for Scanlation-Groups.

## Index

- [Features](#features)
- [Installation](#installation)
- [Documentation](#documentation)
- [Config Variables](#config%20variables)
- [Supprt](#support)
- [Donate](#donate)
- [Demo](#demo)
- [Used By](#used%20by)
- [Authors](#authors)
## Features

- Create invites
- Register using invite & login to Account
- Add Titles/Edit them
- Add Chapters/Edit them
- Bookmark Mangas & Chapters via Cookies
- View Bookmarks & keep track of them

## Installation

- Download the latest stable release
- Create a MySQL Database and import `mangareaderx.sql`
- Go to table `invites`, press `insert` and type in `token` whatever you want
- Edit `config.php` to your likings
- Upload everything and open in Browser
- Click on `Account`, then `Signup` and fill out the info
- Enter in the field `Invite Code` the `token` you just created
- After Registering, Login using your Details
- Done

## Documentation

[View full Documentation here.](https://h33t.moe/file/foolslidex-docs) (Soon)


## Config Variables

`$config["title"]` is the Title of the Site

`$config["logo"]` is the location of the logo from the Root folder

`$config["slogan"]` is what shows when you're on the main page

`$config["url"]` is the full URL to your site including subfolder AND ends with slash!

`$config["theme"]` is a number between 1-5 being different Themes

`$config["start"]` declares when your Group was founded, will show in footer

`$config["lang"]` is what language-file it uses located in /lang/

`$config["disqus"]` is the name of your Disqus portal

`$slave["host"]` is the MySQL host

`$slave["user"]` is the MySQL user

`$slave["pass"]` is the password for the user

`$slave["table"]` is the table where you imported the SQL file

## Support

For support, join our Discord: https://discord.gg/uahG2fKVvg

Or eMail me at saintly@h33t.moe


## Donate

I spend a lot of time working on this. Please consider donating some money via PayPal: [yuki.akihabara@yandex.com](https://paypal.me/WOLFRAMEdev)
## Demo

View (a slightly modified version of) FoOlsldiex in action: https://stukas.henai.eu/reader/

## Used By

This project is used by the following groups:

- [Lubuntu Bionic Beaver Scans](https://stukas.henai.eu)
- [weltenWanderer Scans](https://wws.henai.eu)


## Authors

FoOlSlideX Development:
- [@saintly2k](https://www.github.com/saintly2k)

FoOlSlide/FoOlSlide2 Original Idea/Development:

- [@FoolCode](https://github.com/FoolCode)
