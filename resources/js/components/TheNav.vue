<script setup>
import { onMounted, onUnmounted } from "vue";
import { curAnchor, routes, defaultAnchor } from "@/stores/routes.js";

// On recupere le hash de l'url
function getHashState() {
    let hash = window.location.hash.substring(1).split("-").at(0);
    if (!hash || !routes.some((route) => route.anchor === hash)) {
        hash = defaultAnchor;
        window.history.pushState(null, null, "#" + hash);
    }
    curAnchor.value = hash;
}

// On ajoute l'event popstate
onMounted(() => {
    window.addEventListener("popstate", getHashState);
    getHashState();
});

// On enleve l'event
onUnmounted(() => {
    window.removeEventListener("popstate", getHashState);
});
</script>
