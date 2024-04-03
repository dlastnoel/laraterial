<template>
  <v-app>
    <!-- Navigation -->
    <v-navigation-drawer v-model="drawer" width="278" class="bg-grey-darken-4">
      <div class="d-flex flex-column justify-center align-center pa-2">
        <p class="text-h2 font-weight-medium">Logo Here</p>
      </div>
      <v-divider></v-divider>

      <div class="mt-6">
        <p class="ml-2 text-caption">{{ navRole }}</p>
        <v-list density="compact" nav>
          <template v-for="(navItem, i) in navItems" :key="i">
            <Link
              :href="route(navItem.route)"
              preserve-state
              class="text-decoration-none text-white"
            >
              <v-list-item
                link
                color="yellow"
                :prepend-icon="navItem.icon"
                :title="navItem.title"
                :exact="navItem.exact"
                :class="{
                  'v-list-item--active': navItem.active,
                }"
              >
              </v-list-item>
            </Link>
          </template>
        </v-list>
      </div>
    </v-navigation-drawer>

    <!-- Navbar -->
    <v-app-bar :elevation="0" class="pe-2">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-spacer></v-spacer>
      <p class="text-subtitle">{{ $page.props.auth.user.firstname }}</p>
      <v-menu>
        <template v-slot:activator="{ props }">
          <v-btn icon="mdi-dots-vertical" v-bind="props"></v-btn>
        </template>
        <v-list nav>
          <!-- <Link :href="route('user-profile.index')" as="div">
            <v-list-item link class="text-decoration-none" title="Profile">
            </v-list-item>
          </Link>
          <Link :href="route('user-password.index')" as="div">
            <v-list-item link class="text-decoration-none" title="Password">
            </v-list-item>
          </Link> -->
          <v-list-item
            title="Logout"
            value="dashboard"
            @click.prevent="handleLogout()"
          ></v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-main class="bg-white">
      <v-container fluid>
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>

import { Link } from '@inertiajs/vue3'

export default {

  components: {
    Link,
  },

  data() {
    return {
      drawer: true,
      navTitle: 'Laraterial',
    }
  },

  computed: {
    navRole(){
        return this.$page.props.auth.user.role.charAt(0).toUpperCase(0) + this.$page.props.auth.user.role.slice(1)
    },

    navItems() {
      
        const adminDashboard = { 
            icon: 'mdi-view-dashboard',
            title: 'Dashboard',
            route: 'admin.dashboard.index',
            active: route().current('admin.dashboard.index'),
        }

        const users = {
          icon: 'mdi-account-supervisor-circle',
          title:'Users',
          route: 'users.index',
          active: route().current('users.*') && !route().current('users.dashboard.index')
        }

        const userDashboard = { 
            icon: 'mdi-view-dashboard',
            title: 'Dashboard',
            route: 'user.dashboard.index',
            active: route().current('user.dashboard.index'),
        }

        if(this.$page.props.auth.user.role == 'admin') {
            return [
              adminDashboard,
              users
            ]
        }
        
        if(this.$page.props.auth.user.role === 'staff'){
            return [
              userDashboard
            ]
        }
    }
      
  },

  methods: {

    handleLogout() {

    this.$inertia.post(route('auth.logout'), '', {
    })
    }
  },

        
}
</script>