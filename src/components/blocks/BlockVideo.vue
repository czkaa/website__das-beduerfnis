<template>
  <div block-video class="w-full">
    <BasicVideo :video="block.content.video" />
  </div>
</template>

<script>
import BasicVideo from "../basics/BasicVideo.vue";
export default {
  props: {
    block: Object,
  },
  components: { BasicVideo },
};
</script>
