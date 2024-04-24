jQuery(function () {
  jQuery("#tbl-list-books").DataTable();
  jQuery("#tbl-list-shelfs").DataTable();

  jQuery("#frm-add-book-shelf").validate({
    submitHandler: function () {
      var ajaxurl = ls_book.ajaxurl;

      var postdata = jQuery("#frm-add-book-shelf").serialize();
      postdata += "&action=admin_ajax_request&param=create_book_shelf";

      jQuery.post(ajaxurl, postdata, function (response) {
        console.log(response);
        alert("Shelf Added Successfully");
        setTimeout(function () {
          location.reload();
        }, 2000);
      });
    },
  });
  jQuery("#frm-add-book").validate({
    submitHandler: function () {
      var ajaxurl = ls_book.ajaxurl;

      var postdata = jQuery("#frm-add-book").serialize();
      postdata += "&action=admin_ajax_request&param=create_book";
      console.log(postdata);
      jQuery.post(ajaxurl, postdata, function (response) {
		alert("Book Added Successfully");
        setTimeout( function(){
        	location.reload()
        }, 2000)
      });
    },
  });

  jQuery(document).on("click", "#txt_image", function () {
    var image = wp
      .media({
        title: "Upload Book Image",
        multiple: false,
      })
      .open()
      .on("select", function () {
        var uploaded_image = image.state().get("selection").first();
        var image_data = uploaded_image.toJSON();
        jQuery("#book_img").attr("src", image_data.url);
        jQuery("#book_cover_img").val(image_data.url);
      });
  });
  jQuery(document).on("click", ".btn-delete-book-shelf", function () {
    var shelf_id = jQuery(this).attr("data-id");
    var ajaxurl = ls_book.ajaxurl;
    var postdata =
      "action=admin_ajax_request&param=delete_book_shelf&shelf_id=" + shelf_id;

    jQuery.post(ajaxurl, postdata, function (response) {
      console.log(response);
      alert("Shelf Deleted Successfully");
      setTimeout( function(){
      	location.reload()
      }, 2000)
    });
  });
});
