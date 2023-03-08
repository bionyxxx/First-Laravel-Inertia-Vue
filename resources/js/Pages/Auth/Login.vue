<script setup>
import App from "@/Layouts/App.vue";
import {Head, router, useForm} from '@inertiajs/vue3'


const form = useForm({
    email: '',
    password: '',
})
</script>

<template>
    <App>
        <Head title="Login"/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>Login</h1>
                            <form @submit.prevent="form.post(route('login'))">
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
                                <button type="submit" :disabled="form.processing" class="btn btn-primary">Login</button>
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
    name: "Login"
}
</script>

<style scoped>

</style>
