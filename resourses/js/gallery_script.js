const toastLiveExample = document.getElementById("liveToast");
document.getElementById("spinner").style.display = "none";

/*------Add Images-------- */
$("#add_image").submit(function (evt) {
  var obj = document.getElementById("add_image");
  evt.preventDefault();
  var formData = new FormData(obj);
  var newdata = $("#formFile")[0].files[0].name;

  if (newdata != "") {
    formData.append("ftp", $("#formFile")[0].files[0]);
    $.ajax({
      beforeSend: function () {
        document.getElementById("spinner").style.display = "block";
        document.getElementById("add_btn").style.display = "none";
      },
      url: "index.php/Awscontroller/upload/",
      method: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: "multipart/form-data",
      processData: false,

      success: function (response) {
        $("#add_btn").css("display", "block");
        $("#spinner").css("display", "none");
        showImages();
        $("#add_image").trigger("reset");
      },
    });
  }
});

/*------Delete Images-------- */
$(document).ready(showImages());

function deleteImage(value) {
  if (confirm("Do want to delete this one! " + value)) {
    $.ajax({
      url: "index.php/Awscontroller/Ajax/",
      method: "POST",
      data: { result: "delete", file_name: value },
      async: true,
      success: function (response) {
        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
        showImages();
      },
    });
  }
}

/*------Show Images-------- */
function showImages() {
  $.ajax({
    url: "index.php/Awscontroller/Ajax/",
    method: "POST",
    data: { result: "show" },
    async: true,
    success: function (response) {
      $("#show_images").html(response);
    },
  });
}

/*------Edit Images-------- */
function editImage(value) {
  $.ajax({
    url: "index.php/Awscontroller/Ajax/",
    method: "POST",
    data: { result: "edit", file_name: value },
    async: true,
    success: function (response) {
      $("#edit_image").html(response);
    },
  });
}

/*------Update Images-------- */
function updateImage(imagename) {
  var obj = document.getElementById("update_image");

  var formData = new FormData(obj);
  formData.append("update", $("#updateFile")[0].files[0]);
  formData.append("result", "update");
  formData.append("edit_image_name", imagename);

  $.ajax({
    url: "index.php/Awscontroller/Ajax/",
    method: "POST",
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    enctype: "multipart/form-data",
    processData: false,
    success: function (response) {
      showImages();
      $("#edit_image").html("");
    },
  });
}
