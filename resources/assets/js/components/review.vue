<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Panel Cài Đặt Review Page</b>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>ID mới cần thêm:</label>
                            <input id="uid" placeholder="100004520190007" type="number" class="form-control" name="id" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Số Review</label>
                            <center>
                                <div class="label label-info" align="center">Review: <span id="soluong">10</span></div>
                            </center>
                            <input class="form-control" type="range" name="package" min="10" max="1000" id="package" value="10" onchange="document.getElementById('soluong').innerHTML=this.value;">
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="content" placeholder="Nhiều nội dung cách nhau bằng dấu gạch thẳng '|' Nội dung 1 | Nội dung 2 | Nội dung 3" class="form-control" rows="6" style="max-width: 100%"></textarea>
                        </div>
                        <div class="form-group">
                            <select id="rate">
                                <option value="1">1 Sao</option>
                                <option value="2">2 Sao</option>
                                <option value="3">3 Sao</option>
                                <option value="4">4 Sao</option>
                                <option value="5">5 Sao</option>
                            </select>
                        </div>
                        Thành Tiền:
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" disabled="disable" value="2000" class="form-control" id="thanhtien" />
                            <input type="hidden" value="review" id="action" />
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
                    <b><i class="fa fa-gears"></i> Danh Sách Review</b>
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
                                        <th>Rate</th>
                                        <th>Active</th>
                                    </tr>
                                    <tr v-for="list in listVipID.data">
                                        <td>{{list.uid}}</td>
                                        <td>{{list.limit * 10}} Review</td>
                                        <td>{{list.rate}}*</td>
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
        axios.get('api/getViplikeID?action=review').then((response) => {
            this.listVipID = response.data;
        })
    },
}
</script>