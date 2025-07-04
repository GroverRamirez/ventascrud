<template>
  <div v-if="showMessage" class="fixed top-4 right-4 z-50 max-w-sm">
    <div 
      :class="[
        'p-4 rounded-lg shadow-lg border-l-4 transition-all duration-300 ease-in-out',
        messageClasses
      ]"
    >
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <div :class="['mr-3', iconClasses]">
            <svg v-if="type === 'success'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <svg v-else-if="type === 'error'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <svg v-else-if="type === 'warning'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <svg v-else class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
          </div>
          <div>
            <p :class="['text-sm font-medium', textClasses]">
              {{ message }}
            </p>
          </div>
        </div>
        <button 
          @click="closeMessage" 
          :class="['ml-4 text-sm font-medium', closeButtonClasses]"
        >
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
  type: {
    type: String,
    default: 'info',
    validator: (value) => ['success', 'error', 'warning', 'info'].includes(value)
  },
  message: {
    type: String,
    required: true
  },
  duration: {
    type: Number,
    default: 5000 // 5 segundos por defecto
  }
});

const showMessage = ref(false);
let timeoutId = null;

const messageClasses = computed(() => {
  const baseClasses = 'bg-white dark:bg-gray-800';
  
  switch (props.type) {
    case 'success':
      return `${baseClasses} border-green-500 text-green-700 dark:text-green-400`;
    case 'error':
      return `${baseClasses} border-red-500 text-red-700 dark:text-red-400`;
    case 'warning':
      return `${baseClasses} border-yellow-500 text-yellow-700 dark:text-yellow-400`;
    default:
      return `${baseClasses} border-blue-500 text-blue-700 dark:text-blue-400`;
  }
});

const iconClasses = computed(() => {
  switch (props.type) {
    case 'success':
      return 'text-green-500';
    case 'error':
      return 'text-red-500';
    case 'warning':
      return 'text-yellow-500';
    default:
      return 'text-blue-500';
  }
});

const textClasses = computed(() => {
  switch (props.type) {
    case 'success':
      return 'text-green-800 dark:text-green-200';
    case 'error':
      return 'text-red-800 dark:text-red-200';
    case 'warning':
      return 'text-yellow-800 dark:text-yellow-200';
    default:
      return 'text-blue-800 dark:text-blue-200';
  }
});

const closeButtonClasses = computed(() => {
  switch (props.type) {
    case 'success':
      return 'text-green-400 hover:text-green-600';
    case 'error':
      return 'text-red-400 hover:text-red-600';
    case 'warning':
      return 'text-yellow-400 hover:text-yellow-600';
    default:
      return 'text-blue-400 hover:text-blue-600';
  }
});

const closeMessage = () => {
  showMessage.value = false;
  if (timeoutId) {
    clearTimeout(timeoutId);
    timeoutId = null;
  }
};

const showNotification = () => {
  showMessage.value = true;
  
  if (props.duration > 0) {
    timeoutId = setTimeout(() => {
      closeMessage();
    }, props.duration);
  }
};

onMounted(() => {
  if (props.message) {
    showNotification();
  }
});

watch(() => props.message, (newMessage) => {
  if (newMessage) {
    showNotification();
  }
});
</script> 