<template>
  <div error class="fixed h-full w-full flex justify-center items-center">
    <BasicHeadline :text="'404<br>Diese Seite exisitiert nicht'" :size="'lg'" />
  </div>
</template>

<script>
import { usePage } from "@/hooks";
import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  setup() {
    return {
      page: usePage(),
    };
  },
};
</script>
