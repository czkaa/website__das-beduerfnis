<template>

  <div
    basic-text v-kirbytext
    lang="de"
    :class="[
    'text font-referenz',
      {
      'text-md sm:text-md-sm': size === 'md',
      'text-sm': !size || size === 'sm' || size === undefined,
      'indent' : indent,
      'margin' : !indent,
      'multi-col' : multiCol
    }]"
    v-if="text"
    v-html="text"
  />

</template>

<script>

export default {
  props: {
    text: String,
    size: String,
    indent: {
      type: Boolean,
      default: false
    },
    multiCol: {
      type: Boolean,
      default: false
    }
  },
}

</script>

<style lang="scss" scoped>

  .text:deep(::selection) {
    @apply bg-none;
    @apply text-custom;
  }

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

  .indent :deep(p) {
    text-indent: 1rem;
  }

  .text :deep(p) {
    @apply mb-5;
    &:last-child {
      @apply mb-0;
    }
  }

  .text :deep(ol) {
    list-style-type: decimal;
    @apply pl-10;
    li {
      display: list-item;
      @apply pl-5;

    }

  }

  .multi-col {
    columns: 3;
    @media (max-width: 1000px) {
      columns: 2;
    }
    @media (max-width: 650px) {
      columns: 1;
    }
  }



</style>
