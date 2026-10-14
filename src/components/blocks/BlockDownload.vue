<template>
  <div block-download class="w-full flex justify-center p-10">
    <a
      @mouseenter="isHover = true"
      @mouseleave="isHover = false"
      :href="block.content.downloads[0].url"
      target="_blank"
      :class="[
        'w-36 h-48 p-3',
        'border-black border-aktuell',
        'flex justify-center items-center text-center',
        'transition-all duration-hover bg-white hover:text-custom hover:border-custom'
      ]"
    >
      <BasicText
        :size="'sm'"
        :text="`Download ${block.content.title}`"
      />
    </a>
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
