<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

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
    <AuthBase title="Bienvenido al Sistema de Ventas" description="Por favor, ingresa tus credenciales para acceder">
        <Head title="Iniciar sesión" />

        <div class="flex flex-col items-center mb-6">
            <svg class="w-16 h-16 mb-2" fill="none" stroke="url(#ventas-gradient)" stroke-width="2" viewBox="0 0 48 48">
                <defs>
                    <linearGradient id="ventas-gradient" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#06b6d4" />
                        <stop offset="100%" stop-color="#8b5cf6" />
                    </linearGradient>
                </defs>
                <rect x="8" y="16" width="32" height="20" rx="4" stroke="url(#ventas-gradient)" fill="none" />
                <path d="M16 16V12a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v4" stroke="url(#ventas-gradient)" />
                <circle cx="16" cy="32" r="2" fill="#06b6d4" />
                <circle cx="32" cy="32" r="2" fill="#8b5cf6" />
            </svg>
            <h2 class="text-2xl font-extrabold bg-gradient-to-r from-cyan-400 to-violet-600 bg-clip-text text-transparent mb-1">Bienvenido</h2>
            <p class="text-gray-300 text-center">Accede a tu cuenta para gestionar <span class="font-semibold text-cyan-400">ventas</span>, <span class="font-semibold text-violet-400">productos</span> y más.</p>
        </div>

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email">Correo electrónico</Label>
                    <Input
                        id="email"
                        type="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="correo@ejemplo.com"
                        class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white"
                    />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="password">Contraseña</Label>
                        <TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm text-cyan-400 hover:text-violet-400" :tabindex="5">
                            ¿Olvidaste tu contraseña?
                        </TextLink>
                    </div>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="Contraseña"
                        class="bg-[#18181b] border border-cyan-400 focus:border-violet-500 text-white"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="flex items-center justify-between" :tabindex="3">
                    <Label for="remember" class="flex items-center space-x-3">
                        <Checkbox id="remember" v-model="form.remember" :tabindex="4" />
                        <span>Recuérdame</span>
                    </Label>
                </div>

                <Button type="submit" class="mt-4 w-full bg-gradient-to-r from-cyan-400 to-violet-600 hover:from-cyan-500 hover:to-violet-700 text-white font-semibold py-2 rounded transition shadow-lg uppercase tracking-wide" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Iniciar sesión
                </Button>
            </div>

            <div class="text-center text-sm text-gray-400">
                ¿No tienes una cuenta?
                <TextLink :href="route('register')" :tabindex="5" class="text-cyan-400 hover:text-violet-400">Regístrate</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
