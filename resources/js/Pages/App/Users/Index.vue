<template>
  <Head>
    <title>Users</title>
  </Head>

  <div class="d-flex justify-space-between align-center">
    <Breadcrumbs
      :items="[
        {
          title: 'Users',
          disabled: false,
          href: '#',
        },
      ]"
    />
    <Link :href="route('users.create')" class="text-decoration-none">
      <ButtonPrimary name="Create" />
    </Link>
  </div>

  <FilterWrapper>
    <v-form @submit.prevent="handleFilter()">
      <v-row dense>
        <v-col cols="12" md="6">
          <v-text-field
            label="Search"
            variant="outlined"
            density="compact"
            hide-details
            v-model="filterForm.query"
          >
          </v-text-field>
        </v-col>
        <v-col cols="12" md="3">
          <v-select
            label="Role"
            variant="outlined"
            density="compact"
            hide-details
            :items="filterOptions.roles"
            v-model="filterForm.role"
          >
          </v-select>
        </v-col>
        <v-col cols="12" md="3">
          <v-select
            label="Status"
            variant="outlined"
            density="compact"
            hide-details
            :items="filterOptions.statuses"
            v-model="filterForm.status"
          >
          </v-select>
        </v-col>
        <v-col cols="12" md="6" lg="4">
          <v-select
            label="Sort By"
            variant="outlined"
            density="compact"
            hide-details
            :items="filterOptions.sortings"
            v-model="filterForm.sort_by"
          >
          </v-select>
        </v-col>
        <v-col cols="12" md="6" lg="4">
          <v-select
            label="Direction"
            variant="outlined"
            density="compact"
            hide-details
            :items="filterOptions.directions"
            v-model="filterForm.direction"
          >
          </v-select>
        </v-col>
        <v-col cols="12" md="6" lg="4">
          <v-select
            label="Size"
            variant="outlined"
            density="compact"
            hide-details
            :items="filterOptions.sizes"
            v-model="filterForm.size"
          >
          </v-select>
        </v-col>
        <v-col cols="12" class="d-flex justify-end align-center gc-2">
          <ButtonMuted @click.prevent="handleResetFilter()" name="Reset" />
          <ButtonPrimary type="submit" name="Filter" />
        </v-col>
      </v-row>
    </v-form>
  </FilterWrapper>

  <TableWrapper>
    <v-table>
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Contact Number</th>
          <th>Username</th>
          <th>Role</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, i) in users.data" :key="i">
          <td>{{ displayName(user) }}</td>
          <td>{{ user.contact_no }}</td>
          <td>{{ user.username }}</td>
          <td>{{ user.role }}</td>
          <td>{{ user.status }}</td>
          <td></td>
        </tr>
      </tbody>
    </v-table>

    <Pagination :meta="users.meta" :partials="['users']" />
  </TableWrapper>
</template>

<script>
import { Link, Head, useForm } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'
import FilterWrapper from '@/Components/FilterWrapper.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import Pagination from '@/Components/Pagination.vue'
import TableWrapper from '@/Components/TableWrapper.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import ButtonMuted from '@/Components/ButtonMuted.vue'

import { displayName } from '@/Helpers/names'
import { defaultDirections, defaultSizes } from '@/Utils/filters.js'


export default {

  layout: AuthLayout,
  
  components: {
    Link,
    Head,
    Breadcrumbs,
    Pagination,
    TableWrapper,
    ButtonPrimary,
    FilterWrapper,
    ButtonMuted,
  },

  props: {
    users: Object,
    filters: Object,
  },

  data() {

    return {

      filterForm: useForm({
        query: this.filters.query ?? '',
        role: this.filters.role ?? 'All',
        status: this.filters.status ?? 'All',
        sort_by: this.filters.sort_by ?? 'Name',
        direction: this.filters.direction ?? 'Ascending',
        size: this.filters.size ?? 10
      }),

      filterOptions: {
        roles: ['admin', 'user'],
        statuses: ['Active','Deactivated', 'Terminated'],
        sortings: ['Name', 'Username', 'Role', 'Status'],
        directions: defaultDirections,
        sizes: defaultSizes,
      }
    }
  },

  methods: {

    displayName,

    handleFilter() {

      this.filterForm.get(route('users.index'), {

        preserveState: true,
        preserveScroll: true,
        only: ['users']
      })
    },

    handleResetFilter() {
      
      this.filterForm.query = ''
      this.filterForm.role = 'All'
      this.filterForm.status = 'All'
      this.filterForm.sort_by = 'Name'
      this.filterForm.direction = 'Ascending'
      this.filterForm.size = 10

      this.handleFilter()
    }
  }

}
</script>

<style>
</style>