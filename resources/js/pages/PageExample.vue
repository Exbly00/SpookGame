<script setup>
import { useFetchJson } from "@/composables/useFetchJson";

// Chargement des données
const { data, error, isLoading } = useFetchJson("test");
const { data: data2, error: error2 } = useFetchJson({
    url: "test",
    method: "DELETE",
});
</script>

<template>
    <!-- Affichage des réponses des requêtes GET et DELETE -->
    <div>
        <h1>Page Example</h1>
        <p>{{ data }}</p>
        <p>{{ data2 }}</p>
        <p>{{ error2 }}</p>
    </div>
</template>

<style scoped></style>
