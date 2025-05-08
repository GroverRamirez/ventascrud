<template>
  <AppLayout>
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900 p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-6">Registrar Nueva Venta</h1>
      <form @submit.prevent="submitVenta">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
          <input v-model="form.cliente_nombre" type="text" class="mt-1 block w-full rounded border-gray-300" required />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Vendedor</label>
          <select v-model="form.usuario_id" class="mt-1 block w-full rounded border-gray-300" required>
            <option value="">Seleccione un vendedor</option>
            <option v-for="usuario in usuarios" :key="usuario.id" :value="usuario.id">{{ usuario.nombre }}</option>
          </select>
        </div>
        <div class="mb-4">
          <h3 class="text-lg font-medium mb-2">Productos</h3>
          <div v-for="(item, idx) in form.productos" :key="idx" class="mb-2 flex gap-2 items-center">
            <select
              v-model="item.id"
              class="rounded border-gray-300"
              required
              @change="updatePrecio(idx)"
            >
              <option value="">Seleccione un producto</option>
              <option v-for="producto in productos" :key="producto.id" :value="producto.id">
                {{ producto.nombre }} - ${{ producto.precio }}
              </option>
            </select>
            <input
              v-model.number="item.cantidad"
              type="number"
              min="1"
              class="w-20 rounded border-gray-300"
              required
              @input="updateSubtotal(idx)"
            />
            <input
              :value="item.precio_unitario"
              type="text"
              class="w-24 rounded border-gray-300 bg-gray-100"
              readonly
              tabindex="-1"
            />
            <input
              :value="item.subtotal"
              type="text"
              class="w-24 rounded border-gray-300 bg-gray-100"
              readonly
              tabindex="-1"
            />
            <button type="button" @click="removeProducto(idx)" class="text-red-500">Eliminar</button>
          </div>
          <button type="button" @click="addProducto" class="bg-green-500 text-white px-2 py-1 rounded">Agregar Producto</button>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Total</label>
          <input :value="total" type="text" class="mt-1 block w-full rounded border-gray-300" readonly />
        </div>
        <div class="flex justify-end gap-2">
          <Link :href="route('ventas.index')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</Link>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Venta</button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

defineProps({ productos: Array, usuarios: Array });

const form = ref({
  cliente_nombre: '',
  usuario_id: '',
  productos: [
    { id: '', cantidad: 1, precio_unitario: 0, subtotal: 0 }
  ]
});

const addProducto = () => {
  form.value.productos.push({ id: '', cantidad: 1, precio_unitario: 0, subtotal: 0 });
};
const removeProducto = (idx) => {
  form.value.productos.splice(idx, 1);
};
const updatePrecio = (idx) => {
  const producto = productos.find(p => p.id == form.value.productos[idx].id);
  form.value.productos[idx].precio_unitario = producto ? Number(producto.precio) : 0;
  updateSubtotal(idx);
};
const updateSubtotal = (idx) => {
  const item = form.value.productos[idx];
  item.subtotal = (Number(item.precio_unitario) * Number(item.cantidad)).toFixed(2);
};
const total = computed(() => {
  return '$' + form.value.productos.reduce((sum, item) => sum + parseFloat(item.subtotal || 0), 0).toFixed(2);
});
const submitVenta = () => {
  // Filtra productos válidos (id y cantidad > 0)
  form.value.productos = form.value.productos.filter(
    item => item.id && item.cantidad > 0
  );
  if (form.value.productos.length === 0) {
    alert('Debes agregar al menos un producto válido.');
    return;
  }
  router.post(route('ventas.store'), form.value);
};

onMounted(() => {
  form.value.productos.forEach((item, idx) => {
    if (item.id) updatePrecio(idx);
  });
});

watch(
  () => form.value.productos.map(item => item.id),
  (newIds, oldIds) => {
    newIds.forEach((id, idx) => {
      if (id && (!oldIds || id !== oldIds[idx])) {
        updatePrecio(idx);
      }
    });
  }
);
</script> 