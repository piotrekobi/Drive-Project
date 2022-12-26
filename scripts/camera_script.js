Webcam.set({
    width: 490,
    height: 390,
    image_format: "jpeg",
    jpeg_quality: 90,
});

Webcam.attach("#disk_camera");

function take_snapshot() {
    Webcam.snap(function (data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById("results").innerHTML = '<img src="' + data_uri + '"/>';
    });
}


