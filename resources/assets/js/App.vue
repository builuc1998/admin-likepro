<template>
    <div class="wrapper">
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <!-- Content Wrapper. Contains page content noidung-->
        <div class="content-wrapper row">
            <div class="" style="float: left;width: 100%;margin-bottom: 35px;">
                <div id="hihi">
                    <router-view>
                    </router-view>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <Footer></Footer>
    </div>
</template>
<script>
import axios from 'axios'
import Navbar from './components/layouts/Navbar.vue'
import Sidebar from './components/layouts/Sidebar.vue'
import Footer from './components/layouts/Footer.vue'
var info = [];

export default {
    components: {
        Navbar,
        Sidebar,
        Footer
    },
    replace: false,
    data() {
        return {
            posts: [],
            errors: [],
            info:{},
            action: '',
        }
    },
    methods:{
        install: function(){
            this.type = [];
            $('input[name="type[]"]:checked').each((i,e)=>{
                this.type.push($(e).val());
            });
            this.package = $('#package').val();
            this.uid = $('#uid').val();
            this.speed = $('#speed').val();
            this.time = $('#time').val();
            this.action = $('#action').val();
            this.content = $('#content').val();
            this.rate = $('#rate').val();
            this.token = $('meta[name="csrf-token"]').attr('content');
            
            if(this.uid == ''){
                    toastr.error("Vui lòng nhập UID!");
                    return false;
            }
            
            
            if(this.action == 'like'){
                if(this.type == ''){
                    toastr.error("Vui lòng chọn loại cảm xúc!");
                    return false;
                }else if(this.package == ''){
                    toastr.error("Vui lòng chọn gói cảm xúc!");
                    return false;
                }else if(this.speed == ''){
                    toastr.error("Vui lòng chọn thời gian cron!");
                    return false;
                }else if(this.time == ''){
                    toastr.error("Vui lòng chọn gói thời gian!");
                    return false;
                }
            }
            if(this.action == 'comment'){
                if(this.content == ''){
                    toastr.error("Vui lòng nhập nội dung comment!");
                    return false;
                }
            }
            axios.post('api/install',
                {
                    'uid':this.uid,
                    'type':this.type,
                    'package':this.package,
                    'content':this.content,
                    'speed':this.speed,
                    'time':this.time,
                    'rate':this.rate,
                    'action':this.action,
                    '__token':this.token
                }).then((response) => {
                if(response.data.success == 'true'){
                    toastr.success(response.data.message);
                }else{
                    toastr.error(response.data.message);
                }
            })
        },
        tinhtien: function(){
            this.package = $('#package').val();
            this.time = $('#time').val();
            $('#thanhtien').val(this.package * 1000 * (this.time / 15));
        }
    },
    mounted() {
        axios.get('api/me').then((response) => {
            this.info = response.data;
        })
    },
}
</script>