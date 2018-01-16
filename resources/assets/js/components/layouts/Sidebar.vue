<template>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img :src="this.$parent.info.avatar"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p id="name">{{this.$parent.info.name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MAIN MENU</li>
                <li>
                    <router-link to="/viplike">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Vip Like</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/history">
                        <i class="fa fa-hand-o-right"></i> <span>History</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/vipcomment">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Vip Comment</span>
                    </router-link>
                </li>
                <!--
                <li>
                    <router-link to="/vipshare">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Vip Share</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/review">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Review Fanpage</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/follow">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Vip Follow</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/likefanpage">
                        <i class="fa fa-hand-o-right"></i> <span>Mua Like Fanpage</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/follow">
                        <i class="fa fa-hand-o-right"></i> <span>Billing</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/vipbuff">
                        <i class="fa fa-hand-o-right"></i> <span>Vip Buff</span>
                    </router-link>
                </li>-->
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>
</template>
