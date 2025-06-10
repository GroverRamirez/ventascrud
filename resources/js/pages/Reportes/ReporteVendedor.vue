<template>
  <AppSidebarLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Reporte por Vendedor</h1>
        <a
          :href="`/pdf-vendedores?busqueda=${encodeURIComponent(busqueda)}`"
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          target="_blank"
        >
          <span>Descargar PDF</span>
        </a>
        <a
          :href="`/xls-vendedores?busqueda=${encodeURIComponent(busqueda)}`"
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 ml-2"
          target="_blank"
        >
          <span>Descargar XLS</span>
        </a>
      </div>
      <div class="flex gap-4 mb-4 items-end">
        <div class="flex flex-col">
          <label for="busqueda" class="block text-xs font-semibold text-gray-700 dark:text-gray-200 mb-1">Buscar vendedor:</label>
          <input type="text" v-model="busqueda" id="busqueda" placeholder="Nombre vendedor..."
            class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 dark:bg-gray-700 dark:text-white transition-all outline-none shadow-sm hover:border-blue-400" />
        </div>
      </div>
      <div v-if="vendedoresFiltrados.length">
        <table class="min-w-full bg-white dark:bg-gray-800">
          <thead>
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nro</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Vendedor</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cantidad de Ventas</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total Vendido</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(vendedor, idx) in vendedoresFiltrados" :key="vendedor.usuario_id">
              <td class="px-6 py-3">{{ idx + 1 }}</td>
              <td class="px-6 py-3">{{ vendedor.usuario ? vendedor.usuario.nombre : 'Sin nombre' }}</td>
              <td class="px-6 py-3">{{ vendedor.cantidad }}</td>
              <td class="px-6 py-3">{{ vendedor.total }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else>
        <p class="text-gray-500">No hay datos de vendedores disponibles.</p>
      </div>
    </div>
  </AppSidebarLayout>
</template>

<script setup>
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';
import { ref, computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  vendedores: {
    type: Array,
    required: true
  }
});

const busqueda = ref("");

const vendedoresFiltrados = computed(() => {
  let lista = props.vendedores;
  if (busqueda.value) {
    lista = lista.filter(v => v.usuario && v.usuario.nombre && v.usuario.nombre.toLowerCase().includes(busqueda.value.toLowerCase()));
  }
  return lista;
});

function filtrar() {
  router.visit('/reporte/vendedor', {
    method: 'get',
    data: {
      fechaInicio: fechaInicio.value,
      fechaFin: fechaFin.value
    },
    preserveState: true,
    preserveScroll: true
  });
}
</script>