export default {
  /*
  * https://stackoverflow.com/questions/51296969/vue-js-how-can-nexttick-ensure-that-dom-render-is-completed-after-data-change
  * https://forum.vuejs.org/t/does-nexttick-work-weirdly/42918/7
  * https://pastebin.com/n26iVs7d
  * https://forum.freecodecamp.org/t/how-to-make-js-wait-until-dom-is-updated/122067
  */
  install: (app) => {
    app.config.globalProperties.$nextDOMUpdate = () => {
      return new Promise ((resolve) => {
        if (typeof window === "undefined") resolve()
        const intermediate = () => { window.requestAnimationFrame(resolve) }
        window.requestAnimationFrame(intermediate)
      })
    }
  }
}
