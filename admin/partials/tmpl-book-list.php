<div class="container">
    <h3 class=" ">Book List</h3>
    <table id="tbl-list-books" class="display">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Publication</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($books) > 0) {
                foreach ($books as $index => $data) {
                    ?>
                    <tr>
                        <td><?php echo $data->id ?></td>
                        <td><?php echo $data->name ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->publication ?></td>
                        <td><?php echo $data->amount ?></td>
                        <td><?php echo $data->status ?></td>
                        <td><img src="<?php echo $data->book_image ?>" style="height:50px;width:50px;" alt=""></td>
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
                        
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <th>#ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Publication</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Image</th>
            <th>Action</th>

        </tfoot>

    </table>
</div>