import _throttle from 'lodash.throttle'

export default {
  methods: {
    handleScroll(event) {
      _throttle(function (event) {

        this.currentScrollPosition = event.target.scrollTop
        if (this.lastScrollPosition < 100) { // dont hide within the first 100px of the screen
          this.$store.commit('setMenuIsVisible', true)
        } else if (this.currentScrollPosition > this.lastScrollPosition) {
          this.$store.commit('setMenuIsVisible', false)
        } else {
          this.$store.commit('setMenuIsVisible', true)
        }

        this.lastScrollPosition = this.currentScrollPosition
      }, 250)
    }
  }
}
