<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Panel Cài Đặt Follow</b>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>ID mới cần thêm:</label>
                            <input id="uid" placeholder="100004520190007" type="number" class="form-control" name="id" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Số Lượng Follow</label>
                            <center>
                                <div class="label label-info" align="center">Follow: <span id="soluong">1000</span></div>
                            </center>
                            <input class="form-control" type="range" name="soluong" min="1000" max="50000" id="limit" value="60" onchange="document.getElementById('soluong').innerHTML=this.value;">
                        </div>
                        Thành Tiền:
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" disabled="disable" value="40000" class="form-control" id="thanhtien" />
                            <span class="input-group-addon">VNĐ</span>
                        </div>
                        <br>
                        <button type="button" class="btn btn-danger">Thanh Toán</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Danh Sách Follow ID</b>
                </div>
                <div class="panel-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <tr role="row">
                                        <th>ID </th>
                                        <th>Tổng</th>
                                        <th>Đã Chạy</th>
                                        <th>Còn Nợ</th>
                                        <th>Thời Gian</th>
                                    </tr>
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
    replace: false,
    data() {
        return {
            posts: [],
            errors: [],
            info:{},
        }
    },
    mounted() {
        axios.get('api/follow').then((response) => {
            this.info = response.data;
        })
    },
}
</script>
