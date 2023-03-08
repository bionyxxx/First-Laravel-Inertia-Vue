<script setup>
import App from "@/Layouts/App.vue";
import {Head, router, useForm} from '@inertiajs/vue3'


const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})
</script>

<template>
    <App>
        <Head title="Register"/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>Register</h1>
                            <form @submit.prevent="form.post(route('register'))">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input v-model="form.name" class="form-control"
                                           :class="{'is-invalid' : form.errors.name}" type="text"
                                           placeholder="John Doe">
                                    <div v-if="form.errors.name" class="invalid-feedback">{{ form.errors.name }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input v-model="form.email" class="form-control"
                                           :class="{'is-invalid' : form.errors.email}" type="email"
                                           placeholder="johndoe@email.com">
                                    <div v-if="form.errors.email" class="invalid-feedback">{{ form.errors.email }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input v-model="form.password" class="form-control"
                                           :class="{'is-invalid' : form.errors.password}" type="password">
                                    <div v-if="form.errors.password" class="invalid-feedback">{{
                                            form.errors.password
                                        }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password Confirmation</label>
                                    <input v-model="form.password_confirmation" class="form-control"
                                           :class="{'is-invalid' : form.errors.password_confirmation}" type="password">
                                    <div v-if="form.errors.password_confirmation" class="invalid-feedback">
                                        {{ form.errors.password_confirmation }}
                                    </div>
                                </div>
                                <button type="submit" :disabled="form.processing" class="btn btn-primary">Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
export default {
    name: "Register"
}
</script>

<style scoped>

</style>
