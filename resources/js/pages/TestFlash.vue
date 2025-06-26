<template>
  <AppSidebarLayout>
    <div class="container mx-auto px-4 py-8">
      <h1 class="text-2xl font-bold mb-6">Prueba de Mensajes Flash</h1>
      
      <div class="space-y-4">
        <button 
          @click="testSuccess" 
          class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
        >
          Probar Mensaje de Éxito
        </button>
        
        <button 
          @click="testError" 
          class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
        >
          Probar Mensaje de Error
        </button>
        
        <button 
          @click="testWarning" 
          class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
        >
          Probar Mensaje de Advertencia
        </button>
        
        <button 
          @click="testInfo" 
          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        >
          Probar Mensaje de Información
        </button>
      </div>
      
      <div class="mt-8">
        <Link :href="route('ventas.index')" class="text-blue-500 hover:text-blue-700">
          ← Volver a Ventas
        </Link>
      </div>
    </div>
  </AppSidebarLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';

const testSuccess = () => {
  router.visit(route('ventas.index'), {
    data: { test: 'success' },
    onSuccess: () => {
      // Simular mensaje de éxito
      console.log('Mensaje de éxito simulado');
    }
  });
};

const testError = () => {
  router.visit(route('ventas.index'), {
    data: { test: 'error' },
    onError: () => {
      // Simular mensaje de error
      console.log('Mensaje de error simulado');
    }
  });
};

const testWarning = () => {
  router.visit(route('ventas.index'), {
    data: { test: 'warning' }
  });
};

const testInfo = () => {
  router.visit(route('ventas.index'), {
    data: { test: 'info' }
  });
};
</script> 