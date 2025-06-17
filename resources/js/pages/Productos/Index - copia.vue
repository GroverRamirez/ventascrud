<template>
  <AppSidebarLayout>
    <div class="container mx-auto px-4 py-8">
      <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Productos</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div v-for="producto in productos" :key="producto.id" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 flex flex-col items-center">
          <img
            :src="producto.imagen || 'https://via.placeholder.com/150'"
            alt="Imagen del producto"
            class="w-32 h-32 object-cover rounded mb-4"
          />
          <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ producto.nombre }}</h2>
          <p class="text-gray-500 mb-2">{{ producto.descripcion }}</p>
          <span class="text-blue-600 font-bold text-xl mb-4">{{ producto.precio }} Bs</span>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Ver detalles</button>
        </div>
      </div>
    </div>
  </AppSidebarLayout>
</template>

<script setup>
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';

const props = defineProps({
  productos: {
    type: Array,
    required: true
  }
});
</script>