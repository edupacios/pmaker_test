<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <header class="p-3 mb-5 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-end mb-md-0">
                        <li><strong>Code test</strong></li>
                    </ul>
                    <div class="text-end">
                        <Link :href="route('register')" class="btn btn-outline-success" method="get" as="button">
                            Register
                        </Link>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>
