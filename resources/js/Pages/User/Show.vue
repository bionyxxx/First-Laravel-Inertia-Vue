<script setup>
import App from "@/Layouts/App.vue";
import {Head} from '@inertiajs/vue3';

defineProps({
    user: {type: Object,},
})
</script>

<template>
    <App>
        <Head>
            <title>User {{ user.id }}</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <h1> User #{{ user.id }}</h1>

                            <ul>
                                <li>Name: <b>{{ user.name }}</b></li>
                                <li>Email: <b>{{ user.email }}</b></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
export default {
    name: "Show"
}
</script>

<style scoped>

</style>
