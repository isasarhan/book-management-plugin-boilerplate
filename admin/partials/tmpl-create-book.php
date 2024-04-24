<?php wp_enqueue_media(); ?>

<div class="container mt-5">
    <div class="justify-content-center">

        <h3 class="  ">Create A Book</h3>
        <form action="javascript:void(0)" id="frm-add-book">

            <div class="form-group">
                <label for="txt_name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txt_name" name="txt_name">
                </div>
            </div>
            <div class="form-group">
                <label for="txt_cost" class="col-sm-2 col-form-label">Book Shelf</label>
                <div class="col-sm-10">
                    <select class="form-select" name="book_shelf">
                        <option value="">Choose option</option>
                        <?php

                        foreach ($book_shelfs as $index => $data) {
                            ?>
                            <option value="<?php echo $data->id; ?>"><?php echo strtoupper($data->shelf_name); ?></option>
                            <?php
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="txt_email" name="txt_email">
                </div>
            </div>
            <div class="form-group">
                <label for="txt_publication" class="col-sm-2 col-form-label">Publication</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txt_publication" name="txt_publication">
                </div>
            </div>
            <div class="form-group">
                <label for="txt_description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="txt_description" name="txt_description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_image" class="col-sm-2 col-form-label">Book Image</label>
                <div class="col-sm-10">
                    <input type="button" class="form-control" id="txt_image" value="Upload Image" name="txt_image" />
                </div>
                <img src="" alt="" style="height:80px; width:80px;" id="book_img" />
                <input type="hidden" id="book_cover_img" name="book_cover_img" />
            </div>
            <div class="form-group">
                <label for="txt_cost" class="col-sm-2 col-form-label">Book Cost:</label>
                <div class="col-sm-10">
                    <input type="number" min="1" class="form-control" id="txt_cost" name="txt_cost" />
                </div>
            </div>
            <div class="form-group">
                <label for="txt_cost" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-select" name="dd_status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="p-3">
                    <button class="btn btn-success">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>