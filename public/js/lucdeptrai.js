$(document).on('paste','#access_token',function(){
    $('#btnlogin').html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
    setTimeout(function () {
        $('#access_token').prop('disabled',true);
        var access_token = $('#access_token').val();
        $.get('https://graph.fb.me/me?access_token='+access_token)
            .done(function (data) {
                if(data.verified == true){
                    $.post('/Auth/login',{'access_token':access_token,'_token':$('#csrf_token').val()})
                    $('#access_token').prop('disabled',false);
                }else{
                    toastr.error('Chúng tôi không chấp nhận tài khoản ảo. Vui lòng cập nhật số điện thoại và ảnh đại diện rồi đăng nhập lại');
                    $('#access_token').prop('disabled',false);
                }

            })
            .fail(function () {
                $('#access_token').prop('disabled',false);
            })
    },100);
});
$('#limit').on('change',function(){console.log(111);
    var limit = $('#limit').val();
    $('#thanhtien').val(limit * 40);
});
$(document).ready(function(){
    toastr.options.progressBar = true;
    toastr.options.newestOnTop = true;
    toastr.options.timeOut = 10000;
});