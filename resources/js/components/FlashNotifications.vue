<template>
  <div>
    <FlashMessage
      v-if="flash.success"
      type="success"
      :message="flash.success"
      :duration="5000"
    />
    <FlashMessage
      v-if="flash.error"
      type="error"
      :message="flash.error"
      :duration="7000"
    />
    <FlashMessage
      v-if="flash.warning"
      type="warning"
      :message="flash.warning"
      :duration="6000"
    />
    <FlashMessage
      v-if="flash.info"
      type="info"
      :message="flash.info"
      :duration="5000"
    />
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import FlashMessage from './FlashMessage.vue';

const page = usePage();

const flash = computed(() => {
  const flashData = page.props.flash;
  return {
    success: flashData?.success || null,
    error: flashData?.error || null,
    warning: flashData?.warning || null,
    info: flashData?.info || null,
  };
});
</script> 