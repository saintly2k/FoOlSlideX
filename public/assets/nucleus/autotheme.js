function assignTheme(prefix) {
    let theme = Cookies.get(prefix + "daisytheme");
    document.body.setAttribute("data-theme", theme);
}