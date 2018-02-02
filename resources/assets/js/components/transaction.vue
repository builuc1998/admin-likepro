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
                            <th>User</th>
                            <th>TransactionID</th>
                            <th>Money</th>
                            <th>Status</th>
                            <th>Time Create</th>
                            <th>Active</th>
                        </tr>
                        <tr v-for="(tran, keyIndex) in transaction">
                            <td>{{keyIndex + 1}}</td>
                            <td><router-link :to="'user/'+tran.userid">{{tran.name}}</router-link></td>
                            <td>{{tran.id}}</td>
                            <td>{{tran.money}}</td>
                            <td>{{tran.status}}</td>
                            <td>{{tran.created_at}}</td>
                            <td>
                                <a v-if="tran.status === 'pending'" class="btn btn-warning" v-on:click="ConfirmTransaction(tran.id)" >Active</a>
                                <a v-else class="btn btn-success" disabled >Active</a>
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
            transaction: [],
        }
    },
    methods:{
        ConfirmTransaction: function(id){
            console.log(id);
            axios.post('api/ConfirmTransaction',{'id':id,'token':$('meta[name="csrf-token"]').attr('content')})
            .then((response)=>{
                if(response.data.success == 'true'){
                    toastr.success(response.data.message);
                    axios.get('api/transaction').then((response) => {
                        this.transaction = response.data;
                    })
                }else{
                    toastr.error(response.data.message);
                }
            })
        }  
    },
    mounted() {
        axios.get('api/transaction').then((response) => {
            this.transaction = response.data;
        })
    },
}
</script>