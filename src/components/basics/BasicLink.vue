<template>
  <router-link basic-link
    :draggable="false"
    :to="`/${uri}`"
    :class="[
      'link',
      'transition-all duration-hover',
      'font-referenz text-sm md:text-nav-sm',
      'whitespace-nowrap',
      'pointer-events-auto',
      'py-1',
      'h-7',
      {
       'showActive' : showActive,
       'hover:text-custom' : showHover,
       'pointer-events-none cursor-default' : !showHover,
      }
    ]"
  >
    <slot/>
    {{title}}
  </router-link>
</template>

<script>


export default {
  props: {
    uri: String,
    title: String,
    showActive: {
      type: Boolean,
      default: false
    },
    showHover: {
      type: Boolean,
      default: true
    }
  },
}

</script>

<style lang="scss" scoped>

  .link {
    font-feature-settings: "ss02" 1;
  }
  .router-link-active.showActive {
    color: var(--color);
  }
  a {
    user-select:none;
  }

</style>
