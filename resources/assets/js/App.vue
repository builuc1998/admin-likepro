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
            if(this.action == 'like'){
                if(this.type == ''){
                    toastr.error("Vui lòng ch?n lo?i c?m xúc!");
                    return false;
                }else if(this.package == ''){
                    toastr.error("Vui lòng ch?n gói c?m xúc!");
                    return false;
                }else if(this.uid == ''){
                    toastr.error("Vui lòng nh?p UID!");
                    return false;
                }else if(this.speed == ''){
                    toastr.error("Vui lòng ch?n lo?i th?i gian cron!");
                    return false;
                }else if(this.time == ''){
                    toastr.error("Vui lòng ch?n gói th?i gian!");
                    return false;
                }
            }
            axios.post('api/installViplike',
                {
                    'uid':this.uid,
                    'type':this.type,
                    'package':this.package,
                    'speed':this.speed,
                    'time':this.time,
                    'action':this.action
                }).then((response) => {
                if(response.data.success == 'true'){
                    toastr.success(response.data.message);
                }else{
                    toastr.error(response.data.message);
                }
            })
        }
    },
    mounted() {
        axios.get('api/me').then((response) => {
            this.info = response.data;
        })
    },
}
</script>