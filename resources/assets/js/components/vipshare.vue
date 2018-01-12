<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Panel Cài Đặt Vip Share</b>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>ID mới cần thêm:</label>
                            <input id="uid" placeholder="100004520190007" type="number" class="form-control" name="id" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Số Share/1 Bài Viết</label>
                            <center>
                                <div class="label label-info" align="center">Share: <span id="soluong">1000</span></div>
                            </center>
                            <input class="form-control" type="range" name="package" min="1000" max="10000" id="package" value="10" onchange="document.getElementById('soluong').innerHTML=this.value;">
                        </div>
                        <div class="form-group">
                            <label>Tốc Độ Like/5 Phút:</label>
                            <select name="speed" id="speed" class="form-control">
                                <option value="30">30 Comment</option>
                                <option value="40">40 Comment</option>
                                <option value="50">50 Comment</option>
                                <option value="100">100 Comment</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời Hạn:</label>
                            <select name="time" id="time" class="form-control" v-on:change="this.$parent.tinhtien">
                                <!--<option value="free">Free Test 1 Day</option>-->
                                <option value="15">15 Ngày (0.5 Tháng)</option>
                                <option value="30">30 Ngày (1 Tháng)</option>
                                <option value="45">45 Ngày (1.5 Tháng)</option>
                                <option value="60">60 Ngày (2 Tháng)</option>
                            </select>
                        </div>
                        Thành Tiền:
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" disabled="disable" value="2000" class="form-control" id="thanhtien" />
                            <input type="hidden" value="share" id="action" />
                            <span class="input-group-addon">VNĐ</span>
                        </div>
                        <br>
                        <button type="button" v-on:click="this.$parent.install" class="btn btn-danger">Thanh Toán</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Danh Sách Vip Share</b>
                </div>
                <div class="panel-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>UID</th>
                                        <th>Gói</th>
                                        <th>Hạn Sử Dụng</th>
                                        <th>Active</th>
                                    </tr>
                                    <tr v-for="list in listVipID.data">
                                        <td>{{list.uid}}</td>
                                        <td>{{list.limit * 10}} Share</td>
                                        <td>{{list.time}} Ngày</td>
                                        <td><input type="checkbox" :checked="list.active == 1 ? 'checked':''" /> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        axios.get('api/getViplikeID?action=share').then((response) => {
            this.listVipID = response.data;
        })
    },
}
</script>