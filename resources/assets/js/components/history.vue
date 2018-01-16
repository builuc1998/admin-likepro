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
                            <th>Pots ID</th>
                            <th>Đã chạy</th>
                            <th>Tổng</th>
                            <th>Action</th>
                            <th>Chi Tiết</th>
                        </tr>
                        <tr v-for="list in listVipID">
                            <td>{{list.postid}}</td>
                            <td>{{list.dachay}}</td>
                            <td>{{list.tong}}</td>
                            <td>{{list.type}}</td>
                            <td>
                                <router-link :to="{ path: 'view',query: { post_id: list.postid } }">
                                    <i class="fa fa-eye"></i>
                                </router-link>
                            </td>
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
        }
    },
    mounted() {
        axios.get('api/history').then((response) => {
            this.listVipID = response.data;
            console.log(this.listVipID);
        })
    },
}
</script>