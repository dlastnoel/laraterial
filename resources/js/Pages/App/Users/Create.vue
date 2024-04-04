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
        <v-form @submit.prevent="handleSubmit()">
          <v-row dense>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="First Name"
                v-model="form.firstname"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Middle Name"
                v-model="form.middlename"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Last Name"
                v-model="form.lastname"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Name Extension"
                v-model="form.name_extension"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Contact Number"
                v-model="form.contact_no"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-select
                variant="outlined"
                density="compact"
                label="Role"
                :items="formOptions.roles"
                v-model="form.role"
              >
              </v-select>
            </v-col>
            <v-col cols="12" sm="6">
              <v-select
                variant="outlined"
                density="compact"
                label="Status"
                :items="formOptions.statuses"
                v-model="form.status"
              >
              </v-select>
            </v-col>
            <v-col cols="12">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Username"
                v-model="form.username"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Password"
                :type="isPasswordVisible ? 'text' : 'password'"
                :append-inner-icon="
                  !isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline'
                "
                @click:append-inner="isPasswordVisible = !isPasswordVisible"
                v-model="form.password"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                variant="outlined"
                density="compact"
                label="Password Confirmation"
                :type="isPasswordConfirmationVisible ? 'text' : 'password'"
                :append-inner-icon="
                  !isPasswordConfirmationVisible
                    ? 'mdi-eye-off-outline'
                    : 'mdi-eye-outline'
                "
                @click:append-inner="
                  isPasswordConfirmationVisible = !isPasswordConfirmationVisible
                "
                v-model="form.password_confirmation"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" class="d-flex justify-end align-center">
              <ButtonPrimary type="submit" name="Create" />
            </v-col>
          </v-row>
        </v-form>
      </FormWrapper>
    </v-row>
  </v-form>
</template>

<script>
import { Head, useForm } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'
import FormWrapper from '@/Components/FormWrapper.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'

export default {
  
  layout: AuthLayout,

  components: {
    Head,
    FormWrapper,
    ButtonPrimary
  },

  data() {

    return {

      form: useForm({
        firstname: '',
        middlename: '',
        lastname: '',
        name_extension: '',
        contact_no: '',
        role: 'user',
        status: 'active',
        username: '',
        password: '',
        password_confirmation: '',
      }),

      formOptions: {
        roles: ['admin', 'staff'],
        statuses: ['active', 'deactivated', 'terminated']
      },

      isPasswordVisible: false,
      isPasswordConfirmationVisible: false,
    }
  },

  methods: {

    handleSubmit() {

      this.form.post(route('users.store'), {

        preserveState: true,
        preserveScroll: true,

        onError: (errors) => {
          // handle errors here
        },

        onSuccess: () => {
          // show message here
        }
      })
    }
  }
}
</script>

<style>
</style>