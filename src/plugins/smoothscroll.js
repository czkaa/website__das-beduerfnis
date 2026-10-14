import smoothscroll from 'smoothscroll-polyfill';

 export default {
  install: (app) => {
    smoothscroll.polyfill();
  }
}
