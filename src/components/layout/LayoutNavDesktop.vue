<template>
  <nav layout-nav-desktop
    :class="[
      'fixed top-0 left-0',
      'w-full h-full pointer-events-none'
    ]"
  >

  <div class="absolute w-full h-nav top-0 left-0 flex justify-between items-center bg-white shadow-nav py-1 px-2">
    <div class="w-full flex items-center">
      <!-- top left is special because of logotype and social media links between child pages -->
      <BasicLink :uri="''" :title="site.title" :showActive="false" />

      <SnippetSocial
        :social="site.social"
      />

      <BasicLink
        :uri="site.menu.topleft.children[0].uri"
        :title="site.menu.topleft.title" :showActive="false"
        :showHover="!path.includes(site.menu.topleft.slug)"
        class="mr-5"/>

      <transition name="fade">
        <div v-show="path.includes(site.menu.topleft.slug)" class="w-full flex justify-start items-center pointer-events-auto">
          <BasicLink v-for="(page, index) in site.menu.topleft.children" :uri="page.uri" :key="page.uri" :title="page.title"  :showActive="true"  class="mr-1.5"/>
        </div>
      </transition>
    </div>

    <div class="w-full flex flex-row-reverse items-center">
      <BasicLink
        :uri="site.menu.topright.children[0].uri"
        :title="site.menu.topright.title"
        :showActive="false"
        :showHover="!path.includes(site.menu.topright.slug)"
        class="ml-5"/>

      <transition name="fade">
        <div v-show="path.includes(site.menu.topright.slug)" class="w-full flex flex-row-reverse items-center pointer-events-auto">
          <BasicLink v-for="(page, index) in site.menu.topright.children" :uri="page.uri" :key="page.uri" :title="page.title"  :showActive="true" class="mr-1.5"/>
        </div>
      </transition>
    </div>
  </div>

  <div class="absolute w-full h-nav bottom-0 left-0 flex justify-between items-centers bg-white shadow-nav pointer-events-auto py-1 px-2">
    <div class="w-full flex items-center space-x-1.5">
      <BasicLink
      :uri="site.menu.bottomleft.children[0].uri"
      :title="site.menu.bottomleft.title"
      :showActive="false"
      :showHover="!path.includes(site.menu.topleft.slug)"
      class="mr-5"/>

      <transition name="fade">
        <div v-show="path.includes(site.menu.bottomleft.slug)" class="w-full flex justify-start items-center pointer-events-auto">
          <BasicLink v-for="(page, index) in site.menu.bottomleft.children" :uri="page.uri" :key="page.uri" :title="page.title"  :showActive="true" class="ml-1.5"/>
        </div>
      </transition>
    </div>

    <div class="w-full flex flex-row-reverse items-center space-x-1.5">
      <BasicLink
      :uri="site.menu.bottomright.children[0].uri"
      :title="site.menu.bottomright.title"
      :showActive="false"
      :showHover="!path.includes(site.menu.bottomright.slug)"
      class="ml-5"/>

      <transition name="fade">
        <div v-show="path.includes(site.menu.bottomright.slug)" class="w-full flex flex-row-reverse items-center pointer-events-auto">
          <BasicLink v-for="(page, index) in site.menu.bottomright.children" :uri="page.uri" :key="page.uri" :title="page.title"  :showActive="true" class="mr-1.5"/>
        </div>
      </transition>
    </div>
  </div>

  </nav>
</template>

<script>

import BasicLink from '@/components/basics/BasicLink.vue'
import SnippetSocial from '@/components/snippets/SnippetSocial.vue'
import BasicHomeLogo from '@/components/basics/BasicHomeLogo.vue'

export default {
  props: {
    site: Object
  },
  components: {
    BasicLink,
    SnippetSocial,
    BasicHomeLogo
  },
  computed: {
    path() {
      return this.$route.path
    },
  },
}

</script>
