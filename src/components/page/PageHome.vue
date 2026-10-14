<template>
  <div page-home class="w-full h-full bg-white relative">
    <SnippetCanvas :colors="page.colors" class="absolute top-0"/>

    <BasicLink :to="`/${page.landingLink}`"  class="block absolute right-2 sm:right-2 top-2 w-7 bg-white rounded-full shadow-nav flex justify-center items-center p-1.5">
      <img :src="`/icons/x.svg`" class="h-full" :draggable="false">
    </BasicLink>
  </div>

</template>

<script>

import BasicLink from '@/components/basics/BasicLink.vue'
import BasicHeadline from '@/components/basics/BasicHeadline.vue'
import SnippetCanvas from '@/components/snippets/SnippetCanvas.vue'


export default {
  props: {
    page: Object
  },
  components: {
    SnippetCanvas,
    BasicLink
  },
}

</script>
