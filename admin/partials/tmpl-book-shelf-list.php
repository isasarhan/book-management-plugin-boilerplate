<div class="container">
    <h3 class=" ">Book Shelf List</h3>
    <table id="tbl-list-shelfs" class="display">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($book_shelfs) > 0) {
                foreach ($book_shelfs as $index => $data) {
                    ?>
                    <tr>
                        <td><?php echo $data->id ?></td>
                        <td><?php echo $data->shelf_name ?></td>
                        <td><?php echo $data->capacity ?></td>
                        <td><?php echo $data->shelf_location ?></td>
                        <td><?php
                        if ($data->status) {
                            ?>
                                <button class="btn btn-success">Active</button>
                                <?php
                        } else {
                            ?>
                                <button class="btn btn-danger">Inactive</button>
                                <?php
                        }
                        ?>
                        </td>
                        <td><button class="btn btn-danger btn-delete-book-shelf" data-id="<?php echo $data->id ?>">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <th>#ID</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Status</th>
            <th>Location</th>
            <th>Action</th>

        </tfoot>

    </table>
</div>