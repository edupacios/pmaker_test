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

        <div class="row mt-2 justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Tasks</h1>
            </div>
            <div class="col-12" v-if="tasks.length">
                <a :href="route('task.create')" class="btn btn-primary float-end mb-3">New Task</a>
            </div>
            <div class="col-12">
                <div v-if="!tasks.length" class="text-center">
                    <p>No tasks found.</p>
                    <a :href="route('task.create')" class="link-primary">Create one now.</a>
                </div>
                <div v-else="tasks.length">
                    <div class="card" v-for="task in tasks" :key="task.id">
                        <div class="card-header">
                            Code: {{ task.code }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ task.name }}</h5>
                            <p class="card-text">{{ task.description }}</p>
                            <a href="#" class="btn btn-outline-dark float-end">Edit task</a>
                        </div>
                        <div class="card-footer text-muted">
                            Status: {{ task.status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>