<template>
  <div block-text class="w-full">
    <BasicText
      :text="block.content.text"
      :size="block.content.size"
      :multiCol="block.content.columns === 'three'"
      :class="[
        block.content.columns !== 'three'  && block.content.size ==='sm' ? 'w-3/4 sm:w-full' : 'w-full '
      ]"
    />
  </div>
</template>

<script>

import BasicText from '@/components/basics/BasicText.vue'

export default {
  components: {
    BasicText
  },
  props: {
    block: Object
  },
};

</script>
