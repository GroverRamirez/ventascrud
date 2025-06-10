<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import BarChart from '../components/BarChart.vue';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const fechaInicio = ref('');
const fechaFin = ref('');

const ventaSeleccionada = ref(null);
const mostrarModal = ref(false);

function filtrarVentas() {
  // Emitir evento para el padre o hacer fetch aquí si lo deseas
  // Por ahora solo emite el evento con el rango seleccionado
  // Puedes conectar esto con el backend o filtrar en frontend
  // Ejemplo: emit('filtrar-ventas', { fechaInicio: fechaInicio.value, fechaFin: fechaFin.value })
}

function verDetalleVenta(venta: any) {
  ventaSeleccionada.value = venta;
  mostrarModal.value = true;
}

function cerrarModal() {
  mostrarModal.value = false;
  ventaSeleccionada.value = null;
}

defineProps(['productosVendidos', 'clientes', 'ventasPorMesLabels', 'ventasPorMesData', 'productosTopLabels', 'productosTopData', 'ventasPorDiaLabels', 'ventasPorDiaData', 'categoriasLabels', 'categoriasData', 'ultimasVentas'])
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-2">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-gradient-to-br from-blue-600 to-blue-400 text-white shadow-lg flex flex-col justify-center items-center w-full">
                    <PlaceholderPattern />
                    <div class="flex flex-col items-center justify-center mt-4">
                        <i class="fas fa-box text-5xl mb-2"></i>
                        <h3 class="text-xl font-bold text-gray-800">PRODUCTOS VENDIDOS</h3>
                        <p class="text-3xl font-semibold mt-2">{{ productosVendidos }}</p>
                    </div>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-gradient-to-br from-green-600 to-green-400 text-white shadow-lg flex flex-col justify-center items-center w-full">
                    <PlaceholderPattern />
                    <div class="flex flex-col items-center justify-center mt-4">
                        <i class="fas fa-users text-5xl mb-2"></i>
                        <h3 class="text-xl font-bold text-gray-800">CLIENTES</h3>
                        <p class="text-3xl font-semibold mt-2">{{ clientes }}</p>
                    </div>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-gradient-to-br from-yellow-500 to-yellow-300 text-white shadow-lg flex flex-col justify-center items-center w-full">
                    <PlaceholderPattern />
                    <div class="flex flex-col items-center justify-center mt-4">
                        <i class="fas fa-dollar-sign text-5xl mb-2"></i>
                        <h3 class="text-xl font-bold text-gray-800">Ingresos</h3>
                        <p class="text-3xl font-semibold mt-2">$ --</p>
                    </div>
                </div>
            </div>

            <div class="grid auto-rows-min gap-6 md:grid-cols-2">
                <div class="mt-4 bg-white rounded-xl p-4 shadow w-full h-[350px] overflow-hidden flex flex-col">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Ventas por Semana</h3>
                    <div class="h-full w-ful overflow-hidden">
                        <BarChart
                        :labels="ventasPorMesLabels"
                        :values="ventasPorMesData"
                        label="Ventas"
                        />
                    </div>
                </div>
                <div class="mt-4 bg-white rounded-xl p-4 shadow w-full h-[350px] overflow-hidden flex flex-col">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Ventas por Mes</h3>
                    <div class="h-full w-full overflow-hidden">
                        <BarChart
                        :labels="ventasPorMesLabels"
                        :values="ventasPorMesData"
                        label="Ventas"
                        />
                    </div>
                </div>
            </div>

            <div class="grid auto-rows-min gap-6 md:grid-cols-2 mt-4">
                <div class="bg-white rounded-xl p-4 shadow w-full h-[350px] overflow-hidden flex flex-col">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Productos más vendidos</h3>
                    <div class="h-full w-full overflow-hidden">
                        <BarChart
                        :labels="productosTopLabels"
                        :values="productosTopData"
                        label="Cantidad"
                        />
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow flex flex-col w-full h-[350px] overflow-hidden">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Últimas Ventas</h3>
                    <!-- Filtro por rango de fechas -->
                    <form class="flex gap-2 mb-4 items-center" @submit.prevent="filtrarVentas">
                        <label class="text-sm text-gray-700">Desde:
                            <input type="date" v-model="fechaInicio" class="border rounded px-2 py-1 text-sm" />
                        </label>
                        <label class="text-sm text-gray-700">Hasta:
                            <input type="date" v-model="fechaFin" class="border rounded px-2 py-1 text-sm" />
                        </label>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Filtrar</button>
                    </form>
                    <template v-if="ultimasVentas && ultimasVentas.length">
                        <table class="min-w-full text-sm text-left">
                            <thead>
                                <tr>
                                    <th class="px-2 py-1 text-gray-600">Cliente</th>
                                    <th class="px-2 py-1 text-gray-600">Total</th>
                                    <th class="px-2 py-1 text-gray-600">Fecha</th>
                                    <th class="px-2 py-1 text-gray-600">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(venta, idx) in ultimasVentas.slice(0,5)" :key="idx">
                                    <td class="px-2 py-1">{{ venta.cliente }}</td>
                                    <td class="px-2 py-1">{{ venta.total }}</td>
                                    <td class="px-2 py-1">{{ venta.fecha }}</td>
                                    <td class="px-2 py-1">
                                        <button @click="verDetalleVenta(venta)" class="text-blue-600 hover:underline">Ver detalles</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                    <template v-else>
                        <p class="text-gray-400">No hay ventas recientes.</p>
                    </template>

                    <!-- Modal de detalle de venta -->
                    <div v-if="mostrarModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                            <button @click="cerrarModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
                            <h4 class="text-lg font-bold mb-4 text-gray-800">Detalle de Venta</h4>
                            <div v-if="ventaSeleccionada">
                                <p><span class="font-semibold">Cliente:</span> {{ ventaSeleccionada.cliente }}</p>
                                <p><span class="font-semibold">Total:</span> {{ ventaSeleccionada.total }}</p>
                                <p><span class="font-semibold">Fecha:</span> {{ ventaSeleccionada.fecha }}</p>
                                <!-- Agrega aquí más campos si los tienes -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid auto-rows-min gap-6 md:grid-cols-2 mt-4">
                <div class="bg-white rounded-xl p-4 shadow w-full h-[350px] overflow-hidden flex flex-col">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Ventas Diarias</h3>
                    <div class="h-full w-full overflow-hidden">
                        <BarChart
                        :labels="ventasPorDiaLabels"
                        :values="ventasPorDiaData"
                        label="Ventas"
                        />
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow w-full h-[350px] overflow-hidden flex flex-col">
                    <h3 class="mb-4 text-lg text-gray-800 font-semibold">Ventas por Categoría</h3>
                    <div class="h-full w-full overflow-hidden">
                        <BarChart
                        :labels="categoriasLabels"
                        :values="categoriasData"
                        label="Ventas"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
