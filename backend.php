<?php

function validate( $name ) {
    if ( !isset($_FILES[$name]['error']) 
        || is_array( $_FILES[$name]['error'] ) ) {
        return false;
    } else if ( $_FILES[$name]['size'] > 1000000 ) {
        echo "error";
        return false;
    }

    return true;
}


function move_file( $name) {

    $file = $_FILES[$name]['tmp_name'];
    $type = $_FILES[$name]['type'];

    $type = ftype( $type );
    if ( ! $type ) {
        return array( 'error' => true, 'message' => 'Cant move file.' );
    }

    $target = sprintf( './uploads/%s.%s', sha1_file( $_FILES[$name]['tmp_name'] ), $type );

    if ( !@move_uploaded_file( $file, 
        $target 
        ) ) {
        return array( 'error' => true, 'message' => 'Cant move file.' );
    }

    $fn = "imagecreatefrom{$type}";
    $im = call_user_func_array( $fn, array( $target ) );
    $w = imagesx( $im );
    $h = imagesy( $im );
    $tw = mb_strwidth( "Copyright 2014" );

    $black = imagecolorallocatealpha( $im, 0, 0, 0, 0.7 );
    imagestring( $im, 3, 30, 30, "Copyright 2014", $black );
    $fn = "image{$type}";
    call_user_func_array( $fn, array( $im, $target ) );

    return array( 'error' => false, 'message' => 'Success.' );
}


function ftype( $type ) {
    $types = array(
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif'
    );

    if ( $ret = array_search( $type, $types ) ) {
        return $ret;
    } else {
        return false;
    }
}
