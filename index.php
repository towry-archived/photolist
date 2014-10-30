<?php 

require "photolist.php";
require "iterator.php";
require "photo.php";

define( "APPNAME", "photolist" );

include "header.php";

?>
    <div id="nav">
        <a href="upload.php">upload</a>
    </div>
    <div id="photos">
        <ul id="photolist">
        <?php

            $photolist = new PhotoList( './uploads' );

            if ( isset( $_GET['delete'] ) && isset( $_GET['key'] ) ) {
                $key = $_GET['key'];
                $photo = $photolist->getPhoto( $key );
                $photolist->removePhoto( $photo );
                header( "Location: /" . APPNAME );
            }

            $iterator = new PhotoIterator( $photolist );

            foreach ( $iterator as $key => $photo) {
                echo '<li>' . $photo->html() . '<a href="?delete=true&key=' . $iterator->key() . '" class="delete">x</a></li>' . "\n";
            }

            if ( ! $photolist->hasPhoto() ) {
                echo '<li>No photos.</li>';
            }
        ?>
        </ul>
    </div>
</body>
</html>
