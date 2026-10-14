import { createRouter, createWebHistory } from "vue-router";
import { scrollBehavior } from "./scrollBehaviour";
import { useSite, useLanguages } from "@/hooks";
import Error from "@/views/Error.vue";

// import Aktuell from "@/views/Aktuell.vue";


const capitalize = ([first, ...rest]) => first.toUpperCase() + rest.join("");

/**
 * Creates the Vue Router instance
 *
 * @returns {import('vue-router').Router} Router instance for the Vue app
 */
export const initRouter = () => {
  const site = useSite();
  const { isMultilang, languageCode } = useLanguages();
  const base = isMultilang ? `/${languageCode}/` : "";

  /** @type {import('vue-router').RouteRecordRaw[]} */
  const routes = [
    // { path: '/teilhaben/:slug', component: Columns, name: 'Columns' },

    ...site.children.map((page) => ({
      path: `/${page.uri}`,
      component: () =>
        import(`../views/${capitalize(page.template)}.vue`).catch(
          () => Error
        ),
    })),
    ...site.children
      .filter((page) => page.childTemplate)
      .map((page) => ({
        path: `/${page.uri}/:slug`,
        component: () =>
          import(`../views/${capitalize(page.childTemplate)}.vue`).catch(
            () => Error
          ),
      })),


  ];
  // const routes = [
  //   // { path: '/all', component: All, name: 'All' },
  //   { path: '/', component: Home, name: 'Home' },
  //   // { path: '/programm/aktuell', component: Aktuell, name: 'Aktuell' },
  //   { path: '/about/:slug', component: Text, name: 'Text' },
  //   { path: '/programm/:slug', component: Year, name: 'Year' },
  //
  // ];

  // Redirect `/home` to `/`
  routes.find(({ path }) => path === "/home").path = "/";
  routes.push({ path: "/home", redirect: "/" });

  // Catch-all fallback



  /** @type {import('vue-router').Router} */
  return createRouter({
    history: createWebHistory(base),
    routes,
    scrollBehavior,
  });
};
