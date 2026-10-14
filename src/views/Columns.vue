<template>

  <PageColumns v-if="page.isReady" :page="page"/>

</template>

<script>
  import { usePage } from "@/hooks"
  import PageColumns from '@/components/page/PageColumns.vue'

  export default {
    components: {
      PageColumns
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
