<template>
  <div snippet-rate class="">
    <SnippetCanvasPassive class="pointer-events-none bg-white"  :data="data" :styleObject="styleObject"/>

    <div class="p-1 flex justify-center items-center space-x-5 h-10">
      <BasicButton v-show="isAccepted === undefined" @click="accept" class="px-2">
        <BasicText text="Veröffentlichen" size="sm" />
      </BasicButton>

      <BasicButton v-show="isAccepted === undefined" @click="decline" class="px-2">
        <BasicText text="Verstecken" size="sm" />
      </BasicButton>

      <BasicText v-if="isAccepted === false" text="Zeichnung wurde versteckt" size="sm" />
      <BasicText v-if="isAccepted" text="Zeichnung wurde veröffentlicht" size="sm" />
    </div>
  </div>
</template>

<script>
import SnippetCanvasPassive from '@/components/snippets/SnippetCanvasPassive.vue'
import BasicText from '@/components/basics/BasicText.vue'
import BasicButton from '@/components/basics/BasicButton.vue'

import _ from 'lodash'
import $ from 'jquery'

export default {
  props: {
    data: Array,
    styleObject: Object
  },
  data() {
    return {
      isAccepted: undefined
    }
  },
  components: {
    BasicButton,
    BasicText,
    SnippetCanvasPassive,
  },
  methods: {
    accept() {
      let _this = this;
      console.log(_this.data[0].path)
      $.ajax({
          contentType: "application/json", // php://input
          dataType : "json",
          method: "POST",
          processData: false,
          url: "/api/moveDrawingsAccepted.php",
          data: JSON.stringify(_this.data[0].path)
      })
      .done(function(data) {
          console.log('ACCEPTED');
      })
      .fail(function(data) {
          console.log(data);
      });
      this.isAccepted = true
    },
    decline() {
      let _this = this;
      $.ajax({
          contentType: "application/json", // php://input
          dataType : "json",
          method: "POST",
          processData: false,
            url: "/api/moveDrawingsDeclined.php",
          data: JSON.stringify(this.data[0].path)
      })
      .done(function(data) {
          console.log(_this.date[0].path)
      })
      .fail(function(data) {
          console.log(data);
      });
      this.isAccepted = true
      this.isAccepted = false
    }
  }
}

</script>
