<script setup>
import { useFetchJson } from "@/composables/useFetchJson";

const { data, error, isLoading } = useFetchJson("stories");
</script>

<template>
    <a href="#story-1" v-for="story in data"> {{ story.title }} </a>
</template>

<style scoped></style>
