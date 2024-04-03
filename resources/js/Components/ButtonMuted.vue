<template>
  <v-btn min-width="100" color="grey-lighten-4">{{ name }}</v-btn>
</template>

<script>
export default {

  props: {
    name: {
      type: String,
      required: true
    }
  }
}
</script>

<style>
</style>
