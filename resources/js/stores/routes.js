import { computed, ref, shallowRef } from "vue";
import PageChapter from "../pages/PageChapter.vue";
import PageStories from "../pages/PageStories.vue";
import PageEditStory from "../pages/PageEditStory.vue";

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
    {
        anchor: "editStory",
        label: "EditStory",
        page: PageEditStory,
    },
];

export const defaultAnchor = "stories";
export const curAnchor = ref(defaultAnchor);
export const currentPage = computed(() => {
    return (
        routes.find((route) => route.anchor === curAnchor.value)?.page ||
        PageStories
    );
});
