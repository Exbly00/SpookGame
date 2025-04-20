<script setup>
import { fetchJson } from "@/utils/fetchJson";
import { onMounted, onUnmounted, ref, watch } from "vue";
import { useFetchJson } from "../composables/useFetchJson";

let interval;
const time = ref(getTimer());
const currentChapterId = ref(getChapter());

const { data, error, loading } = useFetchJson(
    `stories/1/chapters/${currentChapterId.value}`
);

watch(currentChapterId, () => {
    const { request } = fetchJson(
        `stories/1/chapters/${currentChapterId.value}`
    );
    request.then((res) => {
        data.value = res;
    });
});

onMounted(() => {
    interval = setInterval(() => {
        time.value++;

        localStorage.setItem("story-1-timer", time.value);
    }, 1000);
});

onUnmounted(() => {
    clearInterval(interval);
});

function getChapter() {
    const chapterId = localStorage.getItem(`story-1-current-chapter`);

    if (chapterId) {
        return parseInt(chapterId);
    }

    return 1;
}

function getTimer() {
    const timer = localStorage.getItem("story-1-timer");
    if (timer) {
        return parseInt(timer);
    }
    return 0;
}

function onChoiceClick(choice) {
    localStorage.setItem(`story-1-current-chapter`, choice.next_chapter_id);

    currentChapterId.value = choice.next_chapter_id;
}

function formatTime(time) {
    const hours = Math.floor(time / 3600);
    const minutes = Math.floor((time % 3600) / 60);
    const seconds = time % 60;
    return `${hours.toString().padStart(2, "0")}:${minutes
        .toString()
        .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
}
</script>

<template>
    <div
        v-if="!loading"
        class="page"
        :style="{ backgroundImage: 'url(/storage/images/' + data.image + ')' }"
    >
        <div class="header">
            <h1 class="title">{{ data.title }}</h1>
            <div class="timer">{{ formatTime(time) }}</div>
        </div>

        <div class="spacer"></div>

        <div class="menu">
            <p class="text">
                {{ data.text }}
            </p>

            <ol class="choices">
                <li v-for="(choice, i) in data.choices">
                    <button class="choice" @click="onChoiceClick(choice)">
                        {{ i + 1 }}. {{ choice.text }}
                    </button>
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
</style>
