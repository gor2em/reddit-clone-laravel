<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    communities: Object,
});
</script>

<template>
    <div>
        <ul role="list" class="divide-y divide-slate-300">
            <li
                class="py-3 sm:py-4"
                v-for="community in communities"
                :key="community.id"
            >
                <div class="flex items-center space-x-4">
                    <Link
                        :href="
                            route('frontend.communities.show', community.slug)
                        "
                        class="text-slate-800 font-semibold truncate text-sm"
                    >
                        {{ community.name }}
                    </Link>
                    <div>Posts ({{community.posts_count}})</div>
                </div>
            </li>
        </ul>
    </div>
</template>
