<script setup>
import App from "@/Layouts/App.vue";
import {Head, Link} from '@inertiajs/vue3'
import Alert from "@/Layouts/Includes/Alert.vue";

defineProps({
    users: {type: Object,},
})

</script>

<template>
    <App>
        <Head>
            <title>Users</title>
        </Head>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <h1> Users </h1>
                            <Link href="/users/create" as="button" class="btn btn-primary">Create</Link>
                            <hr>
                            <Alert/>
                            <ul>
                                <li v-for="user in users" :key="user.id">
                                    {{ user.name }} |
                                    <Link :href="route('user.show', user.id)" as="button"
                                          class="btn btn-sm btn-primary">Show
                                    </Link>
                                    <Link :href="route('user.edit', user.id)" as="button"
                                          class="btn btn-sm btn-success">
                                        Edit
                                    </Link>
                                    <button @click.prevent="deleteUser(user.id)" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </li>
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
    name: "Index",
    methods: {
        deleteUser(id) {
            if (confirm('Are you sure?')) {
                this.$inertia.delete(route('user.destroy', id), {preserveState: false})
            }
        }
    }
}
</script>

<style scoped>

</style>
