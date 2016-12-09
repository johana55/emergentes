</div>
<footer class="footer pie">
    <div class="container ">
        <p class="text-muted">Pie de pagina</p>
    </div>
</footer>
<script>
    openNav("nav01");
    function openNav(id) {
        document.getElementById("nav01").style.display = "none";
        document.getElementById("nav02").style.display = "none";
        document.getElementById("nav03").style.display = "none";
        document.getElementById(id).style.display = "block";
    }
</script>

</body>
</html>