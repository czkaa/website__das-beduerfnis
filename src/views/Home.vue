<template>

  <PageHome v-if="page.isReady" :page="page"/>

</template>

<script>
  import { usePage } from "@/hooks"
  import PageHome from '@/components/page/PageHome.vue'

  export default {
    components: {
      PageHome
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
