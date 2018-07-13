<?php
$errors = $this->session->flashdata('error');
if(!empty($errors))
{
    $str_error = is_array($errors) ?  implode($errors,"<br>"): $errors;

    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <p><?php echo $str_error; ?> </p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php }
?>
