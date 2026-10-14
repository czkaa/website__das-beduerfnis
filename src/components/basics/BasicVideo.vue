<template>
  <div>
    <video
      controls
      v-if="video?.url"
      :src="video.url"
      :alt="video?.alt"
    ></video>

    <p
      v-if="video?.subtitle"
      class="font-referenz text-sm mt-0.5"
      v-html="video.subtitle"
    />
  </div>
</template>

<script>
export default {
  props: {
    video: Object,
  },
};
</script>

<style lang="scss" scoped></style>
