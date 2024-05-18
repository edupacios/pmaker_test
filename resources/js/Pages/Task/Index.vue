<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    tasks: {
        type: Array,
        required: true,
    }
});

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Tasks" />

        <div class="row mt-2">
            <div class="col-12">
                <h1 class="text-center">Tasks</h1>
            </div>
            <div class="col-6 offset-5">
                <div v-if="tasks">
                    <ul class="list-group">
                        <li v-for="task in tasks" :key="task.id" class="list-unstyled">
                            {{ task.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>