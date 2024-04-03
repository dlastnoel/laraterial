<template>
  <v-col cols="12" md="4">
    <p class="v-card-title">{{ name }}</p>
    <p class="v-card-subtitle text-justify white-space-wrap">
      {{ description }}
    </p>
  </v-col>
  <v-col cols="12" lg="8">
    <v-card class="px-5 py-5">
      <v-card-text>
        <slot />
      </v-card-text>
    </v-card>
  </v-col>
</template>

<script>
export default {

  props: {
    name: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    }
  }
}
</script>

<style>
</style>