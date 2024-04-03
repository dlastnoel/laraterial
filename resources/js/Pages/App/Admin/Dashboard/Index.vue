<template>
  <Head>
    <title>Dashboard</title>
  </Head>
  <Breadcrumbs
    :items="[
      {
        title: 'Dashboard',
        disabled: false,
        href: '#',
      },
    ]"
  />
</template>

<script>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { Link, Head } from '@inertiajs/vue3'

export default {

  layout: AuthLayout,

  components: {
    Link,
    Head
  }
  
}
</script>

<style>
</style>