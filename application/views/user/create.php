<div class="col-md-12 p-3">
    <h2>Create User</h2>
    <?php  $this->load->view('templates/errors'); ?>
    <?php echo form_open_multipart(site_url('user/save'),['class'=>'form'])?>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email"  placeholder="Enter E-mail">
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" class="form-control" name="phone" id="phone"  placeholder="Enter phone">
      </div>

      <div class="form-group">
          <label for="gender">Gender</label>
        <div>
        <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
          <label class="form-check-label" for="female">Female</label>
        </div>

      </div>

      <div class="form-group">
        <label for="dept">Department</label>
        <?php
            $options = [
                'php' =>'PHP',
                '.net' => 'DOT NET',
                'java'=> 'JAVA'
            ];

            echo form_dropdown('dept',$options,'',['class'=>'form-control']);
         ?>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" rows="5" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="dept">Image</label>
        <input name="image" type="file" class="form-control">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="active" value="1" name="active">
        <label class="form-check-label" for="active">Is Active</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
</div>
