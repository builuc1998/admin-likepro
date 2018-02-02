<template>
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b><i class="fa fa-gears"></i> Lịch Sử Hoạt Động</b>
            </div>
            <div class="panel-body">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>STT</th>
                            <th>Người Cài</th>
                            <th>UID</th>
                            <th>Action</th>
                            <th>Đã Chạy</th>
                            <th>Update</th>
                        </tr>
                        <tr v-for="(list, keyIndex) in listVipID">
                            <td>{{keyIndex + 1}}</td>
                            <td><router-link :to="'/user/'+list.userid">{{list.name}}</router-link></td>
                            <td>{{list.uid}}</td>
                            <td>{{list.action}}</td>
                            <td>{{list.total_postid}} Post ID</td>
                            <td>{{list.updated_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            posts: [],
            errors: [],
            type:[],
            package: '',
            uid: '',
            speed: '',
            time: '',
            listVipID: [],
            i : 0,
        }
    },
    mounted() {
        axios.get('api/viewtask').then((response) => {
            this.listVipID = response.data;
            console.log(this.listVipID);
        })
    },
}
</script>