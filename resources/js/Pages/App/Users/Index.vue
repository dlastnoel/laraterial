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
import { Link, Head } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import Pagination from '@/Components/Pagination.vue'
import TableWrapper from '@/Components/TableWrapper.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'

import { displayName } from '@/Helpers/names'


export default {

  layout: AuthLayout,
  
  components: {
    Link,
    Head,
    Breadcrumbs,
    Pagination,
    TableWrapper,
    ButtonPrimary,
  },

  props: {
    users: Object
  },

  data() {

  },

  methods: {

    displayName,
  }

}
</script>

<style>
</style>