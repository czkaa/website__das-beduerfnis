panel.plugin("your-project/customHighlight", {
  blocks: {
    customHighlight: `
    <div @click="open">
      <div class="top">{{content.texttop}}<div>
      <div class="center">{{content.textcenter}}</div>
      <div class="bottom">{{content.textbottom}}</div>
    </div>
    `
  }
});
