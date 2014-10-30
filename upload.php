<?php

require "backend.php";

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) :

    if ( !validate( 'upfile' ) ) {
        echo "Error when uploading file.";
    }

    $ret = move_file( "upfile" );

    echo $ret['message'];
    echo "<h3><a href='/photolist'>&larr;</a></h3>";

else:

include "header.php";

?>
    <h1>Upload</h1>
    <form accept="image/jpeg, image/png" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="upfile" />
        <input type="submit" />
    </form>
</body>
</html>
<?php endif; ?>
