<template>

  <div block-logos
    :class="[
      'relative w-full',
      'grid grid-cols-8 gap-6 sm:grid-cols-4'
    ]"
  >
    <div
    v-for="(logo, index) in block.content.logos"
    :key="logo.url"
    class="relative">
      <img
        alt="Das Bedürfnis Logo"
        :src="logo.url"
        class="w-full"
      />
    </div>
  </div>

</template>

<script>

export default {
  components: {
  },
  props: {
    block: Object
  }
};

</script>
