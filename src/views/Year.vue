<template>

  <PageYear v-if="page.isReady" :page="page"/>

</template>

<script>
  import { usePage } from "@/hooks"
  import PageYear from '@/components/page/PageYear.vue'

  export default {
    components: {
      PageYear
    },

    setup() {

      const page = usePage();

      (async () => {
        await page.isReadyPromise();
      })();

      return {
        page
      };
    },

    mounted() {
      console.log('test')
    }
  }
</script>

<style lang="scss" scoped>


</style>
