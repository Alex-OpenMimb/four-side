function previewImage(event) {
    const reader = new FileReader();
    const preview = $('#imagePreview');

    reader.onload = function() {
        preview.attr('src', reader.result);
        preview.show();
    };

    reader.readAsDataURL(event.target.files[0]);
}
