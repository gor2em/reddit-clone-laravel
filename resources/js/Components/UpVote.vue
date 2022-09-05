<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    slug: String,
});
</script>

<template>
    <Link
        :href="route('posts.upVote', slug)"
        class="text-gray-400 hover:text-blue-500"
        method="post"
        as="button"
        type="button"
        preserve-scroll
    >
        <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 10l7-7m0 0l7 7m-7-7v18"
            ></path>
        </svg>
    </Link>
</template>
