<template>

  <div block-images class="w-full space-y-5">
    <BasicImage v-for="image in block.content.images" :image="image" />
  </div>
</template>

<script>
import BasicImage from '@/components/basics/BasicImage.vue'

export default {
  props: {
    block: Object
  },
  components: {
    BasicImage
  }
};

</script>
<style lang="scss" scoped>
[block-image] {
  img {
    @apply opacity-0;
    @apply transition-opacity duration-hover;

    &.lazyloaded {
      @apply opacity-100;
    }
  }
}
</style>
