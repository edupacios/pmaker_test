<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    statuses: {
        type: Array,
    }
});

const form = useForm({
    name: '',
    description: '',
    code: '',
    status: 'active'
});

const submit = () => {
    form.post(route('task.store'), {
        onStart: () => form.status.toLowerCase()
    });
};

</script>

<template>
    <AuthenticatedLayout>
        <Head title="Create new Task" />

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Create new Task</h1>
            </div>
            <div class="col-6 offset-3">
                <form @submit.prevent="submit" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" v-model="form.name" class="form-control" id="name" name="name">

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" v-model="form.code" class="form-control" id="code" name="code">

                        <InputError class="mt-2" :message="form.errors.code" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea v-model="form.description" class="form-control" id="description" name="description"></textarea>

                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <div class="mb-3">
                        <select class="form-select form-select-sm text-capitalize" v-model="form.status" name="status">
                            <option v-for="status in statuses" :key="status" :value="status">{{ status }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Save task</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<style scoped>
    textarea {
        resize: none;
    }
</style>