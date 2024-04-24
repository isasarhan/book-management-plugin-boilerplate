<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Book_Management
 * @subpackage Book_Management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Book_Management
 * @subpackage Book_Management/admin
 * @author     issa sarhan <isasarhan.lz@gmail.com>
 */
class Book_Management_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		$valid_pages = array("book-management-tool", "book-management-list-book-shlef", "book-management-create-book", "create-book-shelf", "book-management-list-book");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
		if (in_array($page, $valid_pages)) {

			wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), $this->version, 'all');
			wp_enqueue_style('sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css', array(), $this->version, 'all');
			wp_enqueue_style('datatable', 'https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css', array(), $this->version, 'all');
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/book-management-admin.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		$valid_pages = array("book-management-tool", "book-management-list-book-shlef", "book-management-create-book", "create-book-shelf", "book-management-list-book");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
		if (in_array($page, $valid_pages)) {
			wp_enqueue_script('jquery');
			wp_enqueue_script("bootstrap", 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script("sweetalert", 'https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script("datatable", 'https://cdn.datatables.net/2.0.5/js/dataTables.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script("validate", 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js', array('jquery'), $this->version, false);
		}

		wp_enqueue_script('jquery');
		wp_localize_script(
			'jquery',
			"ls_book",
			array(
				"name" => "Book Management",
				"ajaxurl" => admin_url("admin-ajax.php")
			)
		);

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/book-management-admin.js', array('jquery'), $this->version, false);
	}
	public function book_management_menu()
	{
		add_menu_page("Book Management", "Book Management", "can_access_crud", "book-management-tool", array($this, "book_management_dashboard"), "dashicons-admin-settings
		", 23);
		add_submenu_page("book-management-tool", "Dashboard", "Dashboard", "can_access_crud", "book-management-tool", array($this, "book_management_dashboard"));
		add_submenu_page("book-management-tool", "Create Book", "Create Book", "manage_options", "book-management-create-book", array($this, "book_management_create_book"));
		add_submenu_page("book-management-tool", "List Book", "List Book", "can_access_crud", "book-management-list-book", array($this, "book_management_list_book"));
		add_submenu_page("book-management-tool", "Create Book Shelf", "Create Book Shelf", "manage_options", "create-book-shelf", array($this, "book_management_create_book_shelf"));
		add_submenu_page("book-management-tool", "List Book Shelf", "List Book Shelf", "manage_options", "book-management-list-book-shlef", array($this, "book_management_list_book_shelf"));
	}
	public function book_management_create_book_shelf()
	{

		ob_start();
		include_once (BOOK_MANAGEMENT_PLUGIN_PATH . "admin/partials/tmpl-create-book-shelf.php");

		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function book_management_list_book_shelf()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'tbl_book_shelf';

		$book_shelfs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM " . $table_name . ""
			)
		);

		ob_start();
		include_once (BOOK_MANAGEMENT_PLUGIN_PATH . "admin/partials/tmpl-book-shelf-list.php");
		$template = ob_get_contents();
		ob_end_clean();

		echo $template;
	}

	public function book_management_dashboard()
	{
		echo "<h3>Welcome Book Dashboard</h3>";
	}
	public function book_management_create_book()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'tbl_book_shelf';

		$book_shelfs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT id, shelf_name FROM " . $table_name . ""
			)
		);
		ob_start();
		include_once (BOOK_MANAGEMENT_PLUGIN_PATH . "admin/partials/tmpl-create-book.php");
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;

	}
	public function book_management_list_book()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'tbl_books';

		$books = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM " . $table_name . ""
			)
		);
		ob_start();
		include_once (BOOK_MANAGEMENT_PLUGIN_PATH . "admin/partials/tmpl-book-list.php");
		$template = ob_get_contents();

		ob_end_clean();
		echo $template;
	}

	public function assign_capabilities()
	{
		$role = get_role('editor');
		$role->add_cap('can_access_crud');

		$role = get_role('administrator');
		$role->add_cap('can_access_crud');
	}
	public function define_capabilities()
	{
		$capabilities = array(
			'can_access_crud' => 'Access CRUD Features',
		);

		foreach ($capabilities as $cap => $label) {
			wp_roles()->add_cap($cap, $label);
		}
	}
	public function handle_ajax_request_admin()
	{
		global $wpdb;
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		if (!empty(($param))) {

			if ($param == "create_book") {
				$table_name = $wpdb->prefix . 'tbl_books';

				print_r($_REQUEST);

				$name = isset($_REQUEST['txt_name']) ? $_REQUEST['txt_name'] : "";
				$book_cover_img = isset($_REQUEST['book_cover_img']) ? $_REQUEST['book_cover_img'] : "";
				$book_shelf = isset($_REQUEST['book_shelf']) ? $_REQUEST['book_shelf'] : 0;
				$email = isset($_REQUEST['txt_email']) ? $_REQUEST['txt_email'] : "";
				$publication = isset($_REQUEST['txt_publication']) ? $_REQUEST['txt_publication'] : "";
				$description = isset($_REQUEST['txt_description']) ? $_REQUEST['txt_description'] : "";
				$cost = isset($_REQUEST['txt_cost']) ? $_REQUEST['txt_cost'] : 0;
				$status = isset($_REQUEST['dd_status']) ? $_REQUEST['dd_status'] : 0;

				$result = $wpdb->insert(
					$table_name,
					array(
						"name" => $name,
						"amount" => $cost,
						"book_image" => $book_cover_img,
						"description" => $description,
						"publication" => $publication,
						"email" => $email,
						"shelf_id" => $book_shelf,
						"status" => $status,
					)
				);
				if ($result) {
					echo json_encode(
						array(
							"status" => "1",
							"message" => "Book shelf created successfully",
						)
					);
				} else {
					echo json_encode(
						array(
							"status" => "0",
							"message" => "Failed to create book shelf",
						)
					);
				}


			}

			if ($param == "delete_book_shelf") {
				$table_name = $wpdb->prefix . 'tbl_book_shelf';

				$shelf_id = isset($_REQUEST['shelf_id']) ? $_REQUEST['shelf_id'] : "";
				if ($shelf_id > 0) {
					$wpdb->delete(
						$table_name,
						array(
							"id" => $shelf_id
						)
					);
				} else {
					echo json_encode(
						array(
							"status" => "0",
							"message" => "Failed to delete book shelf"
						)
					);
				}
			}
		}
		if ($param == "create_book_shelf") {
			$table_name = $wpdb->prefix . 'tbl_book_shelf';

			$name = isset($_REQUEST['txt_name']) ? $_REQUEST['txt_name'] : "";
			$capacity = isset($_REQUEST['txt_capacity']) ? $_REQUEST['txt_capacity'] : 0;
			$location = isset($_REQUEST['txt_location']) ? $_REQUEST['txt_location'] : "";
			$status = isset($_REQUEST['dd_status']) ? $_REQUEST['dd_status'] : 0;

			$result = $wpdb->insert(
				$table_name,
				array(
					"shelf_name" => $name,
					"capacity" => $capacity,
					"shelf_location" => $location,
					"status" => $status
				)
			);
			if ($result) {
				echo json_encode(
					array(
						"status" => "1",
						"message" => "Book shelf created successfully",
					)
				);
			} else {
				echo json_encode(
					array(
						"status" => "0",
						"message" => "Failed to create book shelf",
					)
				);
			}

		}
	}
}
