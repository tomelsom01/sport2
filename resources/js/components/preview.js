document.getElementById('imageInput').addEventListener('change', function (e) {
    const preview = document.getElementById('preview');
    const [file] = e.target.files;
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
        preview.src = '';
    }
});
