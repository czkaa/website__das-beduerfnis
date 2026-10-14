<template>
  <div snippet-timeline
    :style="{paddingBottom: `calc(1.25rem + 1.25rem)`}"
    :class="[
      'flex sm:flex-wrap',
      ]"
  >
    <div
      v-for="(month, i) in months"
      :key="month"
      :class="[
        'flex',
        'w-full sm:w-1/6',
        'relative'
      ]"
      >
      <template
        v-for="(exhibition, j) in exhibitions"
      >
        <a
          @click.prevent.stop="handleClick"
          v-if="exhibition.months.includes((i+1).toString())"
          :href="`#e-${exhibition.slug}`"
          :class="[
            'flex flex-column items-center justify-center',
            'w-full',
            'filter blur-doodle-custom',
          ]"
        >
        <div
          :style="{
                  maskImage: `url(/img/dot.svg)`,
                  maskRepeat: 'no-repeat',
                  maskPosition: 'center',
                  maskSize: 'cover',
                  background: exhibition.color,
                  transform: `rotate(${degrees[i]}deg)`
          }"
          :class="[
            'w-full h-24',
          ]"
        />
        </a>
      </template>
      <BasicHeadline
        :text="month"
        :size="'sm'"
        :class="[
          'absolute top-0',
          'left-1/2 transform -translate-x-1/2',
          'top-1/2 transform -translate-y-1/2',
          'pointer-events-none'
        ]"
      />
    </div>
  </div>
</template>

<script>

import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  props: {
    exhibitions: Object,
  },
  components: {
    BasicHeadline,
  },
  data() {
    return {
      months: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
      degrees: []
    }
  },
  computed: {
    navHeight() {
      return this.$store.state.navHeight
    }
  },
  methods: {
    handleClick (e) {
      const el = document.querySelector(e.currentTarget.getAttribute('href'))
      window.scrollTo({
        top: el.offsetTop - 32,
        behavior: 'smooth'
      })
    }
  },
  mounted() {
    for (let i = 0; i < 12; i++) {
      this.degrees.push(Math.floor(Math.random() * 360))
    }
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
