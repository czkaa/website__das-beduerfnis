<template>
  <div block-current-exhibition :class="['flex flex-col space-y-5']">
    <div v-if="block.content?.exhibitions?.length > 0">
      <BasicHeadline
        :text="'Aktuelle Ausstellung'"
        :size="'md'"
        :class="['mb-2']"
      />
      <div :class="['flex flex-col space-y-5']">
        <router-link
          :to="{ path: `/programm/${block.content.exhibitions[0].uri}` }"
          :key="block.content.exhibitions[0].title"
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
            :text="
              formatDates(
                block.content.exhibitions[0].start,
                block.content.exhibitions[0].end
              )
            "
            :isNumber="true"
            :size="'md'"
            :class="['w-28 flex-shrink-0']"
          />
          <div>
            <h3 class="text-md" lang="de">
              <span
                v-for="item in block.content.exhibitions[0].headline.content
                  .headline"
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
              v-if="block.content.exhibitions[0].subtitle"
              :text="block.content.exhibitions[0].subtitle"
              :size="'md'"
              class="mt-5"
            />
          </div>
        </router-link>
      </div>
    </div>
    <div v-else>
      <BasicHeadline
        :text="'Aktuell findet keine Ausstellung statt'"
        :size="'md'"
        :class="['mb-2']"
      />
    </div>
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
  mounted() {
    console.log(this.block);
  },
};
</script>
