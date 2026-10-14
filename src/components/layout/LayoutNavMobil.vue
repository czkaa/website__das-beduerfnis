<template>
  <nav layout-nav-mobil class="fixed top-0 left-0 w-full">
  <div class="w-full px-2 bg-white shadow-nav">
    <div class="w-full flex justify-center items-center h-nav">
      <div
        :class="[
          'w-full',
          'flex justify-start items-center',
          'items-center'
        ]"
      >
        <div class="flex items-center">
          <BasicLink :uri="''" :title="site.title" :showActive="false" />
          <SnippetSocial :social="site.social" />
        </div>
      </div>

      <button  @click="handleClick" class="focus:outline-none flex justify-center items-center cursor-w-resize focus:border-transparent focus:ring-0" >
        <img :src="'/icons/x.svg'"
          :class="[
            'h-4 transition-all duration-500',
            isClosed ? 'transform rotate-45' : ''
          ]"
        >
      </button>
    </div>


    <div
      ref="showMore"
      :class="[
        'w-full',
        'overflow-hidden',
        'transition-all opacity-0',
        'space-y-1.5',
        `duration-${ duration }`
      ]"
      :style="styleShowMore"
    >
      <div class="">
        <BasicLink
          :uri="site.menu.topleft.children[0].uri"
          :title="site.menu.topleft.title"
          :showActive="false"
          :showHover="!path.includes(site.menu.topleft.slug)"
          class="block mt-1"
        />
        <BasicLink
          v-for="(page, index) in site.menu.topleft.children"
          :uri="page.uri"
          :key="page.uri"
          :title="page.title"
          :showActive="true"
          class="block pl-7"
        />
      </div>

      <div class="">
        <BasicLink
          :uri="site.menu.topright.children[0].uri"
          :title="site.menu.topright.title"
          :showActive="false"
          :showHover="!path.includes(site.menu.topright.slug)"
          class="block mt-1"
        />
        <BasicLink
          v-for="(page, index) in site.menu.topright.children"
          :uri="page.uri"
          :key="page.uri"
          :title="page.title"
          :showActive="true"
          class="block pl-7"
        />
      </div>

      <div class="">
        <BasicLink
          :uri="site.menu.bottomleft.children[0].uri"
          :title="site.menu.bottomleft.title"
          :showActive="true"
          :showHover="!path.includes(site.menu.bottomleft.slug)"
          class="block mt-1"
        />

        <BasicLink
          v-for="(page, index) in site.menu.bottomleft.children"
          :uri="page.uri"
          :key="page.uri"
          :title="page.title"
          :showActive="true"
          class="block pl-7"
        />
      </div>

      <div class="pb-1.5">
        <BasicLink
          :uri="site.menu.bottomright.children[0].uri"
          :title="site.menu.bottomright.title"
          :showActive="true"
          :showHover="!path.includes(site.menu.bottomright.slug)"
          class="block mt-1"
        />

        <BasicLink
          v-for="(page, index) in site.menu.bottomright.children"
          :uri="page.uri"
          :key="page.uri"
          :title="page.title"
          :showActive="true"
          class="block pl-7"
        />
      </div>
    </div>
  </div>
  </nav>
</template>

<script>
// https://github.com/tailwindlabs/tailwindcss.com/issues/765
// https://github.com/tailwindlabs/tailwindcss/discussions/3646
import { theme } from 'tailwind.config.js';
import BasicLink from '@/components/basics/BasicLink.vue'
import BasicHomeLogo from '@/components/basics/BasicHomeLogo.vue'
import SnippetSocial from '@/components/snippets/SnippetSocial.vue'


export default {
  props: {
    site: Object
  },
  components: {
    BasicLink,
    SnippetSocial,
    BasicHomeLogo
  },
  data () {
    return {
      isAbout: true,
      styleShowMore: {
        maxHeight: 0
      },
      duration: 1000,
      isClosed: true,
      isBlocked : false
    }
  },

  watch: {
    isClosed (val) {
      val ? this.hideShowMore () : this.showShowMore()
    },
    $route() {
      this.isClosed = true;
    },
  },

  computed: {
    path() {
      return this.$route.path
    }
  },

  mounted () {
    this.isClosed ? this.hideShowMore () : this.showShowMore()
  },

  methods: {
    async showShowMore () {
      const el = this.$refs['showMore'];
      this.styleShowMore.maxHeight = `${el.scrollHeight}px`;
      this.styleShowMore.opacity = `1`;
      this.isBlocked = true;
      setTimeout(() => {
        this.styleShowMore.maxHeight = `none`;
        this.isBlocked = false;
      }, this.duration);
    },

    async hideShowMore () {
      const el = this.$refs['showMore'];
      this.styleShowMore.maxHeight = `${el.scrollHeight}px`;
      await this.$nextTick();
      await this.$nextDOMUpdate();
      this.styleShowMore.maxHeight = `0px`;
      this.styleShowMore.opacity = `0`;
    },

    handleClick() {
      if (!this.isBlocked) {
        this.isClosed = !this.isClosed
      }
    }

  },
};

</script>
