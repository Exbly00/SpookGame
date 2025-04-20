<script setup>
import { ref } from "vue";
import TheHeader from "@/components/TheHeader.vue";
import PageExample from "@/pages/PageExample.vue";
import PageChapter from "@/pages/PageChapter.vue";

import { currentPage } from "@/stores/routes.js";
import TheNav from "./components/TheNav.vue";
</script>

<template>
    <div>
        <TheNav />
        <main>
            <component :is="currentPage" />
        </main>
    </div>
</template>

<style scoped></style>
