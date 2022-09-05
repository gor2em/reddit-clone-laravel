<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    slug: String,
});
</script>

<template>
        <Link
            :href="route('posts.downVote', slug)"
            class="text-gray-400 hover:text-red-500"
            method="post"
            as="button"
            type="button"
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
                    d="M19 14l-7 7m0 0l-7-7m7 7V3"
                ></path>
            </svg>
        </Link>
</template>
