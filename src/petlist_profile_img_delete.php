<?php
$location = "../img/profile_img.jpg";
if (isset($location)) {
    unlink( $location );
    header( "Location: petlist_profile_insert.php" );
} else {
    header( "Location: petlist_profile_insert.php" );
}
?>