<template>

  <router-link basic-home-logo
    :to="`/`"
    :draggable="false"
    :class="[
      'flex-shrink-0',
      ]"
  >
    <img
      :src="`${logotype}`"
      :style="{height: '1.15rem'}"
      :class="[
        'w-auto mt-0.25',
      ]"
    >

  </router-link>

</template>

<script>


export default {
  props: {
    logotype: String,
  }
}

</script>

<style lang="scss" scoped>

  .link {
    font-feature-settings: "ss02" 1;
  }
  .router-link-active.showActive {
    @apply text-secondary-color;
  }
  a {
    user-select:none;
  }

</style>
