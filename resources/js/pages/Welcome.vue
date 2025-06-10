<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

type Producto = {
  id: number;
  nombre: string;
  precio: number;
  imagen?: string;
};

type PageProps = {
  auth: {
    user: {
      id: number;
      name: string;
      email: string;
    } | null;
  };
};

const props = defineProps<{ 
  productos: Producto[];
  auth: PageProps['auth'];
}>();
</script>

<template>
  <Head title="Welcome">
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  </Head>
  <div class="min-h-screen bg-gradient-to-br from-blue-100 to-blue-300 dark:from-gray-900 dark:to-gray-800 flex flex-col">
    <header class="py-8 text-center">
      <div class="flex justify-end mb-8 px-4">
        <Link
          v-if="props.auth.user"
          :href="route('dashboard')"
          class="inline-block rounded-lg border border-blue-600 px-5 py-2 text-sm font-medium text-blue-600 hover:bg-blue-600 hover:text-white transition"
        >
          Dashboard
        </Link>
        <template v-else>
          <Link
            :href="route('login')"
            class="inline-block rounded-lg border border-transparent px-5 py-2 text-sm font-medium text-blue-600 hover:border-blue-600 transition mr-2"
          >
            Iniciar Sesión
          </Link>
          <Link
            :href="route('register')"
            class="inline-block rounded-lg border border-blue-600 px-5 py-2 text-sm font-medium text-blue-600 hover:bg-blue-600 hover:text-white transition"
          >
            Registrarse
          </Link>
        </template>
      </div>
      <h1 class="text-4xl font-extrabold text-blue-700 dark:text-white mb-2">Bienvenido a <span class="text-blue-500">Sistema de Ventas</span></h1>
      <p class="text-lg text-gray-600 dark:text-gray-300">Gestiona tus productos y ventas de forma fácil y rápida.</p>
      <a href="/productos" class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">Ver productos</a>
    </header>
    <main class="flex-1 flex flex-col items-center justify-center">
      <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Productos destacados</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div v-for="producto in productos" :key="producto.id" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 flex flex-col items-center">
          <img
            :src="producto.imagen || 'https://via.placeholder.com/150'"
            alt="Imagen del producto"
            class="w-24 h-24 object-cover rounded mb-2"
          />
          <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">{{ producto.nombre }}</h3>
          <span class="text-blue-600 font-bold text-md mb-2">{{ producto.precio }} Bs</span>
        </div>
      </div>
    </main>
    <footer class="py-6 text-center text-gray-500 dark:text-gray-400">
      &copy; {{ new Date().getFullYear() }} Sistema de Ventas. Todos los derechos reservados.
    </footer>
  </div>
</template>
