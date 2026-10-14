<template>
  <div error class="fixed h-full w-full flex justify-center items-center text-center">
    <BasicHeadline :text="'404'" :size="'lg'" />
  </div>
</template>

<script>
import { usePage } from "@/hooks";
import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  components: {
   BasicHeadline
  },
  setup() {
    return {
      page: usePage(),
    };
  },
};
</script>
