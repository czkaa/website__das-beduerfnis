<template>

  <div block-slideshow class="w-full py-5">
    <div class="space-x-5 overflow-x-auto flex" :style="{scrollSnapType: 'x mandatory'}">
      <div v-for="image in block.content.images" :key="image.url" :style="{scrollSnapAlign: 'start'}" class="flex-shrink-0">
        <img
          :draggable="false"
          :alt="image.alt ? image.alt : ''"
          :data-src="image.url"
          :data-srcset="image.srcset"
          :width="image.width"
          :height="image.height"
          :style="{height: '50vh'}"
          :class="[
            'w-auto lazyload object-cover object-top'
          ]"
        />
        <p class="font-referenz text-sm mt-0.5" v-html="image.subtitle"/>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    block: Object
  }
};

</script>
<style lang="scss" scoped>
[block-slideshow] {
  img {
    @apply opacity-0;
    @apply transition-opacity duration-hover;

    &.lazyloaded {
      @apply opacity-100;
    }
  }
}
</style>
