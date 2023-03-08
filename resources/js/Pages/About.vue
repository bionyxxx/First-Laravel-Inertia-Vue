<script setup>
import App from "@/Layouts/App.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const user = computed(() => usePage().props.auth.user)
</script>

<template>
    <App>
        <Head title="About"/>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>About</h1>
                            <h3>Name: {{ user.name }}</h3>
                            <h3>Email: {{ user.email }}</h3>
                            <h3>Join at: {{ user.created_at }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
export default {
    name: "About"
}
</script>

<style scoped>

</style>
