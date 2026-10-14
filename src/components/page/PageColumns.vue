<template>
  <div page-columns class="p-5 space-y-5 pb-13 sm:pb-5">
    <div
      v-for="(layout, i) in page.main"
      :key="layout.id"
      :class="['flex sm:block space-x-5 sm:space-x-0 sm:space-y-5']"
    >
      <div
        v-for="column in layout.columns"
        :key="column.id"
        :class="[
          'flex flex-col space-y-5',
          column.width === '1/2' ? 'w-1/2 sm:w-full' : 'w-full',
        ]"
      >
        <BlockIndex
          v-for="(block, index) in column.blocks"
          :identifier="block.identifier"
          :block="block"
        />
      </div>
    </div>
  </div>
</template>

<script>
import BlockIndex from "@/components/blocks/BlockIndex.vue";

export default {
  components: {
    BlockIndex,
  },
  props: {
    page: Object,
  },
};
</script>
