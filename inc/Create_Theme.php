<?php

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
	 * @param  array $data $_POST data from form submission
	 * @return null
	 */
	private function build_theme($data) {
		$new_dest = $this->dest . '/' . md5($data['theme_slug']);

		if($this->create_zip_dir($this->source, $new_dest, $this->permissions))
		$this->create_theme_zip($new_dest, $data['theme_slug']);
	}

	/**
	 * Create the temporary theme directory
	 */
	private function create_zip_dir($source, $dest, $permissions) {
		// Check for symlinks
	    if (is_link($source)) {
	        return symlink(readlink($source), $dest);
	    }

	    // Simple copy for a file
	    if (is_file($source)) {
	        return copy($source, $dest);
	    }

	    // Make destination directory
	    if (!is_dir($dest)) {
	        mkdir($dest, $permissions);
	    }

	    // Loop through the folder
	    $dir = dir($source);
	    while (false !== $entry = $dir->read()) {
	        // Skip pointers
	        if ($entry == '.' || $entry == '..') {
	            continue;
	        }

	        // Deep copy directories
	        $this->create_zip_dir("$source/$entry", "$dest/$entry", $permissions);
	    }

	    // Clean up
	    $dir->close();
	    return true;
	}

	/**
	 * Loop through the theme files and swap the {THEME_NAME} strings
	 */
	private function swap_theme_name() {

	}

	/**
	 * Loop through the files and swap the {THEME_SLUG} strings
	 */
	private function swap_theme_slug() {

	}

	/**
	 * Loop through the files and swap the {THEME_PREFIX} strings
	 */
	private function swap_theme_prefix() {

	}

	/**
	 * Zip the newly created theme folder up and serve to the user for downloading
	 */
	private function create_theme_zip($dest, $slug) {
		include_once('Zip_Extend.php');
		$zip = new Zip_Extend();

		$res = $zip->open($dest . DIRECTORY_SEPARATOR . $slug . '.zip', ZipArchive::CREATE);

		if($res === TRUE) {
			$zip->add_dir($dest, $slug);
			$zip->close();

			$this->set_download_headers($slug);
		} else {
			return "Failed to create zip file.";
		}
	}

	/**
	 * Set download headers
	 */
	private function set_download_headers($slug) {
		header('Content-disposition: attachment; filename=' . $slug . '.zip');
        header('Content-type: application/zip');
        readfile(__DIR__ . DIRECTORY_SEPARATOR . $slug . '.zip');
	}
}
