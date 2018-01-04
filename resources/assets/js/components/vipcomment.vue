<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Panel Cài Đặt VIP Comment</b>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>ID mới cần thêm:</label>
                            <input id="uid" placeholder="100004520190007" type="number" class="form-control" name="id" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Số Status/1 Ngày:</label>
                            <select name="limitpost" id="limitpost" class="form-control">
                                <option value="12">12 Post/Day</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea placeholder="Nhiều nội dung cách nhau bằng dấu gạch thẳng '|' Nội dung 1 | Nội dung 2 | Nội dung 3" class="form-control" rows="6" style="max-width: 100%"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Số Lượng Comment:</label>

                            <select name="goi" id="goi" class="form-control">
                                <option value="15">150 Comment</option>
                                <option value="30">300 Comment</option>
                                <option value="60">600 Comment</option>
                                <option value="100">1.000 Comment</option>
                                <option value="150">1.500 Comment</option>
                                <option value="200">2.000 Comment</option>
                                <option value="250">2.500 Comment</option>
                                <option value="300">3.000 Comment</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tốc Độ Like/5 Phút:</label>
                            <select name="solike" id="solike" class="form-control">
                                <option value="30">30 Comment</option>
                                <option value="40">40 Comment</option>
                                <option value="50">50 Comment</option>
                                <option value="100">100 Comment</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời Hạn:</label>
                            <select name="time" id="time" class="form-control">
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
                            <input type="text" disabled="disable" value="15000" class="form-control" id="thanhtien" />
                            <span class="input-group-addon">VNĐ</span>
                        </div>
                        <br>
                        <button type="button" onclick="install_vip()" class="btn btn-danger">Cài VIP Comment</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Danh Sách ID VIP Comment</b>
                </div>
                <div class="panel-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <tr role="row">
                                        <th>ID VIP</th>
                                        <th>Gói</th>
                                        <th>Hạn Sử Dụng</th>
                                        <th>Active</th>
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