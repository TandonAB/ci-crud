<div class="col-md-12">
    <a href="<?php echo site_url('user/create') ?>" class="btn btn-primary float-right m-2">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Dept.</th>
                <th>Adrress</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user->id ?></td>
                    <td><img width="50px" src="<?php echo site_url("uploads/".$user->image); ?>" ></td>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->phone ?></td>
                    <td><?php echo $user->gender ?></td>
                    <td><?php echo $user->dept ?></td>
                    <td><?php echo $user->address ?></td>
                    <td><?php echo $user->is_active ?></td>
                    <td><a class="btn btn-primary" href="<?php echo site_url('user/edit/'.$user->id) ?>"> Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url('user/delete/'.$user->id) ?>"> Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
