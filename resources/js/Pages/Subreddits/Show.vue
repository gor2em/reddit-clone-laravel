<script setup>
defineProps({
    subreddit: Object(),
});
</script>

<template>
    <h1>{{ subreddit.name }}</h1>
</template>
