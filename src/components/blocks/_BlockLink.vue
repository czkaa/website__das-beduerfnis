<template>
  <div block-link
    :class="[
      'flex flex-wrap gap-3'
    ]"
  >
  <router-link
    v-for="(link, index) in links"
    :to="link.url"
    >
    <BasicButton
      :colorObject="colorObject"
      :text="link.headline"
      />
    </router-link>
  </div>
</template>

<script>

import BasicButton from '@/components/basics/BasicButton.vue'

export default {
  components: {
    BasicButton
  },
  props: {
    links: Array,
    colorObject: Object
  }
};

</script>
