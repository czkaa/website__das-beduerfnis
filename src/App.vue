<template>

  <LayoutBackground
    :site="site"
  />
  <main class="absolute py-nav sm:pb-0 w-full h-full">
    <router-view v-slot="{ Component }" class="">
      <transition name="fade" mode="out-in">
          <component
          :is="Component"
          :key="route.path"
          />
      </transition>
    </router-view>
  </main>

  <BasicButton @click="scrollTop"
  :class="[
    'fixed right-2 p-1',
    'transition-all duration-400',
    scrolled ? 'bottom-10 sm:bottom-2' : '-bottom-7'
  ]">
    <img :src="`/icons/arrow.svg`" class="h-full" />
  </BasicButton>

  <LayoutNavMobil
    :site="site"
    class="hidden sm:block z-50"
  />
  <LayoutNavDesktop
    :site="site"
    class="block sm:hidden z-50"
  />

  <!-- <LayoutCookieBanner :site="site" /> -->

</template>

<script>
import { useRoute } from 'vue-router'
import { useSite } from "@/hooks"
import LayoutNavMobil from '@/components/layout/LayoutNavMobil.vue'
import LayoutNavDesktop from '@/components/layout/LayoutNavDesktop.vue'
import LayoutBackground from '@/components/layout/LayoutBackground.vue'
import LayoutCookieBanner from '@/components/layout/LayoutCookieBanner.vue'
import BasicButton from '@/components/basics/BasicButton.vue'

export default {

  data() {
    return {
      scrolled: false
    }
  },

  setup() {

    const site = useSite();
    console.log('SITE', site)

    return {
      route: useRoute(), site
    };
  },

  components: {
    LayoutNavDesktop,
    LayoutNavMobil,
    LayoutBackground,
    LayoutCookieBanner,
    BasicButton
  },

  methods: {
    scrollTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      })
    },
    handleScroll (event) {
      if (window.scrollY > 400) {
        this.scrolled = true;
      } else {
        this.scrolled = false;
      }
    }
  },
  created () {
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed () {
    window.removeEventListener('scroll', this.handleScroll);
  },

};

</script>

<style lang="scss">
  html {
    font-size: 16px;
    scroll-behavior: smooth;
    @apply font-referenz;
    height: auto;
  }

  @media (max-width: 800px) {
    html {
      font-size: 18px;
    }
  }

  @media (min-width: 1800px) {
    html {
      font-size: 1.15vw;
    }
  }

  .fade-enter-active {
    @apply animate-fade-in;
    animation-duration: 0.2s;
  }
  .fade-leave-active {
    @apply animate-fade-out;
    animation-duration: 0.2s;
  }

  .blur-doodle-custom {
    -webkit-backface-visibility: hidden;
    -webkit-perspective: 1000;
    -webkit-transform: translate3d(0,0,0);
    -webkit-transform: translateZ(0);
    backface-visibility: hidden;
    perspective: 1000;
    transform: translate3d(0,0,0);
    transform: translateZ(0);
    filter: blur(1.1rem);
  }
</style>
