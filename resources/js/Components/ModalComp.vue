<script setup>
import { ref, defineEmits } from 'vue';
defineEmits(['close', 'update']);

const props = defineProps({
    task: {
        type: Object,
        required: true,
    }
});

const currentTask = ref({ ...props.task });

</script>

<template>
    <div class="modal fade show" style="display: block;" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit task: {{ task.name }}</h5>
                    <button type="button" class="btn-close" aria-label="Close" @click="$emit('close')"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" v-model="currentTask.name" class="form-control form-control-sm" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" v-model="currentTask.code" class="form-control form-control-sm" id="code" name="code">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea v-model="currentTask.description" class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm text-capitalize" v-model="currentTask.status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-primary" @click="$emit('update', currentTask)">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>