<template>
<div>
  <img basic-image
    v-if="image"
    :draggable="false"
    :alt="image.alt ? image.alt : ''"
    :data-src="image.url"
    :data-srcset="image.srcset"
    :width="image.width"
    :height="image.height"
    :class="[
      'w-full lazyload',
      'transition-all duration-500',
      'opacity-0',
      !isContain? '' : 'object-contain'
    ]"
    />
    <p v-if="image" class="font-referenz text-sm mt-0.5" v-html="image.subtitle" />
  </div>
</template>

<script>

export default {
  props: {
    image: Object,
    isContain: {
      type: Boolean,
      default: false,
    }
  },
}


</script>

<style lang="scss" scoped>
  .lazyloaded {
    @apply opacity-100;
  }
</style>
