<template>
  <div snippet-social
    :class="[
      'flex space-x-1.5 px-1',
      'items-center rounded-full',
      'pointer-events-auto'
    ]"
  >
    <a
      v-for="(media, index) in social"
      :style="{maskImage: `url(${media.icon})`, maskRepeat: 'no-repeat', maskSize: 'cover'}"
      :key="media.link"
      :draggable="false"
      :href="media.link"
      target="_blank"
      :class="[
        'w-5 h-5',
        'transition-background duration-hover',
        'bg-black hover:bg-secondary-color',
        'block shrink-0'
      ]"
    >
    </a>

  </div>
</template>

<script>


export default {
  props: {
    social: Array,
  },
  mounted() {
  }
}

</script>
