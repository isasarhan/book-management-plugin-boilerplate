<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Book_Management
 * @subpackage Book_Management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Book_Management
 * @subpackage Book_Management/includes
 * @author     issa sarhan <isasarhan.lz@gmail.com>
 */
class Book_Management_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate()
	{
		require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

		global $wpdb;
		$this->wp_tbl_books();
		$this->wp_tbl_book_shelf();

	}
	public function wp_tbl_book_shelf()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "tbl_book_shelf";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

			$sql = "CREATE TABLE `wp_tbl_book_shelf` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`shelf_name` varchar(150) NOT NULL,
			`capacity` int(11) NOT NULL,
			`shelf_location` varchar(200) NOT NULL,
			`status` int(11) NOT NULL,
			`created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		  ";
			dbDelta($sql);
		}


		$query = "INSERT INTO wp_tbl_book_shelf ( `shelf_name`, `capacity`, `shelf_location`, `status`)
		VALUES
		 ('shelf 1', 150, 'Left Corner', 1 ),
		 ('shelf 3', 200, 'Right Corner', 1 ),
		 ('shelf 2', 300, 'Top Corner', 1 )";
		$wpdb->query($query);


		$data = $wpdb->get_row(
			$wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "posts WHERE post_name = %s", "book-tool")
		);
		if (empty($data)) {
			$post_details = array(
				'post_title' => 'Book Tool',
				'post_name' => 'book-tool',
				'post_content' => 'Simple content of book page',
				'post_status' => 'publish',
				'post_author' => 1,
				'post_type' => 'page'
			);
			wp_insert_post($post_details);
		}
	}
	public function wp_tbl_books()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "tbl_books";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE `wp_tbl_books` (
				`id` int(11) NOT NULL,
				`name` varchar(150) NOT NULL,
				`email` varchar(150) NOT NULL,
				`amount` int(11) NOT NULL,
				`shelf_id` int(11) NOT NULL,
				`description` text NOT NULL,
				`book_image` varchar(200) NOT NULL,
				`publication` varchar(200) NOT NULL,
				`language` varchar(150) NOT NULL,
				`status` int(11) NOT NULL,
				`created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			  ";
			dbDelta($sql);
		}
	}
}
