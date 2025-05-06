import { computed, ref } from "vue";
import PageChapter from "../pages/PageChapter.vue";
import PageStories from "../pages/PageStories.vue";

//Déclaration des routes
export const routes = [
    {
        anchor: "story",
        label: "Chapter",
        page: PageChapter,
    },
    {
        anchor: "stories",
        label: "Stories",
        page: PageStories,
    },
];

//Gestion des routes
export const defaultAnchor = "stories";
export const curAnchor = ref(defaultAnchor);
export const currentPage = computed(() => {
    return (
        routes.find((route) => route.anchor === curAnchor.value)?.page ||
        PageStories
    );
});
