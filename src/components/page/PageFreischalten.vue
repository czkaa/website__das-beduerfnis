<template>
  <div v-if="data" page-freischalten class="fixed top-0 left-0 w-screen h-screen overflow-auto bg-white px-60 md:px-5 py-14 space-y-5 bg-gray-200">
      <SnippetRate v-for="drawing in data" :data="[drawing]" :styleObject="styleObject" />
  </div>
  <div class="absolute w-full top-20 text-center font-referenz text-sm" v-else>Gerade gibt es keine Zeichnungen zum Freischalten.</div>
</template>

<script>

import SnippetRate from '@/components/snippets/SnippetRate.vue'

import _ from 'lodash'
import $ from 'jquery'

export default {
  data() {
    return {
      data: null,
      styleObject: {width: '5334px', height: '1927px'},
    }
  },
  components: {
    SnippetRate
  },
  methods: {
    getData() {
      let _this = this
      $.ajax({
        url: "api/getDrawingsPending.php",
        type: "GET",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
          try {
            JSON.parse(data);
            _this.data = JSON.parse(data)
          } catch (e) {
            return false;
          }
          return true;
        }
      });
    },
  },
  mounted() {
    this.getData()
  }

}

</script>
