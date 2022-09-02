<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";

defineProps({
    community: Object(),
});
</script>

<template>
    <guest-layout>
        <div class="flex justify-end m-2 p-2">
            <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-4 rounded bg-indigo-500 text-white hover:bg-indigo-300"
                >Create Post</Link
            >
        </div>
        <h1>{{ community.name }}</h1>
    </guest-layout>
</template>
