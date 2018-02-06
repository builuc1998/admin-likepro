<template>
    <div>
    <div class="" style="padding-left: 15px;">
        <label>Chọn trạng thái - id</label>
    </div>
    <div class="form-group" style="padding-left: 15px;">
        <select id="change" v-on:change="viewByStatus" class="form-control col-md-3" style="width: 20% !important;">
            <option value="new">Chọn trạng thái </option>
            <option  v-for="st in status" :value="st.status">{{st.status}}</option>
        </select>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>Uid</th>
            <th>Email</th>
            <th>Password</th>
            <th>CMTID</th>
            <th>PHOTOID</th>
            <th>Sex</th>
            <th>Link Suport</th>
            <th>Fist Name</th>
            <th>Lsst Name</th>
            <th>Birthday</th>
            <th>Time Create</th>
            <th>Time Update</th>
            <th>Xoay Tua</th>
            <th style="display: none;">Token</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cl in clone.data">
            <td><a :href="'https://fb.com/'+cl.uid" target="_blank">{{cl.uid}}</a></td>
            <td>{{cl.email}}</td>
            <td>
                <p v-if="($parent.info.level == 2 || $parent.info.email == 'builuc1998@gmail.com' || $parent.info.email == 'vinguyet6666@asiamovie.info')">{{cl.password}}</p>
                <p v-else>hihi</p>
            </td>
            <td><a :href="'http://125.212.245.115:88/IDRequest.ashx?id='+cl.cmtid" target="_blank">{{cl.cmtid}}</a>
            </td>
            <td>{{cl.photoid}}</td>
            <td>{{cl.sex}}</td>
            <td><a @click.prevent="cp('sp_'+cl.id)" :id="'sp_'+cl.id" :title="cl.linksp">Click Copy</a></td>
            <td>{{cl.lastname}}</td>
            <td>{{cl.firstname}}</td>
            <td>{{cl.birthday}}</td>    
            <td>{{cl.created_at}}</td>
            <td>{{cl.updated_at}}</td>
            <td  style="display: none;">{{cl.token}}</td>
            <td>{{cl.xoaytua}}</td>
          </tr>
        </tbody>
      </table>
        <pagination 
          :total="this.clone.total" 
          :per_page= "this.clone.per_page" 
          :current_page= "this.clone.current_page" 
          :last_page= "this.clone.last_page" 
          :next_page_url= "this.clone.next_page_url" 
          :prev_page_url= "this.clone.prev_page_url" 
          :from= "this.clone.from" 
          :to= "this.clone.to" 
        ></pagination>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import pagination from './pagination.vue'
export default{
    data(){
        return{
            clone : [],
            status : [],
            n:0
        }
    },
    components: {
        pagination,
    },
    methods:{
        toPage(n){
            let $this = this;
            axios.get(this.clone.path+'?page='+n)
            .then(function (response){
                $this.clone = response.data.clone;
                $this.status = response.data.status;
              })
              .catch(function (error) {
                console.log(error);
              });
        },
        viewByStatus: function(){
            axios.get('api/clone/'+$('#change').val()).then((response) => {
                this.clone = response.data.clone;
                this.status = response.data.status;
            })
        },
        cp: function(id){
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($('#'+id).attr('title')).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Copy thành công');
        },
    },
    mounted() {
        axios.get('api/clone').then((response) => {
            this.clone = response.data.clone;
            this.status = response.data.status;
        })
    }    
}
</script>