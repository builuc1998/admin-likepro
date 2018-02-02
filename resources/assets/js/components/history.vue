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
                            <th>Pots ID</th>
                            <th>Đã chạy</th>
                            <th>Tổng</th>
                            <th>Update</th>
                        </tr>
                        <tr v-for="(list, keyIndex) in listVipID">
                            <td>{{keyIndex + 1}}</td>
                            <td>{{list.postid}}</td>
                            <td>{{list.dachay}}</td>
                            <td>{{list.tong}}</td>
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
        axios.get('api/history').then((response) => {
            this.listVipID = response.data;
            console.log(this.listVipID);
        })
    },
}
</script>