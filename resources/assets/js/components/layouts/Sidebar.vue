<template>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://cdn-images-1.medium.com/max/1600/0*MzEDN-Y0wRzYJ8Wo.png"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Khách</p>
                    <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MAIN MENU</li>
                <li>
                    <router-link to="/home">
                        <i class="fa fa-hand-o-right"></i> <span>a</span>
                    </router-link>
                </li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>
</template>