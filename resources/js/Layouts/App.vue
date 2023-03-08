<script setup>
import {Link} from '@inertiajs/vue3'
</script>

<template>
    <main>
        <div class="container">
            <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"/>
                    </svg>
                </a>

                <ul v-if="$page.props.auth.user" class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <Link href="/" class="nav-link px-2 link-dark"
                              :class="{ 'bg-primary text-white rounded': $page.url === '/' }">Home
                        </Link>
                    </li>
                    <li>
                        <Link href="/about" class="nav-link px-2 link-dark"
                              :class="{ 'bg-primary text-white rounded': $page.url.startsWith('/about') }">About
                        </Link>
                    </li>
                    <li>
                        <Link href="/users" class="nav-link px-2 link-dark"
                              :class="{ 'bg-primary text-white rounded': $page.url.startsWith('/users') }">Users
                        </Link>
                    </li>
                </ul>

                <div class="col-md-3 text-end">
                    <div v-if="!$page.props.auth.user">
                        <Link as="button" :href="route('login')" type="button" class="btn btn-outline-primary me-2">
                            Login
                        </Link>
                        <Link :href="route('register')" type="button" class="btn btn-primary">Sign-up</Link>
                    </div>
                    <div v-else>
                        <Link as="button" :href="route('logout')" type="button" class="btn btn-outline-danger me-2">
                            Logout
                        </Link>
                    </div>
                </div>
            </header>
            <article>
                <slot/>
            </article>
        </div>

    </main>
</template>
