<template>
  <Head>
    <title>Login</title>
  </Head>

  <v-app>
    <v-card class="pa-3" width="500">
      <v-card-item>
        <v-card-title>Welcome back!</v-card-title>
        <v-card-subtitle>Login to access your account.</v-card-subtitle>
      </v-card-item>
      <v-card-text>
        <v-form @submit.prevent="handleSubmit()">
          <v-row>
            <v-col cols="12">
              <v-text-field
                variant="outlined"
                label="Username"
                v-model="form.username"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="password"
                variant="outlined"
                label="Password"
                :append-inner-icon="
                  !isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline'
                "
                @click:append-inner="isPasswordVisible = !isPasswordVisible"
                v-model="form.password"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12">
              <ButtonPrimary type="submit" name="Login" width="100%" />
            </v-col>
          </v-row>
        </v-form>
      </v-card-text>
    </v-card>
  </v-app>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import { useForm } from '@inertiajs/vue3'

export default {

  components: {
    Head,
    ButtonPrimary
  },

  data() {

    return {
      
      isPasswordVisible: false,

      form: useForm({
        username: '',
        password: '',
      })
    }
  },

  methods: {

    handleSubmit() {

      this.form.post(route('auth.store'), {

        preserveState: true,
        preserveScroll: true,

        onError: (errors) => {

          // do something with errors here
        }
      })
    }
  }
}
</script>

<style>
</style>