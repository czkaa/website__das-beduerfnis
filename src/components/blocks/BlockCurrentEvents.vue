<template>
  <div
    block-current-events
    :class="['flex flex-col space-y-5']"
    v-if="block.content.events.length > 0"
  >
    <BasicHeadline
      :text="
        block.content.events.length > 1
          ? 'Aktuelle Veranstaltungen'
          : 'Aktuelle Veranstaltung'
      "
      :size="'md'"
      :class="['mb-2']"
    />

    <router-link
      v-for="event in block.content.events"
      :to="{ path: `/programm/${event.uri}` }"
      :key="event.title"
      :class="[
        'flex',
        'border-aktuell border-black',
        'transition-color duration-hover',
        'hover:text-custom hover:border-custom',
        'bg-white',
        'p-5',
      ]"
    >
      <BasicHeadline
        :text="formatDates(event.start, event.end)"
        :isNumber="true"
        :size="'md'"
        :class="['w-28 flex-shrink-0']"
      />
      <div>
        <h3 class="text-md" lang="de">
          <span
            v-for="item in event.headline.content.headline"
            :key="item.text"
            :class="[
              'block font-referenz hyphens headline text-lg uppercase',
              item.align === 'center'
                ? 'text-center'
                : item.align === 'right'
                ? 'text-right'
                : 'text-left',
            ]"
            v-html="item.text.replaceAll('<p>', '').replaceAll('</p>', '')"
          />
        </h3>
        <BasicHeadline
          v-if="event.subtitle"
          :text="event.subtitle"
          :size="'md'"
          class="mt-5"
        />
      </div>
    </router-link>
  </div>
</template>

<script>
import formatDates from "@/mixins/formatDate";
import formatDate from "@/mixins/formatDate";
import BasicText from "@/components/basics/BasicText.vue";
import BasicHeadline from "@/components/basics/BasicHeadline.vue";

export default {
  mixins: [formatDate, formatDates],
  components: {
    BasicText,
    BasicHeadline,
  },
  props: {
    block: Object,
  },
};
</script>

<style lang="scss" scoped>
@media (max-width: 1000px) {
  .hyphens {
    -webkit-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
  }
}

.headline:deep(::selection) {
  @apply text-custom;
  @apply bg-white;
}
</style>
