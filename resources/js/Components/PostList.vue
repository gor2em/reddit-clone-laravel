<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    community:Object,
    posts: Object,
});
</script>

<template>
    <div class="w-full border bg-white p-4 rounded-lg">
        <h2 class="font-semibold text-lg p-1 bg-indigo-700 text-white">
            <slot name="title" />
        </h2>
        <ul role="list" class="divide-y divide-slate-300">
            <li class="py-3 sm:py-4" v-for="post in posts" :key="post.id">
                <div class="flex items-center space-x-4">
                    <Link
                        :href="
                            route('frontend.posts.show', [
                                community.slug,
                                post.slug,
                            ])
                        "
                        class="text-slate-800 font-semibold truncate text-sm"
                    >
                        {{ post.title }}
                    </Link>
                    <div>Votes ({{ post.votes }})</div>
                </div>
            </li>
        </ul>
    </div>
</template>
