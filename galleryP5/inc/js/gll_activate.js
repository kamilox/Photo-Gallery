function addFiles() {
    localStorage.setItem("status", "active"), location.reload();
}
jQuery(document).ready(function () {
    var origin   = window.location.origin;
    console.log(origin);
    var e = "http://localhost:8888/wordpress/";
    if ("active" == localStorage.getItem("status")) {
        jQuery(".activate-js").attr("style", "display: none !important"),
            jQuery("#uploadImage").css("display", "block"),
            jQuery("head").append('<link rel="stylesheet" id="parent-style-css" href="' + e + '/wp-content/plugins/gallery/inc/css/gll_style.css?ver=5.7.1" media="all">'),
            jQuery("head").append('<link rel="stylesheet" id="color-picker-css-css" href="' + e + '/wp-content/plugins/gallery/inc/js/color-picker/css/wheelcolorpicker.css?ver=5.7.1" media="all">');
        var t = document.createElement("script");
        (t.type = "text/javascript"),
            (t.src = e + '/wp-content/plugins/gallery/inc/js/gll_gallery.js?ver=1.1" id="gallery-patients-js'),
            document.head.appendChild(t),
            ((t = document.createElement("script")).type = "text/javascript"),
            (t.src = e + "/wp-content/plugins/gallery/inc/js/color-picker/jquery.wheelcolorpicker.min.js?ver=1.1"),
            document.head.appendChild(t),
            ((t = document.createElement("script")).type = "text/javascript"),
            (t.src = e + "/wp-admin/load-scripts.php?c=0&amp;load%5Bchunk_0%5D=jquery-core,jquery-migrate,jquery-ui-core,jquery-ui-mouse,jquery-ui-sortable,utils,moxiejs,plupload,jquery-ui-tooltip&amp;ver=5.7.1"),
            document.head.appendChild(t);
    }
});