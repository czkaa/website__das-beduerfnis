<template>
  <div basic-headline class="hyphens"
    :class="[stylisticSet]"
  >
    <h2 lang="de"
      v-kirbytext
      v-html="text"
      v-if="size === 'xl'"
      :class="[
        'font-referenz text-xl',
      ]"
    />
    <h3 lang="de"
      v-kirbytext
      v-html="text"
      v-if="size === 'lg'"
      :class="[
        'font-referenz text-lg',
      ]"
    />
    <h4 lang="de"
      v-kirbytext
      v-html="text"
      v-if="size === 'md'"
      :class="[
        'font-referenz text-md sm:text-md-sm',
      ]"
    />

    <h5 lang="de"
      v-kirbytext
      v-html="text"
      v-if="size === 'sm'"
      :class="[
        'font-referenz text-sm',
        {
          'ss12' : isNumber
        }
      ]"
    />
  </div>
</template>

<script>

  export default {
    data() {
      return {
        stylisticSet: 'ss01',
        interval: null,
        features: ['ss01', 'ss02', 'ss03', 'ss04', 'ss05', 'ss06', 'ss07', 'ss08', 'ss09', 'ss10', 'ss11', 'ss12']
      }
    },
    props: {
      text: String,
      size: String,
      isNumber: {
        type: Boolean,
        default: false
      },
      animate: {
        type: Boolean,
        default: false
      }
    },
    mounted() {
      let _ = this
      if (this.isNumber) {
        return 'ss12'
      } else if (this.animate) {
        this.interval = setInterval(function() {
          _.stylisticSet = _.features[Math.floor(Math.random() * _.features.length)]
        }, 400);
      } else {
        this.stylisticSet = this.features[Math.floor(Math.random() * this.features.length)]
      }
    },
    onUnmounted() {
      if (this.animate) {
        clearInterval(this.interval);
      }
    },
  }

</script>

<style scoped>

.headline:deep(::selection) {
  @apply text-custom;
  @apply bg-white;
}

.ss01 {
  font-feature-settings: "ss01" 1;
}
.ss02 {
  font-feature-settings: "ss02" 1;
}
.ss03 {
  font-feature-settings: "ss03" 1;
}
.ss04 {
  font-feature-settings: "ss04" 1;
}
.ss05 {
  font-feature-settings: "ss05" 1;
}
.ss06 {
  font-feature-settings: "ss06" 1;
}
.ss07 {
  font-feature-settings: "ss07" 1;
}
.ss08 {
  font-feature-settings: "ss08" 1;
}
.ss09 {
  font-feature-settings: "ss09" 1;
}
.ss10 {
  font-feature-settings: "ss10" 1;
}
.ss11 {
  font-feature-settings: "ss11" 1;
}
.ss12 {
  font-feature-settings: "ss12" 1;
}


@media (max-width: 1000px) {
  .hyphens {
    -webkit-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
  }
}

</style>
