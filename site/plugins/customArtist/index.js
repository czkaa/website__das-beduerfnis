panel.plugin("your-project/customArtist", {
  blocks: {
    customArtist: `
    <div @click="open" class="headline">
      <span v-for="item in content.headline" :class="[item.align]">{{item.text}}</span>
    </div>
    `
  }
});
