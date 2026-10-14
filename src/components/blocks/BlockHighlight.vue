<template>
  <div block-highlight class="w-full" >

    <BasicHeadline :text="block.content.textTop" :size="'lg'"/>

    <BasicHeadline :text="block.content.textCenter" :size="'xl'" class="text-center my-10" :animate="block.content.animate"/>

    <BasicHeadline :text="block.content.textBottom" :size="'lg'" class="text-right"/>

    <div
      :class="[
        'absolute top-0 left-0',
        'w-full h-full -z-50',
        'blur-doodle-custom',
      ]"
    >
      <div
        :style="{
                maskImage: `url(/img/doodle-1.svg)`,
                maskRepeat: 'no-repeat',
                maskPosition: 'center',
                maskSize: '90% 90%'
        }"
        :class="[
          'absolute w-full h-full bg-custom',
        ]"
      />
    </div>
  </div>
</template>

<script>

import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  components: {
    BasicHeadline
  },
  props: {
    block: Object
  },
};

</script>

<style lang="scss" scoped>

  .highlight :deep(strong) {
    @apply font-normal;
  }

</style>
