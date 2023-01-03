<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AWS Image Gallery</title>
  <link href="resourses/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>

  <div class="container">
    <?php if (isset($msg)) {
    ?>
      <div class="alert alert-primary" role="alert">
        <?php echo $msg ?>
      </div>
    <?php
    } ?>

    <form class="row justify-content-center mt-3" id="add_image">
      <div class="col-auto">
        <input class="form-control" type="file" name="ftp" id="formFile">

      </div>
      <div class="col-auto">
        <button type="submit" id="add_btn" class="btn btn-primary mb-3 border border-2">upload</button>
        <div class="spinner-border" id="spinner" role="status"></div>
      </div>
    </form>
    <div id="edit_image"></div>

    <div class="card">
      <div class="card-header">
        Images
      </div>
      <div class="row px-3" id="show_images">

      </div>
    </div>





    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="resourses/images/check.png" width="50" height="50" class="rounded me-2" alt="...">
          <strong class="me-auto">Your Image is deleted</strong>

          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
      </div>
    </div>
  </div>
  <script src="resourses/js/jquery.min.js"></script>
  <script src="resourses/js/gallery_script.js"></script>
  <script src="resourses/js/bootstrap.bundle.min.js"></script>
</body>

</html>