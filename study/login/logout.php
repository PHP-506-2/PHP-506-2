<?php
session_start();
session_destroy();
?>
<script>
    alert("You've been logged out");
    location.replace('../movie_main.php');
</script>