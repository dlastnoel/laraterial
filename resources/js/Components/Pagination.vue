<template>
  <div v-if="meta.links.length > 3">
    <div class="d-flex w-100 justify-space-between align-center mt-6">
      <p class="text-subtitle-2">
        Showing {{ meta.from }} - {{ meta.to }} of {{ meta.total }}
      </p>
      <div class="flex flex-wrap -mb-1">
        <template v-for="(link, i) in meta.links" :key="i">
          <template v-if="link.url !== null">
            <Link
              :href="link.url"
              class="text-black text-decoration-none"
              preserve-state
              :only="partials"
            >
              <template v-if="link.active">
                <v-btn
                  variant="flat"
                  size="small"
                  color="grey-lighten-2"
                  v-html="link.label"
                ></v-btn>
              </template>
              <template v-else>
                <v-btn variant="flat" size="small" v-html="link.label"></v-btn>
              </template>
            </Link>
          </template>
          <template v-else>
            <v-btn
              disabled
              v-if="link.url === null"
              v-html="link.label"
              variant="flat"
              size="small"
            ></v-btn>
          </template>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {

  components: {
    Link,
  },

  props: {

    meta: {
      type: Object,
      required: true,
    },

    partials: {
      type: Array,
      default: [],
    }
  },
}
</script>

<style>
</style>
