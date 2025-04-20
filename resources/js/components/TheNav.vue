<script setup>
import { onMounted, onUnmounted } from "vue";
import { curAnchor, routes, defaultAnchor } from "@/stores/routes.js";

function getHashState() {
    let hash = window.location.hash.substring(1).split("-").at(0);
    if (!hash || !routes.some((route) => route.anchor === hash)) {
        hash = defaultAnchor;
        window.history.pushState(null, null, "#" + hash);
    }
    curAnchor.value = hash;
}

onMounted(() => {
    window.addEventListener("popstate", getHashState);
    getHashState();
});

onUnmounted(() => {
    window.removeEventListener("popstate", getHashState);
});
</script>
