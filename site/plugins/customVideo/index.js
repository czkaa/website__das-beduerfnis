panel.plugin("your-project/customVideo", {
  blocks: {
    customVideo: `
      <div @click="open">
        <div class="video-placeholder"></div>
      </div>
    `,
  },
});
