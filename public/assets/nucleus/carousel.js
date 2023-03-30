function switchCarLink(evt,) {
    let carlinks, i;
    carlinks = document.getElementsByClassName("carlink");
    for (i = 0; i < carlinks.length; i++) {
        carlinks[i].classList.remove("btn-active");
    }
    evt.currentTarget.classList.add("btn-active");
}