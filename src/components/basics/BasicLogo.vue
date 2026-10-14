<template>

  <div basic-logo
    :draggable="false"
    :class="[
      'flex gap-1 px-1'
    ]"
  >
    <a
      v-for="(media, index) in social"
      :style="{maskImage: `url(/${media.icon})`, maskRepeat: 'no-repeat', maskSize: 'cover'}"
      :key="media.link"
      :href="media.link"
      target="_blank"
      :class="[
        'w-5 h-5',
        'transition-background duration-hover',
        'bg-black hover:bg-secondary-color',
        'block shrink-0'
      ]"
    >
    </a>
  </div>

</template>

<script>

export default {
  props: {
    text: String,
    size: String,
    indent: {
      type: Boolean,
      default: false
    }
  },
}

</script>

<style lang="scss" scoped>

  .text :deep(a) {
    @apply underline;
    text-underline-offset: 0.07em;
    text-decoration-thickness: decoration-from-font;
    font-feature-settings: "ss02" 1;
    hyphens: auto;
    &:hover {
      @apply no-underline;
    }
  }

  .margin :deep(p) {
    @apply mt-4;
  }

  .indent :deep(p) {
    text-indent: 1rem;
  }


  .text :deep(ol) {
    list-style-type: decimal;
    @apply pl-10;
    li {
      display: list-item;
      @apply pl-4;

    }

  }



</style>
