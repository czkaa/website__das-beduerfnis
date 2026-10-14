<template>
  <a block-headline class="font-referenz hyphens" lang="de" :href="block.content.url" target="_blank" v-if="block.content.url">
    <h3 block-headline class="text-lg hover:text-custom transition-all duration-hover" lang="de">
      <span v-for="item in block.content.headline"
      :key="item.text"
      :class="[
        'block',
        item.align === 'center' ?  'text-center' : item.align === 'right' ? 'text-right' : 'text-left'
      ]"
      v-html="item.text.replaceAll('<p>', '').replaceAll('</p>', '')"/>
    </h3>
  </a>

  <h3 block-headline v-else class="font-referenz hyphens text-lg transition-all duration-hover" lang="de">
    <span v-for="item in block.content.headline"
    :key="item.text"
    :class="[
      'block',
      item.align === 'center' ?  'text-center' : item.align === 'right' ? 'text-right' : 'text-left'
    ]"
    v-html="item.text.replaceAll('<p>', '').replaceAll('</p>', '')"/>
  </h3>
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

</style>
