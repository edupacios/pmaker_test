<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ModalComp from '@/Components/ModalComp.vue';
import axios from 'axios';

defineProps({
    tasks: {
        type: Array,
        required: true,
    }
});

const editingTask = ref(null);
const showModal = ref(false);

const editTask = (task) => {
    editingTask.value = task;
    showModal.value = true;
};

const closeModal = () => {
  showModal.value = false;
};

const submitHandler = (updatedTask) => {
    axios.patch(route('task.update', { id: updatedTask.id }), updatedTask)
        .then(() => {
            closeModal();
            window.location.reload();
        })
        .catch((error) => {
            console.error(error);
        });
}

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Tasks" />
        <div>
            <Teleport to="body">
                <div v-if="showModal">
                    <ModalComp title="Edit task"
                            :task="editingTask"
                            @close="closeModal"
                            @save="submitHandler" />
                </div>
            </Teleport>

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
                    <div v-else>
                        <div class="card mb-2" v-for="task in tasks" :key="task.id">
                            <div class="card-header">
                                Code: {{ task.code }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ task.name }}</h5>
                                <p class="card-text">{{ task.description }}</p>

                                <button class="btn btn-outline-dark float-end" @click="editTask(task)">Edit task</button>
                            </div>
                            <div class="card-footer text-muted">
                                Status: <span class="text-capitalize">{{ task.status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>