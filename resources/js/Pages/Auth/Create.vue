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
        <Form as="v-form" @submit="handleSubmit">
          <v-row>
            <v-col cols="12">
              <Field
                v-slot="{ field, errorMessage }"
                name="username"
                label="Username"
                v-model="form.username"
                rules="required"
              >
                <v-text-field
                  variant="outlined"
                  label="Username"
                  v-bind="field"
                  :model-value="field.value"
                  :error-messages="errorMessage"
                >
                </v-text-field>
              </Field>
            </v-col>
            <v-col cols="12">
              <Field
                v-slot="{ field, errorMessage }"
                name="password"
                label="Password"
                v-model="form.password"
                rules="required"
              >
                <v-text-field
                  type="password"
                  variant="outlined"
                  label="Password"
                  :append-inner-icon="
                    !isPasswordVisible
                      ? 'mdi-eye-off-outline'
                      : 'mdi-eye-outline'
                  "
                  @click:append-inner="isPasswordVisible = !isPasswordVisible"
                  v-bind="field"
                  :model-value="field.value"
                  :error-messages="errorMessage"
                >
                </v-text-field>
              </Field>
            </v-col>
            <v-col cols="12">
              <ButtonPrimary type="submit" name="Login" width="100%" />
            </v-col>
          </v-row>
        </Form>
      </v-card-text>
    </v-card>
  </v-app>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import { Form, Field } from 'vee-validate'
import { useForm } from '@inertiajs/vue3'
import notyf from '@/Composables/useNotyf'

export default {

  components: {
    Head,
    ButtonPrimary,
    Field,
    Form
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
          for(const i in errors){
            notyf.toast(errors[i], 'error')
          }
        },

        onSuccess: () => {
          notyf.toast('Welcome!')
        }
      })
    }
  }
}
</script>

<style>
</style>