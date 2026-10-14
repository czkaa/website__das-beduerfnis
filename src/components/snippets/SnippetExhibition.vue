<template>
  <div snippet-exhibition
    :id="`e-${exhibition.slug}`"
    :class="[
      'flex space-x-5',
      'sm:flex-col sm:space-y-5 sm:space-x-0 sm:items-center',
      'w-full',
    ]"
  >
    <div
      :class="[
        'pt-16 sm:pt-0',
        'w-40',
        'flex-shrink-0',
        'relative',
      ]"
    >
    <div class=" filter blur-doodle-custom sm:pb-5">
      <div
        :style="{
            maskImage: `url(/img/dot.svg)`,
            maskRepeat: 'no-repeat',
            maskPosition: 'center',
            maskSize: 'cover',
            background: exhibition.color,
            transform: `rotate(${Math.floor(Math.random() * 360)}deg)`
        }"
        :class="[
          'w-full h-24',
        ]"
      />
    </div>

    </div>
    <BasicHeadline
      :text="dateString"
      :size="'md'"
      :isNumber="true"
      :class="[
        'absolute',
        'mt-16'
      ]"
    />

    <div>

      <div
        :class="[
          'flex space-x-5 justify-between',
          'sm:flex-col sm:space-x-0 sm:space-y-5',
           isWide ? 'md:flex-col md:space-x-0 md:space-y-5' : ''
        ]"
      >
        <div
          v-if="exhibition.isLeft"
          :class="[
            'sm:w-full',
            'flex-shrink-0',
            isWide ? 'w-2/3 mr-auto' : 'ml-auto w-1/2',
          ]"
        >
          <div class="w-full h-0" :style="{paddingBottom: `${1/exhibition.images[0].ratio*100}%`}">
            <BasicImage
              :image="exhibition.images[0]"
              class=" "
              :class="[
                'max-h-image',
                'object-left'
              ]"
            />
          </div>
        </div>

        <div
          :class="[
            'sm:w-full md:w-full mr-auto',
          ]"
        >
          <BasicText
            v-if="exhibition.category"
            :text="exhibition.category"
            :size="'md'"
            class="text-right mb-1"
          />
          <div
            v-for="(block, index) in exhibition.headline"
            :key="block.identifier"
          >
            <BlockIndex
              v-if="block !== null"
              :identifier="block.identifier"
              :block="block"
              />
          </div>
          <BasicText
            v-if="exhibition.subtitle"
            :text="exhibition.subtitle"
            :size="'md'" class="mt-5"
          />
          <BasicText
            :text="exhibition.description"
            :size="'sm'"
            class="mt-5"
          />
        </div>

        <div
          v-if="!exhibition.isLeft"
          :class="[
            'sm:w-full',
            'flex-shrink-0',
            isWide ? 'w-2/3 mr-auto' : 'ml-auto w-1/2',
          ]"
        >
          <div class="w-full h-0" :style="{paddingBottom: `${1/exhibition.images[0].ratio*100}%`}">
            <BasicImage
              :image="exhibition.images[0]"
              class=" "
              :class="[
                'object-right'
              ]"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import BasicText from '@/components/basics/BasicText.vue'
import BlockIndex from '@/components/blocks/BlockIndex.vue'
import BasicImage from '@/components/basics/BasicImage.vue'
import BasicHeadline from '@/components/basics/BasicHeadline.vue'

export default {
  props: {
    exhibition: Object
  },
  components: {
    BasicHeadline,
    BasicText,
    BlockIndex,
    BasicImage
  },

  computed: {
    isWide() {
      return this.exhibition.images[0] ? this.exhibition.images[0].ratio > 1 : false
    },
    dateString() {
      console.log(this.exhibition.end)

      let monthStart = new Date(this.exhibition.start).toLocaleDateString('de-DE', { month: 'short'})
      let monthEnd = new Date(this.exhibition.end).toLocaleDateString('de-DE', { month: 'short'})
      let dayStart = new Date(this.exhibition.start).toLocaleDateString('de-DE', { day: 'numeric'})
      let dayEnd = new Date(this.exhibition.end).toLocaleDateString('de-DE', { day: 'numeric'})
            // new Date(exhibition.start).toLocaleDateString('de-DE', options)}–<br>${new Date(exhibition.end).toLocaleDateString('de-DE', options)
      if (this.exhibition.end === null) {
        return `${dayStart}. ${monthStart}`
      } else  if (monthStart === monthEnd) {
        return `${dayStart}.–${dayEnd}.<br>${monthStart}`
      } else {
        return `${dayStart}. ${monthStart}.–<br>${dayEnd} ${monthEnd}`
      }
    }
  },
  mounted() {
  }
}

</script>

<style lang="scss" scoped>

.blur-doodle-custom {
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transform: translateZ(0);
  backface-visibility: hidden;
  perspective: 1000;
  transform: translate3d(0,0,0);
  transform: translateZ(0);
  filter: blur(20px);
}

</style>
