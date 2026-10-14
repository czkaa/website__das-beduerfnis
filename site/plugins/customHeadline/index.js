panel.plugin("your-project/customHeadline", {
  blocks: {
    customHeadline: `
    <div @click="open" :class="['headline', content.size]">
      <span v-for="item in content.headline" :class="[item.align]">{{item.text}}</span>
    </div>
    `
  }
});
