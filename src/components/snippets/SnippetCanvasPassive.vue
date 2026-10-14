<template>
  <div snippet-canvas-passive class="w-full h-full">
    <canvas class="w-full h-full" ref="canvas" />
  </div>
</template>

<script>

export default {
  props: {
    styleObject: Object,
    data: Array
  },
  data() {
    return {
      canvas: null,
      ctx: null,
      currentPoint: null,
      lastPoint: null
    }
  },
  methods: {
      midPointBtw(p1, p2) {
        return {
          x: p1.x + (p2.x - p1.x) / 2,
          y: p1.y + (p2.y - p1.y) / 2
        };
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
     initDrawing() {
       for (let drawing of this.data) {
         this.ctx.strokeStyle =  drawing.attributes.color
         this.ctx.fillStyle = drawing.attributes.color
         this.ctx.lineWidth = drawing.attributes.width
         this.ctx.lineCap = "round"
         this.ctx.lineJoin = "round"

         for (let stroke of drawing.strokes) {
           this.addPoints(stroke)
         }
       }
     },
     addPoints(pointArray) {

       if (pointArray[0] === undefined || pointArray[1] === undefined) {
         return
       }

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
     },

  },
  mounted() {
    this.canvas = this.$refs.canvas
    this.ctx = this.canvas.getContext('2d');
    this.ctx.globalCompositeOperation = "source-over";
    this.canvas.height = parseInt(this.styleObject.height);
    this.canvas.width = parseInt(this.styleObject.width);
    this.ctx.globalAlpha = "0.95";

    this.initDrawing();
  }
}

</script>
