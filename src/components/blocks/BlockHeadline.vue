<template>
  <div block-headline class="font-referenz hyphens headline" lang="de">
    <h2 block-headline class="text-lg" v-if="block.content.size === 'lg'">
      <span v-for="item in block.content.headline"
      :key="item.text"
      :class="[
        'block',
        item.align === 'center' ?  'text-center' : item.align === 'left' ? 'text-left' : 'text-right'
      ]"
      v-html="item.text.replaceAll('<p>', '').replaceAll('</p>', '')"/>
    </h2>

    <h3 block-headline class="text-md" lang="de"  v-else>
      <span v-for="item in block.content.headline"
      :key="item.text"
      :class="[
        'block',
        item.align === 'center' ?  'text-center' : item.align === 'right' ? 'text-right' : 'text-left'
      ]"
      v-html="item.text.replaceAll('<p>', '').replaceAll('</p>', '')"/>
    </h3>
  </div>
</template>

<script>

import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  components: {
    BasicHeadline,
  },
  props: {
    block: Object
  },
};

</script>

<style scoped>

  @media (max-width: 1000px) {
    .hyphens {
      -webkit-hyphens: auto;
      -ms-hyphens: auto;
      hyphens: auto;
    }
  }

  .headline:deep(::selection) {
    @apply text-custom;
    @apply bg-white;
  }

</style>
