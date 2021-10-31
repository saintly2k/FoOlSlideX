<div id="content">
    <title>Mangas .::. <?php echo $config["name"]; ?></title>

    <form action="?page=search" type="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for Manga" aria-label="Search for Manga"
                aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search!</button>
            </div>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-4">
        <?php
        $mangaSQL = "SELECT * FROM mangas ORDER BY id ASC";
        $mangaResult = $conn->query($mangaSQL);

        if ($mangaResult->num_rows > 0) {
            while($mrow = $mangaResult->fetch_assoc()) {
                echo '<div class="col mb-4">';
                echo '<div class="card">';
                echo '<div style="height:250px;background:url(assets/covers/'.$mrow["cover"].');background-position: center; background-size: cover;" class="card-img-top" alt="..."></div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$mrow["title"].'</h5>';
                echo '<a href="?page=view&manga='.$mrow["url"].'">';
                echo '<p class="card-text">Read</p>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Error?!";
        }

?>
    </div>

</div>