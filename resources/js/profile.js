$("#changeAvatar").change(function () {
  if (this.files[0] && this.files[0].name.match(/\.(jpg|jpeg|png|gif)$/)) {
    if (this.files[0].size > 1048576) {
      alert('File size is larger than 1MB!');
    } else {
      $('#modalUpdateAvatar').modal('show');
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagePreview').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    }
  } else alert('This is not an image file!');
});

$('#updateAvatarBtn').click(function () {
  console.log(file);
  var formData = new FormData();
  var file = $('#changeAvatar').prop('files')[0];
  formData.append('file', file);
  $.ajax({
    type: 'POST',
    url: '/updateAvatar',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (data) {
      console.log(data);
      location.reload();
    }
  });
})
