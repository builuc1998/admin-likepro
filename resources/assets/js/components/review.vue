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
                            <input class="form-control" type="range" name="soluong" min="10" max="1000" id="limit" value="10" onchange="document.getElementById('soluong').innerHTML=this.value;">
                        </div>
                        <div class="form-group">
                            <select>
                                <option>1 Sao</option>
                                <option>2 Sao</option>
                                <option>3 Sao</option>
                                <option>4 Sao</option>
                                <option>5 Sao</option>
                            </select>
                        </div>
                        Thành Tiền:
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" disabled="disable" value="2000" class="form-control" id="thanhtien" />
                            <span class="input-group-addon">VNĐ</span>
                        </div>
                        <br>
                        <button type="button" onclick="install_vip()" class="btn btn-danger">Thanh Toán</button>
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