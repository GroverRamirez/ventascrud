<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

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
    <AuthBase title="Crear una cuenta" description="Ingrese sus datos a continuación para crear su cuenta">
        <Head title="Registrar" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name">Nombre</Label>
                    <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name" 
                    v-model="form.name" placeholder="Nombre Completo" 
                    class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Correo Electronico</Label>
                    <Input id="email" type="email" required :tabindex="2" autocomplete="email" 
                    v-model="form.email" placeholder="correo@gmail.com"
                    class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Contraseña</Label>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="3"
                        autocomplete="new-password"
                        v-model="form.password"
                        placeholder="Contraseña"
                        class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirmar Contraseña<</Label>
                    <Input
                        id="password_confirmation"
                        type="password"
                        required
                        :tabindex="4"
                        autocomplete="new-password"
                        v-model="form.password_confirmation"
                        placeholder="Confirmar Contraseña"
                        class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white"
                    />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Crear Cuenta
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                ¿Ya tienes una cuenta?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Iniciar sesión</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
