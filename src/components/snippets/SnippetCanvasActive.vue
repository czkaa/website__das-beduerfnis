<template>
  <div  snippet-canvas-active class="w-full h-full">
    <canvas class="w-full h-full"  ref="canvas"
      @mousedown="startPainting"
      @mouseup="finishedPainting"
      @mousemove="handleMousemove"
      @touchstart="startPainting"
      @touchend="finishedPainting"
      @touchmove="handleMousemove"
    />
  </div>
</template>

<script>

import _ from 'lodash'
import $ from 'jquery'

import BasicText from '@/components/basics/BasicText.vue'
import BasicButton from '@/components/basics/BasicButton.vue'

export default {
  props: {
    colors: Array,
    offsetX: Number,
    offsetY: Number,
    styleObject: Object,
    saveTrigger: Boolean
  },
  components: {
    BasicText,
    BasicButton
  },
  data() {
    return {
      canvas: null,
      ctx: null,
      currentPoint: {x: 0, y: 0},
      lastPoint: {x: 0, y: 0},
      xPrev: 0,
      yPrev: 0,
      data : [],
      stroke: {},
      painting: false,
      color: null,
      width: 0,
      stroke: [],
      strokes: [],
      savedData: [],
      hasDrawing: false
    }
  },
  watch: {
    saveTrigger(oldVal, newVal) {
      this.savedData.push(JSON.parse(JSON.stringify(this.data)))
      this.postData(this.data);
      this.initData()
    }
  },
  methods: {
    postData(data) {
        $.ajax({
            contentType: "application/json", // php://input
            dataType : "json",
            method: "POST",
            processData: false,
            url: "/api/postDrawing.php",
            data: JSON.stringify(data)
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function(data) {
            console.log(data);
        });
      },
      midPointBtw(p1, p2) {
        return {
          x: p1.x + (p2.x - p1.x) / 2,
          y: p1.y + (p2.y - p1.y) / 2
        };
      },
      startPainting(e) {
        if (!this.hasDrawing) {
          this.hasDrawing = true;
          this.$store.commit('setHasDrawing')
        }
         this.painting = true;
         this.ctx.moveTo(e.clientX,  e.clientY + this.offsetY);
         this.stroke = []
       },
       finishedPainting() {
         this.painting = false;
         this.data.strokes.push(JSON.parse(JSON.stringify(this.stroke)))
       },
       addPoints(pointArray) {

         if (pointArray.length > 0) {
           let p1 = pointArray[0]
           let p2 = pointArray[1]
           this.ctx.beginPath();
           this.ctx.moveTo(p1.x, p1.y);

           for (var i = 1, len = pointArray.length; i < len; i++) {
             // we pick the point between pi+1 & pi+2 as the
             // end point and p1 as our control point
             var midPoint = this.midPointBtw(p1, p2);
             this.ctx.quadraticCurveTo(p1.x, p1.y, midPoint.x, midPoint.y);
             p1 = pointArray[i];
             p2 = pointArray[i+1];
           }
           this.ctx.lineTo(p1.x, p1.y);
           this.ctx.stroke();
         } else {
           return
         }

       },
       draw(e) {
         if (!this.painting) return

         this.stroke.push({ x: e.clientX + this.offsetX, y: e.clientY + this.offsetY });
         this.ctx.clearRect(0, 0, this.ctx.canvas.width, this.ctx.canvas.height);

         if (this.data.strokes.length > 0) {
           for (var j = 0; j < this.data.strokes.length; j++) {
             this.addPoints(this.data.strokes[j])
           }
         }

         if (this.savedData.length > 0) {
           for (let data of this.savedData) {
             for (var j = 0; j < data.strokes.length; j++) {
               this.addPoints(data.strokes[j])
             }
           }
         }

         this.addPoints(this.stroke);
       },
       handleMousemove: _.throttle(function (e) {
           this.draw(e);
         }, 20),
       randomColor() {
        return this.colors[Math.floor(Math.random() * this.colors.length)].color
      },

      initData() {
        this.data = {}
        this.data.strokes = []
        this.stroke = []
        this.data.attributes = {color: this.color, width: this.width}

        console.log(this.data.attributes)
      }
  },
  mounted() {
    this.canvas = this.$refs.canvas
    this.ctx = this.canvas.getContext('2d');
    this.ctx.globalCompositeOperation = "source-over";
    this.canvas.height = parseInt(this.styleObject.height);
    this.canvas.width = parseInt(this.styleObject.width);
    this.ctx.globalAlpha = "1";
    this.ctx.lineCap ="round"
    this.ctx.lineJoin = "round"
    this.ctx.globalAlpha = "0.95";


    this.color = this.randomColor()
    this.width = Math.floor(Math.random() * 100) + 1
    this.ctx.strokeStyle = this.color
    this.ctx.fillStyle = this.color
    this.ctx.lineWidth = this.width

    this.initData();

  }
}

</script>
