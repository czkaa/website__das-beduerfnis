panel.plugin("your-project/customSlideshow", {
  blocks: {
    customSlideshow: `
      <div @click="open">
        <div class="slideshow">
          <template v-if="content.customslideshow">
            <img v-for="image in content.customslideshow" :src="image.url"/>
          </template>
        </div>
      </div>
    `
  }
});
