<template>
    <div class="wrapper">
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <!-- Content Wrapper. Contains page content noidung-->
        <div class="content-wrapper row">
            <div class="" style="float: left;width: 100%;margin-bottom: 35px;">
                <div id="hihi">
                    <router-view>
                    </router-view>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <Footer></Footer>
    </div>
</template>
<script>
import axios from 'axios'
import Navbar from './components/layouts/Navbar.vue'
import Sidebar from './components/layouts/Sidebar.vue'
import Footer from './components/layouts/Footer.vue'

export default {
    components: {
        Navbar,
        Sidebar,
        Footer
    },
    replace: false,
    data() {
        return {
            posts: [],
            errors: []
        }
    },
    created() {
        axios.get('http://jsonplaceholder.typicode.com/posts')
            .then(response => {
            // JSON responses are automatically parsed.
            this.posts = response.data
    })
    .catch(e => {
            this.errors.push(e)
    })
    }
}
</script>