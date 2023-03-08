<script setup>
import App from "@/Layouts/App.vue";
import {Head, useForm} from '@inertiajs/vue3'
import Alert from "@/Layouts/Includes/Alert.vue";

const props = defineProps({user: Object})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '',
})
</script>

<template>
    <App>
        <Head>
            <title>Edit Users #{{ user.id }}</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>Edit Users #{{ user.id }}</h1>
                            <Alert/>
                            <form
                                @submit.prevent="form.put(route('user.update', user.id), {onSuccess: () => form.reset('password'), preserveState:false})">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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
    name: "Edit",
}
</script>

<style scoped>

</style>
