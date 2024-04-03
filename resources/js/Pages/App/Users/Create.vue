<template>
  <Head>
    <title>Users</title>
  </Head>

  <Breadcrumbs
    :items="[
      {
        title: 'Users',
        disabled: false,
        href: route('users.index'),
      },
      {
        title: 'Create',
        disabled: false,
        href: '/',
      },
    ]"
  />

  <v-form @submit.prevent="handleSubmit()">
    <v-row>
      <FormWrapper
        name="User Profile"
        description="This information will be displayed publicly so be careful what to share."
      >
      </FormWrapper>
    </v-row>
  </v-form>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'
import FormWrapper from '@/Components/FormWrapper.vue'

export default {
  
  layout: AuthLayout,

  components: {
    Head,
    FormWrapper
  },
}
</script>

<style>
</style>