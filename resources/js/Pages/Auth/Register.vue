<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="row">
            <div class="col-4 offset-4">

                <main class="form-signin w-100 m-auto">
                    <form @submit.prevent="submit">
                        <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                        <div class="form-floating mb-2 shadow-sm bg-body rounded">
                            <input type="name" class="form-control" id="name" v-model="form.name">
                            <label for="name">Name</label>

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="form-floating mb-2 shadow-sm bg-body rounded">
                            <input type="email" class="form-control" id="email" v-model="form.email">
                            <label for="email">Email address</label>

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="form-floating mb-2 shadow-sm bg-body rounded">
                            <input autocomplete="new-password" type="password" class="form-control" id="password" v-model="form.password">
                            <label for="password">Password</label>

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="form-floating mb-2 shadow-sm bg-body rounded">
                            <input type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation">
                            <label for="password_confirmation">Password confirmation</label>

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    </form>
                </main>
            </div>
        </div>
    </GuestLayout>
</template>
