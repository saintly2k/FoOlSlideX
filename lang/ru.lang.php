<?php

# Russian Language File, ver: 0.3b
# Перевод может быть не корректным, если переведенный текст ещё не задействован в функционале!
# The translation may not be correct if the translated text is not yet functional!
# UpDated 15.06.2022

$lang = [
    "cookie_modal" => [
        "title"     => "Этот сайт требует использования Cookies!",
        "content"   => "Здравствуй, дорогой читатель! Этот сайт не позволяет вам создать аккаунт и хранить в нем ваш прогресс чтения. В связи с этим мы используем Cookies для хранения вашего прогресса чтения. Если вы хотите использовать эту функцию, вы должны согласиться с использованием Cookies. Мы надеемся, что вы получите удовольствие от чтения~",
        "accept"    => "Я принимаю",
        "refuse"    => "Отказываюсь"
    ],
    "install"   => [
        "title"     => "Установка FoOlSlideX",
        "confirm"   => "Вперёд!",
        "after"     => "После того как вы нажмете кнопку 'Вперёд!', вы будете перенаправлены на страницу регистрации. Зарегистрируйтесь там, используя следующий код приглашения:",
        "copy"      => "скопировать"
    ],
    "menu" => [
        "home"      => "Главная",
        "releases"  => "Релизы",
        "titles"    => "Проекты",  # Точно ещё не было решено как обозначить раздел, ибо это можно обозначить как: Проектами, Тайтлами, а так же и Переводами / It has not yet been decided exactly how to designate the section, for it can be designated as: Projects, Titles, as well as Translations
        "more"      => "Ещё",
        "quicksearch"   => "Быстрый поиск",
        "search"    => "Поиск",
        "account"   => "Аккаунт",
        "login"     => "Вход",
        "signup"    => "Регистрация",
        "profile"   => "Профиль",
        "settings"  => "Настройки",
        "logout"    => "Выход",
        "add_new"   => "Добавить релиз",
        "bookmarks" => "Закладки",
        "manage_groups" => "Управление группами",
        "groups"    => "Группы",
        "config"    => "Изменить настройки",
        "settings"  => "Настройки аккаунта",
        "blog"      => "Blog", # Needs translation
        "blog2"     => "Blog activated", # Needs translation
        "news"      => "News", # Needs translation
        "news2"     => "News activated", # Needs translation
        "menu_dis"  => "Menu Display", # Needs translation
        "statics"   => "Static Pages" # Needs translation
    ],
    "home"  => [
        "added_titles"  => "Добавлены названия",
        "type"          => "Тип",
        "title"         => "Название",
        "added"         => "Добавлена",
        "released_chap" => "Опубликованные главы",
        "chapter"       => "Глава",
        "chap_title"    => "Название главы",
        "group"         => "Группа",
        "uploader"      => "Загрузил"
    ],
    "groups" => [
        "add_group" => "Добавить группу",
        "req_group" => "Отправить запрос на регистрацию группы",
        "name"      => "Group Name", # Needs translation
        "short"     => "Group short Name", # Needs translation
        "image"     => "Group Banner Image (URL)", # Needs translation
        "about"     => "About this Group (Supports BBCode)", # Needs translation
        "founded"   => "Group founded", # Needs translation
        "website"   => "Group Website (Leave empty for none)", # Needs translation
        "irc"       => "Group IRC Channel (Leave empty for none)", # Needs translation
        "mangadex"  => "Group MangaDex site (Leave empty for none)", # Needs translation
        "email"     => "Contact eMail", # Needs translation
        "confirm"   => "Add group!", # Needs translation
        "confirm_r" => "Request group!", # Needs translation
        "group"     => "Group", # Needs translation
        "infos"     => "Informations", # Needs translation
        "short2"    => "Short", # Needs translation
        "founded2"  => "Founded", # Needs translation
        "links"     => "Links", # Needs translation
        "about2"    => "About", # Needs translation
        "releases"  => "Releases by this Group", # Needs translation
        "no_releas" => "There are no Releases yet!" # Needs translation
    ],
    "group" => [
        "website"   => "Website", # Needs translation
        "irc"       => "IRC", # Needs translation
        "mangadex"  => "MangaDex", # Needs translation
        "email"     => "eMail", # Needs translation
        "approve"   => [
            "not_approved"  => "This group has not been approved by a Staff member yet and is only visible to Mods and Admins.", # Needs translation
            "action"        => "What do you want to do?", # Needs translation
            "approve"       => "Approve this Group", # Needs translation
            "unapprove"     => "Delete this Group", # Needs translation
            "notice"        => "After approving, you might want to reload this page..." # Needs translation
        ]
    ],
    "edit_group" => [
        "title"     => "Edit Group", # Needs translation
    ],
    "config"    => [
        "title"     => "Изменить настройки",
        "title2"    => "Название сайта",
        "slogan"    => "Слоган сайта",
        "logo"      => "путь либо URL до логотипа (Оставьте пустым для отсутствия)",
        "cookie"    => "Префикс для Cookie (Если вы измените, все старые Закладки будут потеряны!)",
        "url"       => "URL сайта (Протокол http либо https, а так же в конце СЛЭШ обязательны!)",
        "theme"     => "Тема сайта по умолчанию",
        "themes"    => [
            1   => "Стандартный - Светлый",
            2   => "Лазурный - Светлый",
            3   => "Люмен - Светлый",
            4   => "Удобочитаемый - Светлый",
            5   => "Сланец - Темный",
            6   => "Киборг - Темный"
        ],
        "start"     => "Запуск проекта (укажите год)",
        "lang"      => "Язык по умолчанию",
        "disqus"    => "навание в Disqus (указывается если нужны комментарии от системы Disqus)"
    ],
    "login" => [
        "error"     => "Ошибка",
        "message"   => "Еще не зарегистрированы?",
        "username"  => "Никнейм",
        "password"  => "Пароль",
        "captcha"   => "Каптча",
        "cookies"   => "Остаться на сайте<br />(ИСПОЛЬЗУЮТСЯ Cookies!)"
    ],
    "signup" => [
        "password" => "Повторите пароль",
        "message"   => "Уже есть аккаунт?",
        "used_invite"   => "Приглашение (инвайт), которое вы ввели, уже было использовано!",
        "empty_invite"  => "Для создания аккаунта необходимо приглашение (инвайт)!",
        "invite"    => "Код приглашения (инвайт)"
    ],
    "add_manga" => [
        "add"       => "Добавить",
        "title"     => "*Название тайтла",
        "cover"     => "Обложка (1500x2150px)",
        "alt"       => "Альтер. названия",
        "author"    => "Автор",
        "genre"     => "Жанры (разделять запятыми)",
        "type"      => "*Тип (Манга, Манхва, Маньхуа)",
        "released"  => "Год выпуска",
        "raw-st"    => "*Статус оригинала",
        "status"    => "*Статус перевода",
        "descript"  => "Описание (поддерживает HTML)",
        "raw-url"   => "Ссылка на оригинал",
        "licensed"  => "Лицензиар (оставить пустым, если не имеет лицензии)",
        "official"  => "URL-адрес официального релиза (оставьте пустым, если его нет)",
        "required"  => "Необходимые поля отмечены значком *",
        "all_required"  => "Все поля обязательны для заполнения!",
        "manga"     => "Манга",
        "manhua"    => "Маньхуа",
        "manwha"    => "Манхва",
        "type_manga"    => "Манга (по страничная)",
        "type_manhua"   => "Маньхуа (Лист)",
        "type_manwha"   => "Манхва (Лист)",
        "rawst"     => [
            1   => "Неизвестно",
            2   => "Анонсировано",
            3   => "Выпускается",
            4   => "Приостановлено",
            "5"   => "Завершено",
            6   => "Отменено"
        ],
        "scanst"    => [
            1   => "В планах",
            2   => "В работе",
            3   => "Приостановлено",
            4   => "Вынужденный перерыв (из-за воздействия)",
            5   => "Завершено",
            6   => "Брошенно"
        ],
    ],
    "manga" => [
        "alt"       => "Альтер. название",
        "author"    => "Автор(ы)",
        "genre"     => "Жанр(ы)",
        "type"      => "Тип чтения",
        "released"  => "Релиз (Год)",
        "raw-status"    => "Статус оригинала",
        "scan-status"   => "Статус перевода",
        "raw"       => "Читать/Купить официально",
        "licensed"  => "Пожалуйста, поддержите автора, купив официальную работу, поскольку она была лицензирована",
        "added"     => "Этот тайтл был добавлен ",
        "edit_title"    => "Редактировать",
        "add_ch"    => "Добавить главу",
        "unknown"   => "Неизвестно",
        "edit_chap" => "Редактировать главу",
        "chapters"  => "Chapters", # Needs translation
        "comments"  => "Comments" # Needs translation
    ],
    "add_chapter" => [
        "title"     => "Добавить главу для",
        "file"      => "*Выберите ZIP/RAR файл для загрузки",
        "volume"    => "Том (Оставьте пустым если отсутствует)",
        "chapter"   => "Глава (Оставьте пустым или 0 для Oneshot)",
        "ctitle"    => "Название главы (Оставьте пустым, если нет)",
        "button"    => "Добавить",
        "ser_grp"   => "Search for Group...", # Needs translation
        "sel_grp1"  => "Select Group 1", # Needs translation
        "sel_grp2"  => "Select Group 2", # Needs translation
        "sel_grp3"  => "Select Group 3", # Needs translation
        "no_group"  => "No Group", # Needs translation
        "none"      => "None", # Needs translation
        "group_unap"    => "Don't see your group? That means it's still unapproved. Wait some more or upload without a group. You can always edit that later." # Needs translation
    ],
    "chapter" => [
        "menu"      => "Меню",
        "close"     => "Скрыть",
        "back_to_m" => "Назад к релизу",
        "bookmark"  => "В Закладки",
        "update_bm" => "Обновить закладку",
        "remove_bm" => "Удалить из закладок",
        "comments"  => "К комментариям",
        "next"      => "Следующая глава",
        "prev"      => "Предыдущая глава",
        "oneshot"   => "Oneshot"
    ],
    "edit_chapter" => [
        "title"     => "Редактирование",
        "file"      => "Выберите новый ZIP/RAR (удаляет старый)",
        "edit"      => "Внести изменения",
        "return"    => "Вернуться к Тайтлу",
        "delete"    => "Удалить главу",
        "del_yes"   => "Да, я уверен.",
        "del_no"    => "Нет, отменяется!"
    ],
    "edit_title" => [
        "title"     => "Редактирование",
        "save"      => "Внести изменения",
        "delete"    => "Удалить тайтл"
    ],
    "display" => [
        "notice"    => "If you are not familiar with this setting, please watch this video, it is really important before you break anything!", # Needs translation
        "item"      => "Item URL/Name", # Needs translation
        "text"      => "Display Text", # Needs translation
        "icon"      => "Glyphicon Icon", # Needs translation
        "order"     => "Order Level", # Needs translation
        "displayed" => "Displayed", # Needs translation
        "hidden"    => "Hidden", # Needs translation
        "delete"    => "Are you sure you want to delete this Menu item?" # Needs translation
    ],
    "statics" => [
        "delete"    => "Are you sure you want to delete this page? It will delete the MySQL entry, the Menu item AND the file. NO CHANCE FOR RECOVERY!", # Needs translation
        "name"      => "Page Name/URL", # Needs translation
        "title"     => "Display Name", # Needs translation
        "private"   => "Private?", # Needs translation
        "menu"      => "Create Menu item?", # Needs translation
        "create"    => "Create" # Needs translation
    ],
    "editor" => [
        "title"     => "File Editor", # Needs translation
        "edit"      => "Edit File", # Needs translation
        "delete"    => "Delete Page", # Needs translation
        "close"     => "Close", # Needs translation
    ],
    "errors" => [
        "bad_username"  => "Никнейм содержит недопустимые символы!",
        "bad_password"  => "Пароль содержит недопустимые символы!",
        "wrong_password"    => "Не верный пароль!",
        "taken_username"    => "Этот никнейм уже занят!",
        "unmatch_password"  => "Пароли не совпадают!",
        "attack"    => "Вы уверены, что хотите выйти без сохранения?",
        "captcha"   => "Капча была неправильной... попробуйте еще раз!",
        "unsupported_image" => "Файл, который вы пытались загрузить, НЕ является изображением (или он пуст)!",
        "title_exists"  => "Тайтл, который вы пытаетесь добавить, уже существует с таким же названием!",
        "used_invite"   => "Этот пригласительный код (инвайт) уже был использован!",
        "exising_item"  => "The Item URL/Name/Display Text is already used!" # Needs translation
    ]
];

?>
