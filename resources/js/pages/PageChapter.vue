<script setup>
import { fetchJson } from "@/utils/fetchJson";
import { onMounted, onUnmounted, ref, watch } from "vue";
import { useFetchJson } from "../composables/useFetchJson";

//Variables
let interval;
const storyId = ref(Number(window.location.hash.split("-")[1]));
const time = ref(getTimer());
const currentChapterId = ref(getChapter());

//Chargement des données
const { data, error, loading } = useFetchJson(
    `stories/${storyId.value}/chapters/${currentChapterId.value}`
);

//Gestion du changement de chapitre
watch([currentChapterId, storyId], () => {
    const { request } = fetchJson(
        `stories/${storyId.value}/chapters/${currentChapterId.value}`
    );
    request.then((res) => {
        data.value = res;
    });
});

//Gestion du changement d'histoire
function onHashChange(e) {
    storyId.value = e.newURL.split("-")[1];

    // On revient au bon chapitre si on change d'histoire en utilisant le hash
    currentChapterId.value = getChapter();
}

//Gestion du timer
onMounted(() => {
    interval = setInterval(() => {
        // On incrémente le compteur si on est pas dans un chapitre de fin.
        if (data.value.choices.length != 0) {
            time.value++;
        }

        localStorage.setItem(`story-${storyId.value}-timer`, time.value);
    }, 1000);

    window.addEventListener("hashchange", onHashChange);
});

//On enleve l'interval
onUnmounted(() => {
    clearInterval(interval);

    window.removeEventListener("hashchange", onHashChange);
});

//La fonction permet de récupérer le chapitre et le temps enregistré dans le localStorage
function getChapter() {
    const chapterId = localStorage.getItem(
        `story-${storyId.value}-current-chapter`
    );

    if (chapterId) {
        return parseInt(chapterId);
    }

    return 1;
}

//La fonction permet de récupérer le temps enregistré dans le localStorage
function getTimer() {
    const timer = localStorage.getItem(`story-${storyId.value}-timer`);
    if (timer) {
        return parseInt(timer);
    }
    return 0;
}

//Gestion des choix
function onChoiceClick(choice) {
    localStorage.setItem(
        `story-${storyId.value}-current-chapter`,
        choice.next_chapter_id
    );

    currentChapterId.value = choice.next_chapter_id;
}

//Fonction permettant de formater le temps
function formatTime(time) {
    const hours = Math.floor(time / 3600);
    const minutes = Math.floor((time % 3600) / 60);
    const seconds = time % 60;
    return `${hours.toString().padStart(2, "0")}:${minutes
        .toString()
        .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
}

//Fonction permettant de recommencer
function onRestartClick() {
    localStorage.setItem(`story-${storyId.value}-current-chapter`, 1);
    currentChapterId.value = 1;
    time.value = 0;
}
</script>

<template>
    <!-- Si les données ne sont pas en cours de chargement -->
    <div
        v-if="!loading"
        class="page"
        :style="{ backgroundImage: 'url(/storage/images/' + data.image + ')' }"
    >
        <!-- En-tête de la page-->
        <div class="header">
            <h1 class="title">{{ data.title }}</h1>
            <div class="timer">{{ formatTime(time) }}</div>
        </div>

        <div class="spacer"></div>

        <div class="menu">
            <p class="text">
                {{ data.text }}
            </p>

            <!-- Liste des choix -->
            <ol class="choices">
                <li v-for="(choice, i) in data.choices">
                    <button class="choice" @click="onChoiceClick(choice)">
                        {{ i + 1 }}. {{ choice.text }}
                    </button>
                </li>
                <li v-if="data.choices.length === 0">
                    <button class="choice" @click="onRestartClick">
                        Recommencer
                    </button>
                </li>
                <li v-if="data.choices.length === 0">
                    <a href="/#" class="choice">Quitter</a>
                </li>
            </ol>
        </div>
    </div>
</template>

<style scoped>
.page {
    display: flex;
    flex-direction: column;
    height: 100vh;
    background-size: cover;
    background-position: center;
}

.header {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: start;
    padding: 16px;
    color: #20ff02;
    font-family: "Chakra Petch", sans-serif;
}

.title {
    margin: 0;
    font-weight: normal;
    font-size: 40px;
}

.timer {
    font-size: 24px;
}

.menu {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
    padding: 32px;
    bottom: 0;
}

.spacer {
    flex: 1 0 auto;
}

.text {
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    max-width: 1200px;
}

.choices {
    display: flex;
    flex-direction: row;
    gap: 36px;
    margin: 0;
}

.choices > li {
    display: flex;
}

.choice {
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: transform 0.15s ease-in-out;
}

.choice:hover {
    transform: scale(1.1);
}

@media screen and (max-width: 900px) {
    .choices {
        width: 100%;
        flex-direction: column;
    }

    .choice {
        flex: 1 0 100%;
    }
}
</style>
