<template>
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><i class="fa fa-gears"></i> Thông Tin Cá Nhân</b>
                        <input type="hidden" id="id" :value="$route.params.id" />
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" :value="this.infouser.email" disabled=""/>
                        </div>
                        <div class="form-group">
                            <label>Fbid</label>
                            <input type="text" class="form-control" :value="this.infouser.fbid" disabled=""/>
                        </div>
                        <div class="form-group">
                            <label>Tài Khoản</label>
                            <input type="text" class="form-control" :value="this.infouser.money" disabled=""/>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" :value="this.infouser.name" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><i class="fa fa-gears"></i> Lịch Sử Giao Dịch</b>
                    </div>
                    <div class="panel-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <tr role="row">
                                            <th>ID </th>
                                            <th>Loại Giao Dịch</th>
                                            <th>Số Tiền</th>
                                            <th>Note</th>
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
    </div>
</template>
<script>

import axios from 'axios'
export default {
    data() {
        return {
            infouser : [],
            
        }
    },
    mounted() {
        this.id = $('#id').val();
        axios.get('api/infouser?id='+this.id).then((response) => {
            this.infouser = response.data;
            console.log();
        })
    },
}
</script>