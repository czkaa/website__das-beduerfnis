<template>
  <div snippet-canvas class="canvasContainer w-full h-full overflow-auto my-auto" ref="canvasContainer" @scroll="updateOffset">
    <div :style="styleObject" ref="canvasBackground" class="relative">
        <transition name="fade">
          <SnippetCanvasPassive v-if="data" class="pointer-events-none" :styleObject="styleObject" :data="data"/>
        </transition>

        <SnippetCanvasActive class="absolute top-0 left-0 no-hover:hidden" :offsetY="offsetY" :offsetX="offsetX" :colors="colors" :styleObject="styleObject" :saveTrigger="saveTrigger"/>

        <div class="absolute top-0 left-0 w-full h-full pointer-events-none"><img :src="`/icons/canvasBackground.svg`"></div>
    </div>

    <transition name="fade">
      <div v-if="isDisclaimer" class="fixed top-1/2 left-1/2  transform -translate-y-1/2 -translate-x-1/2 p-5 w-80 bg-white shadow-nav flex flex-col items-center justify-center">
        <BasicText text="Danke! Deine Zeichnung wurde gespeichert. Wir schauen noch mal kurz drüber, bevor wir die Zeichnung für alle sichtbar veröffentlichen." size="sm" />
        <BasicButton @click="isDisclaimer=false" class="px-3 mt-5"><BasicText text="OK!" size="sm" /></BasicButton>
      </div>
    </transition>

    <BasicButton v-show="hasDrawing" @click="saveTrigger=!saveTrigger" class="fixed right-2 bottom-10 sm:bottom-2 sm:right-2 px-2 no-hover:hidden">
      <BasicText text="Zeichnung speichern" size="sm" />
    </BasicButton>

  </div>
</template>

<script>

import SnippetCanvasActive from '@/components/snippets/SnippetCanvasActive.vue'
import SnippetCanvasPassive from '@/components/snippets/SnippetCanvasPassive.vue'
import BasicText from '@/components/basics/BasicText.vue'
import BasicButton from '@/components/basics/BasicButton.vue'
import _ from 'lodash'
import $ from 'jquery'

export default {
  props: {
    colors: Array,
    size: Object
  },
  components: {
    SnippetCanvasActive,
    SnippetCanvasPassive,
    BasicText,
    BasicButton
  },
  computed: {
    hasDrawing() {
      return this.$store.state.hasDrawing;
    }
  },
  data() {
    return {
      styleObject: {width: '5334px', height: '1927px'},
      offsetY: 0,
      offsetX: 0,
      saveTrigger: false,
      isDisclaimer: false,
      data: null
    }
  },
  methods: {
    getData() {
      let _this = this
      $.ajax({
        url: "api/getDrawingsAccepted.php",
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
    updateOffset() {
      this.offsetY = this.$refs.canvasContainer.scrollTop - 32
      this.offsetX = this.$refs.canvasContainer.scrollLeft
    }
  },
  watch: {
    saveTrigger(oldVal, newVal) {
     this.isDisclaimer = true;
    }
  },
  mounted() {
    this.getData();

    let scrollTop = Math.floor(Math.random() * this.$refs.canvasContainer.scrollHeight)
    let scrollLeft = Math.floor(Math.random() * this.$refs.canvasContainer.scrollWidth)

    this.$refs.canvasContainer.scrollTo({
      top: scrollTop,
      left: scrollLeft,
      behavior: 'auto'
    });
  }
}

</script>

<style>

  canvas {
    user-select:none;
  }

  .canvasContainer {
    user-select:none;
  }

</style>
