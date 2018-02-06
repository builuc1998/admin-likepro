<template>
    <div style="width: 50%;margin: 10px auto;">
        <div class="form-group">
            <label>Text Logo</label>
            <input type="text" class="form-control" id="logo" :value="this.$parent.config[0].value"/>
        </div>
        <div class="form-group">
            <label>Text Logo Mini</label>
            <input type="text" class="form-control" id="logo-mini" :value="this.$parent.config[1].value" />
        </div>
        <div class="form-group">
            <label>Coppyright</label>
            <input type="text" class="form-control" id="copyright" :value="this.$parent.config[2].value" />
        </div>
        <div class="form-group">
            <label>Powered</label>
            <input type="text" class="form-control" id="powered" :value="this.$parent.config[3].value" />
        </div>
        <div class="form-group">
            <label>Link Powered</label>
            <input type="text" class="form-control" id="link-powered" :value="this.$parent.config[3].link" />
        </div>
        <div class="form-group">
            <label>Chủ Tài Khoản</label>
            <input type="text" class="form-control" id="ctk" :value="this.$parent.config[5].value" />
        </div>
        <div class="form-group">
            <label>Số Tài Khoản</label>
            <input type="text" class="form-control" id="stk" :value="this.$parent.config[5].value" />
        </div>
        <div class="form-group">
            <label>Ngân Hàng</label>
            <input type="text" class="form-control" id="nganhang" :value="this.$parent.config[6].value" />
        </div>
        <button v-on:click="changeConfig" class="btn btn-danger">Lưu Thay Đổi</button>
    </div>
</template>
<script>
import axios from 'axios'
export default{
    methods : {
        changeConfig : function(){
            this.data = {'logo':$('#logo').val(),
                        'logo-mini':$('#logo-mini').val(),
                        'copyright':$('#copyright').val(),
                        'powered':$('#powered').val(),
                        'link-powered':$('#link-powered').val(),
                        'ctk':$('#ctk').val(),
                        'stk':$('#stk').val(),
                        'nganhang':$('#nganhang').val(),
                        '_token':$('meta[name="csrf-token"]').attr('content')}
            axios.post('/api/changeConfig',this.data)
            .then((response)=>{
                toastr.success(response.data.message);
            })
            .catch((error)=>{
                toastr.error('Có lỗi xảy ra không thể lưu thay đổi');
            })
        }
    }
}
</script>