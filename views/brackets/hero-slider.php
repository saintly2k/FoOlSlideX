<div class="w3-content w3-display-container">
    <?php
    $heroImages = $config["hero"];
    $heroSQL = "SELECT * FROM mangas ORDER BY RAND() LIMIT $heroImages";
    $heroResult = $conn->query($heroSQL);
    if ($heroResult->num_rows > 0) {
        while($hrow = $heroResult->fetch_assoc()) {
            echo '<a href="?page=view&manga='.$hrow["url"].'"><img class="mySlides" src="assets/covers/'.$hrow["cover"].'" style="width:100%;height:350px" alt="wtf"></a>';
        }
    }
    ?>

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)"
        style="border-radius:5px;">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)"
        style="border-radius:5px;">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}
</script>
