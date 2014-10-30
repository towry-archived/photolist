<?php

class PhotoList implements Countable
{
    private $photos;

    private $dir;

    public function __construct( $dir )
    {
        if ( ! is_dir( $dir ) ) {
            throw new RuntimeException("Required a dir.");
        }

        $this->dir = $dir;

        $odir = opendir( $dir );

        while ( $d = readdir( $odir ) ) {
            if ( $d == '.' || $d == '..' ) continue;

            $file = $dir . '/' . $d;

            if ( ! is_file( $file ) ) continue;

            $p = new Photo( $file );
            $this->addPhoto( $p );
        }
    }

    public function hasPhoto()
    {
        return $this->count() != 0;
    }

    public function getPhoto( $index )
    {
        return $this->photos[$index];
    }

    public function addPhoto( Photo $photo )
    {
        $this->photos[] = $photo;
    }

    public function removePhoto( Photo $photo )
    {
        foreach ($this->photos as $key => $value) {
           if ( $photo === $value ) {
                $path = $photo->getPath();
                if ( file_exists( $path ) ) {
                    if ( !unlink( $path ) ) {
                        throw new RuntimeException( "Failed to remove photo.");
                    }
                }
                unset( $this->photos[ $key ] );
                break;
           }
        }
    }

    public function count()
    {
        return count( $this->photos );
    }
}
