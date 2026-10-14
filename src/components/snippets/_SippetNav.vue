<template>
  <div snippet-nav class="flex">
    <BasicLink :uri="link.uri" :title="link.title" :showActive="false" :onlyHeadline="path.includes(site.menu.topleft.slug)" class="mr-5"/>

    <transition name="fade">
      <div v-show="path.includes(site.menu.topleft.slug)" class="w-full flex justify-start items-center pointer-events-auto">
        <BasicLink v-for="(page, index) in site.menu.topleft.children" :uri="page.uri" :key="page.uri" :title="page.title"  :showActive="true"  class="mr-1.5"/>
      </div>
    </transition>
  </div>
</template>

<script>
import BasicLink from '@/components/basics/BasicLink.vue'

export default {
  props: {
    link: Object,
    links: Array,
    isReverse: Boolean
  },
  components: {
    BasicLink
  }
}

</script>
