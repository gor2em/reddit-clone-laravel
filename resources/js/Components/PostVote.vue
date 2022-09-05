<script setup>
import UpVote from "./UpVote.vue";
import DownVote from "./DownVote.vue";
defineProps({
    post: Object,
});
</script>

<template>
    <div
        class="w-12 flex flex-col h-full mt-4 items-center"
    >
        <UpVote
            :slug="post.slug"
            :class="{ 'text-blue-600': post.postVotes[0] && post.postVotes[0].vote === 1 }"
        />
        <span
            class="p-2 my-2 font-bold"
            :class="{
                'text-red-500':
                    post.postVotes[0] && post.postVotes[0].vote === -1,
                'text-blue-500':
                    post.postVotes[0] && post.postVotes[0].vote === 1,
            }"
        >
            {{ post.votes }}
        </span>
        <DownVote
            :slug="post.slug"
            :class="{ 'text-red-600': post.postVotes[0] && post.postVotes[0].vote === -1 }"
        />
    </div>
</template>

<style></style>
