<script setup>
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
