panel.plugin("your-project/customText", {
  blocks: {
    customText: `
      <div @click="open">
        <div :class="[content.size, 'columns-' + content.columns ]" v-html="content.text" />
      </div>
    `
  }
});
