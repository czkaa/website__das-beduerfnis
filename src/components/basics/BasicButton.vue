<template>
  <button basic-button
    :draggable="false"
    :class="[
      'link',
      'transition-all duration-hover',
      'font-referenz text-sm md:text-nav-sm',
      'whitespace-nowrap',
      'pointer-events-auto',
      'py-1 bg-white rounded-full shadow-nav',
      'h-7'
    ]"
  >
    <slot> </slot>
  </button>

</template>

<style scoped>

  button {
    user-select:none;
  }

</style>
