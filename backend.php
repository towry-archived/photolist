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

    if ( !@move_uploaded_file( $file, 
        sprintf( './uploads/%s.%s', sha1_file( $_FILES[$name]['tmp_name'] ), $type ) 
        ) ) {
        return array( 'error' => true, 'message' => 'Cant move file.' );
    } else {
        return array( 'error' => false, 'message' => 'Success.' );
    }
}


function ftype( $type ) {
    $types = array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif'
    );

    if ( $ret = array_search( $type, $types ) ) {
        return $ret;
    } else {
        return false;
    }
}
