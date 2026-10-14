<template>
  <div page-year class="w-full overflow-x-hidden px-5 py-12">
    <div :class="['min-h-screen', 'flex flex-col justify-between', 'pb-12']">
      <BasicHeadline :text="page.title" :size="'lg'" class="mb-20" />

      <SnippetTimeline :exhibitions="page.exhibitions" class="sm:mb-8" />

      <BasicText
        :text="page.subheading"
        :size="'md'"
        :class="['w-5/6 sm:w-full', 'mb-5 mt-auto']"
      />

      <div :class="['pb-8 mb-5']">
        <BasicText :text="page.description" :size="'sm'" :multiCol="true" />
      </div>
    </div>

    <div class="pb-32">
      <SnippetExhibition
        v-for="(exhibition, index) in page.exhibitions"
        :key="exhibition.title"
        :exhibition="exhibition"
        :class="[
          'pt-5 mb-12',
          {
            isCurrent: exhibition.isCurrent,
          },
        ]"
      />
    </div>
  </div>
</template>

<script>
import BasicText from "@/components/basics/BasicText.vue";
import BasicHeadline from "@/components/basics/BasicHeadline.vue";
import SnippetExhibition from "@/components/snippets/SnippetExhibition.vue";
import SnippetTimeline from "@/components/snippets/SnippetTimeline.vue";

export default {
  props: {
    page: Object,
  },
  components: {
    BasicHeadline,
    BasicText,
    SnippetExhibition,
    SnippetTimeline,
  },
  methods: {
    async scrollTo() {
      await this.$nextTick();
      await this.$nextDOMUpdate();
      const current = document.querySelector(".isCurrent");
      if (!current) return;

      setTimeout(() => {
        window.scrollTo({
          top: current.offsetTop - 32,
          behavior: "smooth",
        });
      }, 1000);
    },
  },
  mounted() {
    this.scrollTo();
  },
};
</script>
