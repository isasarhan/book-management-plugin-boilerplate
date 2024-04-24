<div class="container mt-5">
    <div class="justify-content-center">

        <h3>Create A Book Shelf</h3>
        <form action="javascript:void(0)" class="" id="frm-add-book-shelf">
            <div class="form-group">
                <label for="txt_name" class="col-sm-2 col-form-label">Shelf Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txt_name" name="txt_name">
                </div>
            </div>
            <div class="form-group">
                <label for="txt_capacity" class="col-sm-2 col-form-label">Capacity</label>
                <div class="col-sm-10">
                    <input type="number" min="1" class="form-control" id="txt_capacity" name="txt_capacity">
                </div>
            </div>
            <div class="form-group">
                <label for="txt_location" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txt_location" name="txt_location">
                </div>
            </div>
            <div class="">
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