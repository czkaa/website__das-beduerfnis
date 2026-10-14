<template>
  <div
    layout-background
    v-if="route.path.split('/')[1] !=='programm' && route.path !== '/'"
    :class="[
      'fixed top-0 left-0',
      'w-full h-full',
      'blur-doodle-custom',
      '-z-50',
    ]"
  >
    <div
      v-for="(doodle, index) in selectedDoodles"
      :style="{
              maskImage: `url(/img/${doodle})`,
              maskRepeat: 'no-repeat',
              top: `${top[index]}vh`,
              left: `${left[index]}vw`,
              width: `${width[index]}vw`,
              height: `${height[index]}vh`,
      }"
      :class="[
        'absolute bg-custom',
        'transform -translate-y-1/2 -translate-x-1/2'
      ]"
    />
  </div>
</template>

<script>

export default {
  props: {
    site: Object
  },
  data() {
    return {
      doodles: ['doodle-1.svg', 'doodle-2.svg', 'doodle-3.svg', 'doodle-4.svg', 'doodle-5.svg', 'doodle-6.svg', 'doodle-7.svg'],
      colors: ['red', 'purple', 'yellow', 'orange', 'blue'],
    }
  },
  components: {
  },
  computed: {
    route() {
      return this.$route;
    },
    selectedDoodles() {
      const shuffled = this.doodles.sort(() => 0.5 - Math.random())
      return shuffled.slice(0, 3)
    },
    top() {
      return [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)]
    },
    left() {
      return [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)]
    },
    width() {
      return [50 + Math.floor(Math.random() * 50), 10 + Math.floor(Math.random() * 30), 50 + Math.floor(Math.random() * 30)]
    },
    height() {
      return [50 + Math.floor(Math.random() * 50), 10 + Math.floor(Math.random() * 30), 50 + Math.floor(Math.random() * 30)]
    }
  },
  mounted() {
    const color = this.site.colors[Math.floor(Math.random() * this.site.colors.length)].color;
    document.documentElement.style.setProperty('--color', color)
    var metaThemeColor = document.querySelector("meta[name=theme-color]");
    metaThemeColor.setAttribute("content", color);
  }
}

</script>

<style lang="scss" scoped>

.blur-doodle-custom {
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transform: translateZ(0);
  backface-visibility: hidden;
  perspective: 1000;
  transform: translate3d(0,0,0);
  transform: translateZ(0);
  filter: blur(20px);
}

</style>
