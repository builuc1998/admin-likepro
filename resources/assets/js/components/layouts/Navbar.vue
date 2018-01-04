<template>
    <header class="main-header">
        <!-- Logo -->
    <router-link to="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LP</b>V</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LikePro</b>.VIP</span>
    </router-link>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img id="avatar" class="profile-user-img img-responsive img-circle user-image"
                     :src="this.$parent.info.avatar" alt="User profile picture">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs" id="name">{{this.$parent.info.name}}</span>
            </a>
            <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
                <img class="profile-user-img img-responsive img-circle"
                     :src="this.$parent.info.avatar" alt="User profile picture">

                <p>
                    {{this.$parent.info.name}}
                    <small>{{this.$parent.info.money}}</small>
                    <small>{{this.$parent.info.email}}</small>
                </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
            <div class="pull-left">
                <router-link to="/profile" class="btn btn-default btn-flat">Profile</router-link>
            </div>
            <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Log out
            </a>
        </div>
    </li>
</ul>
        </li>
        </ul>
        </div>
        </nav>
        </header>
</template>
