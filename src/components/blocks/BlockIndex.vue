<template>
  <div block-index :class="['relative w-full']">
    <BlockHeadline
      v-if="block.identifier === 'customHeadline'"
      :block="block"
    />
    <BlockText v-if="block.identifier === 'customText'" :block="block" />
    <BlockImages v-if="block.identifier === 'customImages'" :block="block" />
    <BlockDownload
      v-if="block.identifier === 'customDownload'"
      :block="block"
    />
    <BlockHighlight
      v-if="block.identifier === 'customHighlight'"
      :block="block"
    />
    <BlockWhitespace v-if="block.identifier === 'customWhitespace'" />
    <BlockLogos v-if="block.identifier === 'customLogos'" :block="block" />
    <BlockCurrentEvents
      v-if="block.identifier === 'customCurrentEvents'"
      :block="block"
    />
    <BlockCurrentExhibition
      v-if="block.identifier === 'customCurrentExhibition'"
      :block="block"
    />
    <BlockSlideshow
      v-if="block.identifier === 'customSlideshow'"
      :block="block"
    />
    <BlockArtist v-if="block.identifier === 'customArtist'" :block="block" />
    <BlockVideo v-if="block.identifier === 'customVideo'" :block="block" />
    <BlockNewsletter v-if="block.identifier === 'customNewsletter'" />
  </div>
</template>

<script>
import BlockHeadline from "@/components/blocks/BlockHeadline.vue";
import BlockHighlight from "@/components/blocks/BlockHighlight.vue";
import BlockLogos from "@/components/blocks/BlockLogos.vue";
import BlockText from "@/components/blocks/BlockText.vue";
import BlockImages from "@/components/blocks/BlockImages.vue";
import BlockDownload from "@/components/blocks/BlockDownload.vue";
import BlockWhitespace from "@/components/blocks/BlockWhitespace.vue";
import BlockCurrentEvents from "@/components/blocks/BlockCurrentEvents.vue";
import BlockCurrentExhibition from "@/components/blocks/BlockCurrentExhibition.vue";
import BlockSlideshow from "@/components/blocks/BlockSlideshow.vue";
import BlockVideo from "@/components/blocks/BlockVideo.vue";
import BlockArtist from "@/components/blocks/BlockArtist.vue";
import BlockNewsletter from "@/components/blocks/BlockNewsletter.vue";

export default {
  props: {
    block: Object,
  },
  components: {
    BlockHeadline,
    BlockText,
    BlockImages,
    BlockHighlight,
    BlockLogos,
    BlockDownload,
    BlockWhitespace,
    BlockCurrentEvents,
    BlockCurrentExhibition,
    BlockSlideshow,
    BlockArtist,
    BlockVideo,
    BlockNewsletter,
  },
};
</script>
