var TinyMCE = function() {

    function initTinyMce() {
        function elFinderBrowser (field_name, url, type, win) {
          tinymce.activeEditor.windowManager.open({
            file: '/elfinder/tinymce4',
            title: 'File Manager',
            width: 900,
            height: 450,
            resizable: 'yes'
          }, {
            setUrl: function (url) {
              win.document.getElementById(field_name).value = url;
            }
          });
          return false;
        }

        tinymce.init({
            selector: "textarea.editor",
            theme: "modern",
            content_css: window.siteCss,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            toolbar2: "template | forecolor backcolor emoticons",
            image_advtab: true,
            file_browser_callback : elFinderBrowser,
            // templates: urlPrefix + "backend/template/list",
            image_dimensions: false,
            relative_urls: false,
        });
    }

    return {
        init: function() {
            initTinyMce();
        }
    };
}();
