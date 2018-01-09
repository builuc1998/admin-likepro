$(document).ready(function(){
    toastr.options.progressBar = true;
    toastr.options.newestOnTop = true;
    toastr.options.timeOut = 10000;
});
function a(){
    var type = [];
    $('input[name="type[]"]:checked').each(function(){
        type.push($(this).val());
    });
}