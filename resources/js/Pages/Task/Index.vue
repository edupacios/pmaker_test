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
    <div class="row mt-5">
        <div class="col-6 offset-5">
            <div v-if="tasks">
                <ul class="list-group">
                    <li v-for="task in tasks" :key="task.id" class="list-unstyled">
                        {{ task.name }}
                    </li>
                </ul>
            </div>
        </div>
        <!-- <AuthenticatedLayout>
            <Head title="Tasks" /> -->

        <!-- </AuthenticatedLayout> -->
    </div>
</template>