<?php

class Create_Theme {

	public function __construct() {

	}

	/**
	 * Begin the form processing
	 * @param  array $data $_POST data from form submission
	 * @return null
	 */
	public function process_form_submission($data) {

		if(!isset($data) || !is_array($data))
		return;

	}

	/**
	 * Validate the submitted form data
	 * @param  array $data $_POST data from form submission
	 * @return array $data validated & sanitized $_POST data
	 */
	private function validate_form_submission($data) {

	}

	/**
	 * Execute the functions required to build the theme
	 * @param  array $data $_POST data from form submission
	 * @return null
	 */
	protected function build_theme($data) {

	}

	/**
	 * Create the temporary theme directory
	 */
	protected function create_temp_dir() {

	}

	/**
	 * Copy the base theme files to the new directory
	 */
	protected function copy_theme_files() {

	}

	/**
	 * Loop through the theme files and swap the {THEME_NAME} strings
	 */
	protected function swap_theme_name() {

	}

	/**
	 * Loop through the files and swap the {THEME_SLUG} strings
	 */
	protected function swap_theme_slug() {

	}

	/**
	 * Loop through the files and swap the {THEME_PREFIX} strings
	 */
	protected function swap_theme_prefix() {

	}

	/**
	 * Rename the necessary theme files with the prefix
	 *
	 * MAYBE NOT NECESSARY?
	 */
	protected function rename_theme_files() {

	}

	/**
	 * Zip the newly created theme folder up and serve to the user for downloading
	 */
	protected function create_theme_zip() {

	}
}
