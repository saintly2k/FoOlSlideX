</div>

<hr>

<p class="text-center text-muted"><a href="?lang=de" target="_blank" onclick="refresh();">Deutsch</a> - <a href="?lang=en" target="_blank" onclick="refresh();">English</a> - <a href="?lang=pt" target="_blank" onclick="refresh();">Português</a> - <a href="?lang=ru" target="_blank" onclick="refresh();">Русский</a></p>

<footer class="footer">
    <p class="text-center text-muted">
        Copyright &copy; <?= $config["start"]."-".date("Y") ?> <a href="<?php echo $config["url"]; ?>"><?php echo $config["title"]; ?></a> | Proudly powered by <a href="https://github.com/saintly2k/FoOlSlideX" target="_blank">FoOlSlideX</a> <span class="label label-primary"><?= $version ?></span>
    </p>
</footer>

<script>
    function timedRefresh(timeoutPeriod) {
        setTimeout("location.reload(true);", timeoutPeriod);
    }

    function refresh() {
        timedRefresh(1000)
    }

</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>
