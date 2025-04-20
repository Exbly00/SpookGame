<script setup>
import { useFetchJson } from "@/composables/useFetchJson";
import { onMounted, onUnmounted, ref } from "vue";

const { data, error, isLoading } = useFetchJson("stories/1/chapters/1");
let interval;
const time = ref(0);

onMounted(() => {
    interval = setInterval(() => {
        time.value++;
    }, 1000);
});

onUnmounted(() => {
    clearInterval(interval);
});

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
        class="page"
        :style="{ backgroundImage: 'url(/storage/images/' + data?.image + ')' }"
    >
        <div class="header">
            <h1 class="title">{{ data?.title }}</h1>
            <div class="timer">{{ formatTime(time) }}</div>
        </div>

        <div class="spacer"></div>

        <div class="menu">
            <p class="text">
                {{ data?.text }}
            </p>

            <ol class="choices">
                <li v-for="choice in data?.choices">
                    <a href="" class="choice">{{ choice.text }}</a>
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
