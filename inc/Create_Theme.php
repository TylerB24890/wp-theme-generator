<?php

/**
 * Process form submission and create base theme zip file
 *
 * @author Tyler Bailey
 * @version 1.0.0
 */

class Create_Theme {

	private $source;
	private $dest;
	private $permissions;

	public function __construct() {

		$this->source = __DIR__ . '/base-theme';
		$this->dest = __DIR__ . '/zip';
		$this->permissions = 0755;
	}

	/**
	 * Begin the form processing
	 *
	 * @param  array $data $_POST data from form submission
	 * @return null
	 */
	public function process_form_submission($data) {

		if(!isset($data) || !is_array($data))
		return "No data submitted.";

		$valid_data = $this->validate_form_submission($data);

		if(!$valid_data)
		return "You have entered invalid data.";

		$this->build_theme($valid_data);
	}

	/**
	 * Validate the submitted form data
	 *
	 * @param  array $data $_POST data from form submission
	 * @return array $data validated & sanitized $_POST data
	 */
	private function validate_form_submission(&$data) {

		if(is_array($data) && !empty($data)) {
			foreach($data as $k => $v) {
				if($k !== 'theme_author') {
					if(strlen($v) < 1) {
						$input_name = str_replace('_', ' ', $k);

						return "Invalid " . $input_name;
					} else {
						$v = strip_tags($v);

						if($k === 'theme_slug' || $k === 'theme_prefix') {
							$v = strip_tags($v);
							$v = str_replace(' ', '-', strtolower($v));
						}

						$data[$k] = $v;
					}
				} else {
					if(strlen($v) < 1) {
						$data[$k] = 'Elexicon';
					}
				}
			}

			unset($data['submit_theme']);
		} else {
			return false;
		}

		return $data;
	}

	/**
	 * Execute the functions required to build the theme
	 *
	 * @param  array $data $_POST data from form submission
	 * @return null
	 */
	private function build_theme($data) {
		$base_dest = $this->dest . DIRECTORY_SEPARATOR . md5($data['theme_slug']);

		if($this->create_zip_dir($this->source, $base_dest, $this->permissions))
		$this->create_theme_zip($base_dest, $data['theme_slug']);
	}

	/**
	 * Create the theme directory and add files from base-theme directory
	 *
	 * Copies all files from the base-theme directory into a new directory for zipping
	 *
	 * @param string $source the base-theme directory
	 * @param string $base_dest the destination to copy the theme to
	 * @param $permissions constant directory permissions to set
	 * @return bool
	 */
	private function create_zip_dir($source, $base_dest, $permissions) {
		// Check for symlinks
	    if (is_link($source)) {
	        return symlink(readlink($source), $base_dest);
	    }

	    // Simple copy for a file
	    if (is_file($source)) {
	        return copy($source, $base_dest);
	    }

	    // Make destination directory
	    if (!is_dir($base_dest)) {
	        mkdir($base_dest, $permissions);
	    }

	    // Loop through the folder
	    $dir = dir($source);
	    while (false !== $entry = $dir->read()) {
	        // Skip pointers
	        if ($entry == '.' || $entry == '..') {
	            continue;
	        }

	        // Deep copy directories
	        $this->create_zip_dir("$source/$entry", "$base_dest/$entry", $permissions);
	    }

	    // Clean up
	    $dir->close();
	    return true;
	}

	/**
	 * Loop through the theme files and swap the {THEME_NAME} strings
	 *
	 * @param string $name name of the theme
	 * @param string $dir directory of copied theme
	 */
	private function swap_theme_name($name, $dir) {

	}

	/**
	 * Loop through the files and swap the {THEME_SLUG} strings
	 *
	 * @param string $slug the theme slug
	 * @param string $dir directory of copied theme
	 */
	private function swap_theme_slug($slug, $dir) {

	}

	/**
	 * Loop through the files and swap the {THEME_PREFIX} strings
	 *
	 * @param string $slug the theme prefix
	 * @param string $dir directory of copied theme
	 */
	private function swap_theme_prefix($prefix, $dir) {

	}

	/**
	 * Zip the newly created theme folder up
	 *
	 * Calls the Zip_Extend object
	 *
	 * @param string $dest the destination of the folder to zip
	 * @param string $slug the theme slug to name the zipped theme folder
	 * @return string
	 */
	private function create_theme_zip($dest, $slug) {
		include_once('Zip_Extend.php');
		$zip = new Zip_Extend();

		$res = $zip->open($dest . DIRECTORY_SEPARATOR . $slug . '.zip', ZipArchive::CREATE);

		if($res === TRUE) {
			$zip->add_dir($dest, $slug);
			$zip->close();

			$this->set_download_headers($dest, $slug);
		} else {
			return "Failed to create zip file.";
		}
	}

	/**
	 * Set download headers
	 *
	 * Prompts the user to download the newly created file
	 *
	 * @param string $dest where the zip file is located
	 * @param string $slug the slug of the theme
	 * @return null
	 */
	private function set_download_headers($dest, $slug) {
		header('Content-disposition: attachment; filename=' . $slug . '.zip');
        header('Content-type: application/zip');
        readfile($dest . DIRECTORY_SEPARATOR . $slug . '.zip');
	}
}
