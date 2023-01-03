<?php
if (isset($images)) {

    foreach ($images as $Imagevalue) {


?>

        <div class="col-3 col-lg-3 col-md-4 col-sm-6 col-xsm-12">
            <div class="card mt-3 mb-3" style="width: 15rem;">
                <img src="resourses/images/<?php echo $Imagevalue ?>" class="card-img shadow image-responsive" style="margin-top: -10px;" width="100" height="200" alt="image">
            </div>

            <div class="row justify-content-evenly">
                <div class="col-auto">
                    <a href="javascript:void(0)" onclick="editImage('<?php echo $Imagevalue ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square m-2 " viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />

                        </svg></a>
                </div>
                <div class="col-auto">
                    <a href="javascript:void(0)" onclick="deleteImage('<?php echo $Imagevalue ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash m-2" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>


    <?php
    }
} else {
    ?>
    <div class="alert alert-info mx-auto" style="width: 98%; text-align:center;" role="alert">
        Images Not found
    </div>
<?php

} ?>