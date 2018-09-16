<script type="text/javascript">
function getFileImage(file) {
    var fileExt = file.substr((~-file.lastIndexOf('.') >>> 0) + 2);
    var result = {'file':file, 'isPhoto':true};
    if (fileExt.length
        && ['jpg', 'jpeg', 'png', 'gif'].indexOf(fileExt) < 0
        && fileExt.indexOf('/') < 0
    ) {
        result.file = '{{asset('assets/images/file-ext-icons')}}/' + fileExt + '.png';
        result.isPhoto = false;
    } else if (! fileExt.length || fileExt.indexOf('/') >= 0) {
        result.file = '{{asset('assets/images/file-ext-icons/www.png')}}';
        result.isPhoto = false;
    }

    return result;
}
</script>
