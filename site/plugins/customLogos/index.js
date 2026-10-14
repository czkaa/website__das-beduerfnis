panel.plugin("your-project/customLogos", {
  blocks: {
    customLogos: `
      <div @click="open">
        <div class="logos">
          <img
          v-for="(img, index) in content.logos"
          :src="img.url"/>
        <div>
      </div>
    `
  }
});
