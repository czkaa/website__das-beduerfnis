import { createStore } from 'vuex'

export const store = createStore({
  state () {
    return {
      navHeight: {
        top: null
      },
      scrollTo: null,
      hasDrawing: false
    }
  },
  mutations: {
    setNavHeight(state, object) {
      state.navHeight = object;
    },
    setScrollTo(state, string) {
      state.scrollTo = string;
    },
    setHasDrawing(state) {
      state.hasDrawing = true;
    },
  }
})
