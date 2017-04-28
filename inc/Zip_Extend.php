<?php

/**
 * Extends the native PHP ZipArchive class and creates a zip file for user downloading
 *
 * @author Tyler Bailey
 * @version 1.0.0
 */

class Zip_Extend extends ZipArchive {

    /**
     * Begin the zip file creation
     *
     * @param string $location the location of the directory to zip
     * @param string $name the name of the folder to put the zipped files into
     * @return null
     */
    public function add_dir($location, $name) {

        $this->addEmptyDir($name);
        $this->add_dir_do($location, $name);
    }

    /**
     * Add files to tmp directory and create zip file
     *
     * @param string $location the location of the directory to zip
     * @param string $name the name of the folder to put the zipped files into
     * @return null
     */
    private function add_dir_do($location, $name) {

        $name .= '/';         $location .= '/';
        $dir = opendir ($location);

        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..')
            continue;

            $do = (filetype( $location . $file) == 'dir') ? 'add_dir' : 'addFile';

            $this->$do($location . $file, $name . $file);
        }
    }

}
