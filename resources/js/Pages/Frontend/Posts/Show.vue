<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";

defineProps({
    community: Object,
    post: Object,
});
</script>

<template>
    <guest-layout>
        <section class="m-2 p-2 flex md:flex-row">
            <div class="w-8/12">
                <h1>{{ post.title }}</h1>
                Post Details
            </div>
            <div class="w-4/12 p-4">
                <div class="m-2 p-2 bg-slate-600 text-white">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>
