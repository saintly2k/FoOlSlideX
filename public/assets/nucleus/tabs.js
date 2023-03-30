function switchTab(evt, tab) {
    let i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.add("hidden");
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("tab-active");
    }
    document.getElementById(tab).classList.remove("hidden");
    document.getElementById(tab).classList.add("block");
    evt.currentTarget.classList.add("tab-active");
}