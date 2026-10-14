panel.plugin("your-project/customImages", {
  blocks: {
    customImages: `
      <div @click="open">
        <template v-if="content.customimages">
          <img v-for="image in content.customimages" :src="image.url"/>
        </template>
      </div>
    `
  }
});
