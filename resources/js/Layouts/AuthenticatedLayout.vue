<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div>
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-secondary">Code test</a></li>
                        <li>
                            <Link :href="route('task.index')" class="nav-link px-2 link-dark">Tasks</Link>
                        </li>
                    </ul>
                    <div class="text-end">
                        <Link :href="route('logout')" class="btn btn-outline-danger" method="post" as="button">
                            Log Out
                        </Link>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
