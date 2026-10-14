panel.plugin("your-project/customDownload", {
  blocks: {
    customDownload: `
    <div @click="open">
      <button v-if="content.download.length > 0" @click="open">Download<br>{{content.title}}</button>
    </div>
    `
  }
});
