<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="row">
            <div class="col-4 offset-4">

                <main class="form-signin w-100 m-auto">
                    <form @submit.prevent="submit">
                        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

                        <div class="form-floating">
                            <input type="email" name="email" v-model="form.email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" v-model="form.password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" :model="form.remember" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                </main>
            </div>
        </div>
    </GuestLayout>
</template>
