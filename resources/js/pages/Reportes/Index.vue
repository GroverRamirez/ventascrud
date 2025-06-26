<template>
  <AppSidebarLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Reportes ventas</h1>
        <a
          href="/pdf"
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          target="_blank"
        >
          <span>Descargar PDF</span>
        </a>
      </div>
      <div v-if="ventas.length">
        <table class="min-w-full bg-white dark:bg-gray-800">
          <thead>
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nro</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cliente</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="venta in ventas" :key="venta.id">
              <td class="px-6 py-3">{{ contador++ }}</td>
              <td class="px-6 py-3">{{ venta.cliente_nombre }}</td>
              <td class="px-6 py-3">{{ venta.total }}</td>
              <td class="px-6 py-3">{{ venta.fecha_registro }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else>
        <p class="text-gray-500">No hay ventas disponibles.</p>
      </div>
    </div>
  </AppSidebarLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';

const props = defineProps({
  ventas: {
    type: Array,
    required: true
  }
});
let contador = 1;
</script>